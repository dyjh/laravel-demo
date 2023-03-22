<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('type')->default('normal');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title')->default('');
            $table->string('long_title')->default('');
            $table->text('description');
            $table->string('image')->default('');
            $table->tinyInteger('on_sale')->default('1');
            $table->double('rating')->default('5.00');
            $table->unsignedInteger('sold_count')->default('0');
            $table->unsignedInteger('review_count')->default('0');
            $table->decimal('price');
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
