<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->longText('description')->nullable()->default('text');
            $table->decimal('price', 10, 2);
            $table->string('title', 100)->nullable()->default('title');
            $table->string('tags')->nullable(); // O $table->json('tags')->nullable(); si usas array JSON
            $table->enum('item_type', ['text', 'image', 'archive']);
            $table->longText('text_content')->nullable()->default(null);
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamp('published_at')->nullable();

            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
           


            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
