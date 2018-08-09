<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Metakeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metakeys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('key1');
            $table->string('key2');
            $table->string('key3');
            $table->string('key4');
            $table->string('key5');
            $table->string('key6');
            $table->string('key7');
            $table->string('key8');

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
        Schema::dropIfExists('metakeys');
    }
}
