<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodColourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_colour', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('good_id')->unsigned()->default(1);
            $table->foreign('good_id')->references('id')->on('goods');

            $table->integer('colour_id')->unsigned()->default(1);
            $table->foreign('colour_id')->references('id')->on('colors');

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
        Schema::dropIfExists('good_colour');
    }
}
