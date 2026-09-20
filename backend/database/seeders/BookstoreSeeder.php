<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * BookstoreSeeder: Wrapper chạy VanhocSeeder nhưng ignore lỗi timestamp
 * vì bảng publishers/authors/categories không có created_at/updated_at
 */
class BookstoreSeeder extends Seeder
{
    public function run(): void
    {
        // Disable strict mode để bỏ qua các cột không tồn tại
        DB::statement("SET SESSION sql_mode = ''");

        $this->call(VanhocSeeder::class);

        // Restore strict mode
        DB::statement("SET SESSION sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'");
    }
}
