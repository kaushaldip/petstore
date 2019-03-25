<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePetsMedias extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets_medias', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('media_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('media_id')->references('id')->on('medias');
            $table->unique(['pet_id', 'media_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets_medias');
    }
}
