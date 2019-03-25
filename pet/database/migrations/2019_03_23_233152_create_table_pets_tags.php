<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablePetsTags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets_tags', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('tag_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->foreign('tag_id')->references('id')->on('tags');
            $table->unique(['pet_id', 'tag_id']);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pets_tags');
    }
}
