<?php

use App\Models\Category;
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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('description');
            $table->string('img');
            $table->float('price')->default(0.00);
            $table->float('sale')->default(0.00);
            $table->foreignIdFor(Category::class)->constrained()->onDelete('cascade');
            // характеристики
            $table->json('specifics')->comment('Это поле будет хранить формат json');
            $table->json('images');

            $table->boolean('is_active')->default(0);
            $table->boolean('is_popular')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
