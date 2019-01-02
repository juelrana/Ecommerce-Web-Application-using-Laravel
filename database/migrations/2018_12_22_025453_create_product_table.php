<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->increments('product_id');
            $table->integer('category_id');
            $table->integer('manufacturer_id');
            $table->string('product_sku');
            $table->string('product_name');
            $table->string('product_purchase_price');
            $table->string('product_retail_price');
            $table->integer('product_quantity');            
            $table->string('product_brand_name');
            $table->text('product_short_description');
            $table->text('product_long_description');
            $table->string('product_image');
            $table->tinyInteger('product_publication_status');
            $table->tinyInteger('product_featured_status');
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
        Schema::dropIfExists('product');
    }
}
