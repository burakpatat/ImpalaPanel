<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reservation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("villa_number");
            $table->integer("villa_personcount");
            $table->string("checkin");
            $table->string("checkout");
            $table->string("name");
            $table->string("email");
            $table->string("phone");
            $table->integer("status")->default(0)->comment('0: Pasif, 1: Aktif');
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
        //
    }
}
