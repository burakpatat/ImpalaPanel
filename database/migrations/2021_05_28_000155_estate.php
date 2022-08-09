<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('estates');
        Schema::create('estates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estatecategory_id');
            $table->string('title');
            $table->string('image');
            $table->longText('description');
            $table->integer('hit')->default(0);
            $table->integer('status')->default(0)->comment('0: Pasif, 1: Aktif');
            $table->string('slug');
            $table->string('estatefeature')->nullable();
            $table->string('estateinfo')->nullable();
            $table->string('price');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('estatecategory_id')->references('id')->on('estatecategories');
            $table->foreign('estateinfo')->references('id')->on('estateinfos')->onDelete('cascade');
            $table->foreign('estatefeature')->references('id')->on('estatefeatures')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estates');
    }
}
