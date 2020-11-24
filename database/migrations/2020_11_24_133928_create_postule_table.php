<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('postule', function (Blueprint $table) {
            $table->unsignedBigInteger('no_nanterre');
            $table->unsignedBigInteger('id_stage');
            //$table->foreign('no_nanterre')->references('no_nanterre')->on('etudiants');
            //$table->foreign('id_stage')->references('id_stage')->on('offrestages');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('postule');
    }
}
