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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('category_id');
            $table->string('model_auta');
            $table->string('sifra');
            $table->unsignedBigInteger('vrste_id');
            $table->string('naziv');
            $table->string('slug');
            $table->string('proizvodjac');
            $table->decimal('cena', 9, 2);
            $table->boolean('na_akciji');
            $table->timestamps();
            $table->string('redosled');
            $table->boolean('aktivan');

            $table->foreign('vrste_id')
                    ->references('id')
                    ->on('vrste')
                    ->onDelete('restrict');

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('restrict');
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
