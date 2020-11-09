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
            $table->timestamps();

            $table->string('name','100')->default('Product is undefined!')->nullable();
            $table->double('price')->default('0')->nullable();
            $table->foreignId('cateID')->nullable();
            $table->string('unit',100)->default('pcs')->nullable();
            $table->text('img')->nullable();
            $table->string('weight',20)->nullable();
            $table->longText('desc')->nullable();
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
