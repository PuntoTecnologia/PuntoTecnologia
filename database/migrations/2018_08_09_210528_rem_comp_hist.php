<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemCompHist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creamos algunos campos sin FK para guardar el historial y q no se modifiquen en el tiempo
        Schema::create('rem_comp_hist', function (Blueprint $table) {
            $table->increments('id_rc')->references('id')->on('rem_comp')->onDelete('cascade');
            $table->integer('prod_id');
            $table->longText('prod_desc');
            $table->integer('iu')->nullable();
            $table->double('costo');
            $table->longText('rs_prov');//razon social prov
            $table->integer('usuario');
            $table->integer('num_remito');
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
                Schema::dropIfExists('rem_comp_hist');
    }
}
