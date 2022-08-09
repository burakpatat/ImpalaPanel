<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estateinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estate_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('room');
            $table->integer('person');
            $table->integer('bedroom');
            $table->integer('bathroom');
            $table->string('heating');
            $table->integer('pool')->default(0)->comment('0: Yok, 1: Var');
            $table->integer('carpark')->default(0)->comment('0: Yok, 1: Var');
            $table->integer('area');
            $table->integer('estateage');
            $table->integer('floor');
            $table->integer('swap')->default(0)->comment('0: Yok, 1: Var');
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
        Schema::dropIfExists('estateinfos');
    }
}
