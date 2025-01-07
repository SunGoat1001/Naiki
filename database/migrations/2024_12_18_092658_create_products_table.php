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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->double('price');
            $table->text('long_desc');
            $table->text('gender');
            $table->string('main_image_url', 255)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->dateTime('imported_date')->nullable();
            $table->timestamps(0);

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');

            // Indexes
            $table->index('category_id');  // For foreign key lookups
            $table->index('name');         // For product searches/filtering
            $table->index('price');        // For price filtering/sorting
            $table->index('gender');       // For gender filtering
            $table->index('imported_date'); // For date-based queries

            // Composite index for common combined filters
            $table->index(['category_id', 'gender', 'price']);
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
