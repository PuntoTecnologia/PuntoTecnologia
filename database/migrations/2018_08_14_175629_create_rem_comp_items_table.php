<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRemCompItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rem_comp_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prod_id')->references('id')->on('productos')->onDelete('cascade');
            $table->double('costo_unit');
            $table->integer('usu_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('ui');
            $table->integer('ref_fact_prov')->references('ref_fact_prov')->on('rem_comp')->onDelete('cascade');
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
        Schema::dropIfExists('rem_comp_items');
    }
}
