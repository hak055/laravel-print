<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTovarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tovars', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('status');
            $table->integer('print_id')->unsigned();
            $table->integer('phone_model_id')->unsigned();

            $table->timestamps();
            $table->foreign('print_id')
            ->references('id')
            ->on('prints');
            $table->foreign('phone_model_id')
            ->references('id')
            ->on('phone_models');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tovars');
    }
}
