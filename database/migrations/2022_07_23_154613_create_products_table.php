<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('brand');
            $table->string("img_path");
            $table->foreignId("product_category_id")->constrained()->onDelete("cascade");
            $table->string('size_type');
            $table->string('color');
            $table->decimal('price', 10, 2)->unsigned();
            $table->string('barcode');
            $table->integer('stock')->unsigned()->nullable();
            $table->integer('stock_defective')->unsigned();
            $table->text('description');
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
};
