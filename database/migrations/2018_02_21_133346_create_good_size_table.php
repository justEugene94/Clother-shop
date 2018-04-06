<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodSizeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('good_size', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('good_id')->unsigned()->default(1);
            $table->foreign('good_id')->references('id')->on('goods');

            $table->integer('size_id')->unsigned()->default(1);
            $table->foreign('size_id')->references('id')->on('sizes');

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
        Schema::dropIfExists('good_size');
    }
}
