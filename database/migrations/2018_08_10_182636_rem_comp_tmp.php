<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemCompTmp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('rem_comp_tmp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->integer('cantidad');
            $table->double('costo_unit');
            $table->integer('usu_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('rem_comp_tmp');
    }
}
