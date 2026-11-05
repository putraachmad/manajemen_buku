
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();

            // Relasi dengan kategori
            $table->foreignId('category_id')
                ->constrained('categories')
                ->restrictOnDelete();

            // Identitas buku
            $table->string('title');
            $table->string('author');
            $table->string('publisher')->nullable();
            $table->unsignedSmallInteger('publication_year')->nullable();
            $table->string('isbn')->nullable()->unique();

            // Persediaan buku
            $table->unsignedInteger('stock')->default(0);

            // Cover dan deskripsi
            $table->string('cover')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
