<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    /** GET /api/admin/staff */
    public function index(Request $request)
    {
        $q      = $request->query('q');
        $roleId = $request->query('role_id');

        $staff = User::with('role')
            ->where('role_id', '!=', 3)          // loại customer
            ->when($q, fn($qry) => $qry->where(function ($sub) use ($q) {
                $sub->where('full_name', 'like', "%$q%")
                    ->orWhere('email',     'like', "%$q%")
                    ->orWhere('username',  'like', "%$q%");
            }))
            ->when($roleId, fn($qry) => $qry->where('role_id', $roleId))
            ->orderBy('role_id')
            ->orderBy('full_name')
            ->get();

        return response()->json($staff);
    }

    /** POST /api/admin/staff */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'username'  => 'required|string|max:50|unique:users,username',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6',
            'full_name' => 'required|string|max:100',
            'phone'     => 'nullable|string|max:20',
            'role_id'   => 'required|in:1,2,4',
        ], [
            'username.unique'  => 'Tên đăng nhập đã tồn tại.',
            'email.unique'     => 'Email đã được sử dụng.',
            'password.min'     => 'Mật khẩu phải có ít nhất 6 ký tự.',
            'role_id.in'       => 'Role không hợp lệ.',
        ]);

        $user = User::create([
            'username'  => $validated['username'],
            'email'     => $validated['email'],
            'password'  => Hash::make($validated['password']),
            'full_name' => $validated['full_name'],
            'phone'     => $validated['phone'] ?? null,
            'role_id'   => (int) $validated['role_id'],
            'status'    => 'active',
            'gender'    => 'other',
        ]);

        return response()->json($user->load('role'), 201);
    }

    /** PUT /api/admin/staff/{id} */
    public function update(Request $request, $id)
    {
        $user = User::where('role_id', '!=', 3)->findOrFail($id);

        $validated = $request->validate([
            'full_name' => 'sometimes|string|max:100',
            'phone'     => 'nullable|string|max:20',
            'role_id'   => 'sometimes|in:1,2,4',
            'status'    => 'sometimes|in:active,inactive,banned',
            'password'  => 'nullable|min:6',
        ]);

        if (!empty($validated['password'])) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        $user->update($validated);
        return response()->json($user->fresh()->load('role'));
    }

    /** DELETE /api/admin/staff/{id} */
    public function destroy($id)
    {
        $user = User::where('role_id', '!=', 3)->findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Xóa thành công']);
    }
}
