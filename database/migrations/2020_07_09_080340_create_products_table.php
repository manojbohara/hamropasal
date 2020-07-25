<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('slug')->unique();
            $table->string('quantity');
            $table->string('original_price');
            $table->string('discount_price')->nullable();
            $table->string('image')->nullable();
            $table->mediumText('detail')->nullable();
            $table->mediumText('description')->nullable();
            $table->boolean('hotdeal')->default(false);
            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('status')->default(true)->nullable();
            $table->foreignId('category_id')
            ->constrained('categories')
            ->onDelete('cascade');
            $table->foreignId('subcategory_id')
            ->nullable()
            ->constrained('subcategories')
            ->onDelete('cascade');
            $table->timestamp('expire_date', 0)->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
