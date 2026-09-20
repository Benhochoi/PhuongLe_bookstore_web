<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StockImport;
use App\Models\StockImportItem;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockImportController extends Controller
{
    /**
     * GET /api/admin/stock-imports
     * Danh sách phiếu nhập kho, phân trang, lọc theo ngày.
     */
    public function index(Request $request)
    {
        $query = StockImport::with(['creator', 'items.book'])
            ->orderByDesc('created_at');

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('import_code', 'like', "%{$s}%")
                  ->orWhere('supplier_name', 'like', "%{$s}%");
            });
        }

        if ($request->filled('from_date')) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }
        if ($request->filled('to_date')) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $perPage = (int) ($request->per_page ?? 15);
        $imports = $query->paginate($perPage);

        return response()->json([
            'data' => $imports->items(),
            'meta' => [
                'total'        => $imports->total(),
                'current_page' => $imports->currentPage(),
                'last_page'    => $imports->lastPage(),
                'per_page'     => $imports->perPage(),
            ],
        ]);
    }

    /**
     * GET /api/admin/stock-imports/{id}
     */
    public function show($id)
    {
        $import = StockImport::with(['creator', 'items.book'])->find($id);
        if (!$import) {
            return response()->json(['message' => 'Không tìm thấy phiếu nhập'], 404);
        }
        return response()->json(['data' => $import]);
    }

    /**
     * POST /api/admin/stock-imports
     * Tạo phiếu nhập mới + tăng tồn kho.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'supplier_name'       => 'nullable|string|max:200',
            'note'                => 'nullable|string',
            'items'               => 'required|array|min:1',
            'items.*.book_id'     => 'required|integer|exists:books,book_id',
            'items.*.quantity'    => 'required|integer|min:1',
            'items.*.unit_cost'   => 'required|numeric|min:0',
        ]);

        return DB::transaction(function () use ($validated, $request) {
            $user = $request->user();

            // Sinh mã phiếu atomic: NK + YYYYMMDD + 3 số, dùng lock để tránh trùng
            $prefix = 'NK' . now()->format('Ymd');
            $lastCode = StockImport::where('import_code', 'like', $prefix . '%')
                ->lockForUpdate()
                ->orderByDesc('import_code')
                ->value('import_code');
            $seq        = $lastCode ? ((int) substr($lastCode, -3)) + 1 : 1;
            $importCode = $prefix . str_pad($seq, 3, '0', STR_PAD_LEFT);

            $totalCost = 0;
            foreach ($validated['items'] as $item) {
                $totalCost += $item['quantity'] * $item['unit_cost'];
            }

            $import = StockImport::create([
                'import_code'   => $importCode,
                'supplier_name' => $validated['supplier_name'] ?? null,
                'note'          => $validated['note'] ?? null,
                'created_by'    => $user?->user_id,
                'total_cost'    => $totalCost,
            ]);

            foreach ($validated['items'] as $item) {
                StockImportItem::create([
                    'import_id'  => $import->import_id,
                    'book_id'    => $item['book_id'],
                    'quantity'   => $item['quantity'],
                    'unit_cost'  => $item['unit_cost'],
                    'total_cost' => $item['quantity'] * $item['unit_cost'],
                ]);

                // Cộng tồn kho ngay
                Book::where('book_id', $item['book_id'])
                    ->increment('stock_quantity', $item['quantity']);
            }

            return response()->json([
                'message' => 'Tạo phiếu nhập thành công',
                'data'    => $import->load(['creator', 'items.book']),
            ], 201);
        });
    }
}
