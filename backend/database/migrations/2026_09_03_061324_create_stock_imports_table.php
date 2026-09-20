<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Phiếu nhập kho
        Schema::create('stock_imports', function (Blueprint $table) {
            $table->id('import_id');
            $table->string('import_code', 20)->unique();
            $table->string('supplier_name', 200)->nullable();
            $table->text('note')->nullable();
            $table->integer('created_by')->nullable(); // int, matches users.user_id
            $table->decimal('total_cost', 15, 2)->default(0);
            $table->timestamps();
        });

        Schema::create('stock_import_items', function (Blueprint $table) {
            $table->id('item_id');
            $table->unsignedBigInteger('import_id');
            $table->integer('book_id');              // int, matches books.book_id
            $table->integer('quantity');
            $table->decimal('unit_cost', 12, 2)->default(0);
            $table->decimal('total_cost', 15, 2)->default(0);

            $table->foreign('import_id')->references('import_id')->on('stock_imports')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('stock_import_items');
        Schema::dropIfExists('stock_imports');
    }
};
