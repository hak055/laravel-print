<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollectionPrinttTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collection_printt', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('printt_id')->unsigned();
            $table->integer('collection_id')->unsigned();

            $table->foreign('printt_id')->references('id')->on('prints')->onDelete('cascade');        
            $table->foreign('collection_id')->references('id')->on('collections')->onDelete('cascade');
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
        Schema::dropIfExists('collection_printt');
    }
}
