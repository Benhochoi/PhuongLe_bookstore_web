<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Bảng danh mục
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('category_id');
                $table->string('category_name', 100);
                $table->text('description')->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->timestamps();
            });
        }

        // Bảng nhà xuất bản
        if (!Schema::hasTable('publishers')) {
            Schema::create('publishers', function (Blueprint $table) {
                $table->increments('publisher_id');
                $table->string('publisher_name', 200);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        // Bảng tác giả
        if (!Schema::hasTable('authors')) {
            Schema::create('authors', function (Blueprint $table) {
                $table->increments('author_id');
                $table->string('author_name', 200);
                $table->text('bio')->nullable();
                $table->timestamps();
            });
        }

        // Bảng sách
        if (!Schema::hasTable('books')) {
            Schema::create('books', function (Blueprint $table) {
                $table->increments('book_id');
                $table->unsignedInteger('category_id')->nullable();
                $table->unsignedInteger('publisher_id')->nullable();
                $table->string('isbn', 50)->nullable();
                $table->string('title', 500);
                $table->string('image', 1000)->nullable();
                $table->string('slug', 600)->unique();
                $table->longText('description')->nullable();
                $table->decimal('price', 12, 2)->default(0);
                $table->decimal('discount_price', 12, 2)->nullable();
                $table->integer('stock_quantity')->default(100);
                $table->integer('page_count')->nullable();
                $table->year('publish_year')->nullable();
                $table->string('language', 50)->nullable();
                $table->string('dimensions', 100)->nullable();
                $table->integer('weight')->nullable();
                $table->string('cover_type', 100)->nullable();
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->timestamps();

                $table->foreign('category_id')->references('category_id')->on('categories')->nullOnDelete();
                $table->foreign('publisher_id')->references('publisher_id')->on('publishers')->nullOnDelete();
            });
        }

        // Bảng trung gian book_authors
        if (!Schema::hasTable('book_authors')) {
            Schema::create('book_authors', function (Blueprint $table) {
                $table->unsignedInteger('book_id');
                $table->unsignedInteger('author_id');
                $table->primary(['book_id', 'author_id']);
                $table->foreign('book_id')->references('book_id')->on('books')->cascadeOnDelete();
                $table->foreign('author_id')->references('author_id')->on('authors')->cascadeOnDelete();
            });
        }

        // Bảng ảnh phụ của sách
        if (!Schema::hasTable('book_images')) {
            Schema::create('book_images', function (Blueprint $table) {
                $table->increments('image_id');
                $table->unsignedInteger('book_id');
                $table->string('image_path', 1000);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
                $table->foreign('book_id')->references('book_id')->on('books')->cascadeOnDelete();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('book_images');
        Schema::dropIfExists('book_authors');
        Schema::dropIfExists('books');
        Schema::dropIfExists('authors');
        Schema::dropIfExists('publishers');
        Schema::dropIfExists('categories');
    }
};
