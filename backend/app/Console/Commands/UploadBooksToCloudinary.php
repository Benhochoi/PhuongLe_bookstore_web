<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Book;
use App\Models\BookImage;

class UploadBooksToCloudinary extends Command
{
    protected $signature = 'cloudinary:upload-books {--dry-run : Chỉ xem danh sách, không upload thực}';
    protected $description = 'Upload tất cả ảnh sách local lên Cloudinary và cập nhật database';

    public function handle()
    {
        // Tăng memory limit cho lệnh này
        ini_set('memory_limit', '512M');

        $cloudName = config('services.cloudinary.cloud_name');
        $apiKey    = config('services.cloudinary.api_key');
        $apiSecret = config('services.cloudinary.api_secret');

        if (!$cloudName || !$apiKey || !$apiSecret) {
            $this->error('❌ Thiếu cấu hình Cloudinary. Hãy thêm CLOUDINARY_CLOUD_NAME, CLOUDINARY_API_KEY, CLOUDINARY_API_SECRET vào file .env (backend)');
            return 1;
        }

        $isDryRun  = $this->option('dry-run');
        $publicDir = public_path();
        $success   = 0;
        $fail      = 0;

        // ── 1. Ảnh bìa (cột image trong bảng books) ──
        $books = Book::whereNotNull('image')
            ->where('image', 'like', '/images/%')
            ->get();

        $this->info("📚 Tìm thấy {$books->count()} sách có ảnh bìa local cần upload\n");

        foreach ($books as $book) {
            $localPath = $publicDir . $book->image;

            if (!file_exists($localPath)) {
                $this->warn("  ⚠️  Không tìm thấy file: {$book->image}");
                $fail++;
                continue;
            }

            if ($isDryRun) {
                $this->line("  [DRY-RUN] {$book->title}  →  {$book->image}");
                continue;
            }

            try {
                $url = $this->uploadFile($localPath, $cloudName, $apiKey, $apiSecret, 'phuonglebookstore/books');
                $book->update(['image' => $url]);
                $this->info("  ✅ [{$book->book_id}] {$book->title}");
                $success++;
            } catch (\Exception $e) {
                $this->error("  ❌ [{$book->book_id}] {$book->title}: " . $e->getMessage());
                $fail++;
            }

            // Giải phóng bộ nhớ sau mỗi ảnh
            gc_collect_cycles();
        }

        // ── 2. Ảnh phụ (bảng book_images) ──
        $bookImages = BookImage::where('image_path', 'like', '/images/%')->get();
        $this->info("\n🖼️  Tìm thấy {$bookImages->count()} ảnh phụ local cần upload\n");

        foreach ($bookImages as $img) {
            $localPath = $publicDir . $img->image_path;

            if (!file_exists($localPath)) {
                $this->warn("  ⚠️  Không tìm thấy file: {$img->image_path}");
                $fail++;
                continue;
            }

            if ($isDryRun) {
                $this->line("  [DRY-RUN] book_id={$img->book_id}  →  {$img->image_path}");
                continue;
            }

            try {
                $url = $this->uploadFile($localPath, $cloudName, $apiKey, $apiSecret, 'phuonglebookstore/books/gallery');
                $img->update(['image_path' => $url]);
                $this->info("  ✅ [image_id={$img->image_id}] book_id={$img->book_id}");
                $success++;
            } catch (\Exception $e) {
                $this->error("  ❌ [image_id={$img->image_id}]: " . $e->getMessage());
                $fail++;
            }

            gc_collect_cycles();
        }

        $this->newLine();
        if (!$isDryRun) {
            $this->info("✨ Hoàn thành! Thành công: {$success} | Thất bại: {$fail}");
        } else {
            $this->info("✨ [DRY-RUN] Tổng số sẽ upload: " . ($books->count() + $bookImages->count()));
        }

        return 0;
    }

    /**
     * Upload file lên Cloudinary dùng base64 (không cần cURL extension).
     * File lớn hơn 5MB sẽ được nén trước bằng GD.
     */
    private function uploadFile(string $filePath, string $cloudName, string $apiKey, string $apiSecret, string $folder): string
    {
        $timestamp    = time();
        $paramsToSign = "folder={$folder}&timestamp={$timestamp}";
        $signature    = sha1($paramsToSign . $apiSecret);
        $endpoint     = "https://api.cloudinary.com/v1_1/{$cloudName}/image/upload";

        // Nếu file > 5MB thì nén xuống trước khi encode
        $fileSize = filesize($filePath);
        if ($fileSize > 5 * 1024 * 1024 && extension_loaded('gd')) {
            $imageData = $this->resizeImage($filePath);
            $mimeType  = 'image/jpeg';
        } else {
            $imageData = file_get_contents($filePath);
            $mimeType  = mime_content_type($filePath) ?: 'image/jpeg';
        }

        $base64 = 'data:' . $mimeType . ';base64,' . base64_encode($imageData);
        unset($imageData);

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                'content' => http_build_query([
                    'api_key'   => $apiKey,
                    'timestamp' => $timestamp,
                    'signature' => $signature,
                    'folder'    => $folder,
                    'file'      => $base64,
                ]),
                'timeout' => 120,
            ],
            'ssl' => [
                'verify_peer'      => false,
                'verify_peer_name' => false,
            ],
        ]);

        unset($base64);
        $response = file_get_contents($endpoint, false, $context);

        if ($response === false) {
            throw new \Exception('Không thể kết nối tới Cloudinary');
        }

        $data = json_decode($response, true);
        unset($response);

        if (empty($data['secure_url'])) {
            throw new \Exception($data['error']['message'] ?? 'Upload thất bại');
        }

        return $data['secure_url'];
    }

    /**
     * Nén ảnh xuống tối đa 2000px và chất lượng JPEG 85% bằng GD.
     */
    private function resizeImage(string $filePath): string
    {
        $info = getimagesize($filePath);
        $mime = $info['mime'] ?? 'image/jpeg';

        $src = match ($mime) {
            'image/png'  => imagecreatefrompng($filePath),
            'image/webp' => imagecreatefromwebp($filePath),
            default      => imagecreatefromjpeg($filePath),
        };

        if (!$src) {
            return file_get_contents($filePath);
        }

        $origW = imagesx($src);
        $origH = imagesy($src);
        $maxDim = 2000;

        if ($origW <= $maxDim && $origH <= $maxDim) {
            $dst = $src;
        } else {
            $ratio = min($maxDim / $origW, $maxDim / $origH);
            $newW  = (int) ($origW * $ratio);
            $newH  = (int) ($origH * $ratio);
            $dst   = imagecreatetruecolor($newW, $newH);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $origW, $origH);
            imagedestroy($src);
        }

        ob_start();
        imagejpeg($dst, null, 85);
        $data = ob_get_clean();
        imagedestroy($dst);

        return $data;
    }
}

