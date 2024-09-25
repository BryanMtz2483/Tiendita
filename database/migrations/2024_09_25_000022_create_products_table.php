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
            $table->string('name');
            $table->integer('stock');
            $table->float('store_price',8,2);
            $table->float('public_price',8,2);
            $table->date('expiration');
            $table->date('assortment');
            $table->enum('status',['active','disabled'])->default('active');

            $table->foreignId('supplier_id')->constrained('suppliers', 'id')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories', 'id')->onDelete('cascade');
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
