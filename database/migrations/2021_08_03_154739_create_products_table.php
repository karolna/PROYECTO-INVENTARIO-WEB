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
            $table->increments('id');
            $table->string('code')->unique()->nullable();
            $table->string('name')->unique();
            $table->integer('stock')->default(0);
            $table->string('image');
            $table->decimal('sell_price',12,2);
            $table->enum('status',['ACTIVO','INACTIVO'])->default('ACTIVO');
            $table->unsignedInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('providers');
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
