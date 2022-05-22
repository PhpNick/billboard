<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardPhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_photos', function (Blueprint $table) {
            $table->id();

            $table->biginteger('card_id')->unsigned()->nullable();
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');

            $table->string('name');
            $table->string('path');
            $table->integer('width');
            $table->integer('height');
            $table->string('thumbnail_path');
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
        Schema::dropIfExists('card_photos');
    }
}
