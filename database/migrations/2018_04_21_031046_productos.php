<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Productos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->increments('id');
            $table->char('codigo');
            $table->char('titulo');
            $table->longText('descripcion');
            $table->integer('stockminimo');
            $table->integer('id_marca')->references('id')->on('marcas')->onDelete('cascade');
            $table->double('costo');
            $table->double('rent');
            $table->double('iva');
            $table->integer('prover');
            $table->integer('padre');
            $table->boolean('oferta', 10);
            $table->boolean('active', 10);
            $table->integer('tipo');
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
        Schema::dropIfExists('productos');
    }
}
