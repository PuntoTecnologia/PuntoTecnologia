<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemComp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
   public function up()
    {
        Schema::create('rem_comp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('iu')->nullable();
            $table->double('costo_unit');
            $table->integer('prov_id')->references('id')->on('prover')->onDelete('cascade');
            $table->integer('usu_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('num_remito')->nullable();
            $table->integer('ubicacion');
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
        Schema::dropIfExists('rem_comp');
    }
}
