<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffrestagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offrestages', function (Blueprint $table) {
            $table->id('id_stage')->index();
            $table->unsignedBigInteger('id_entreprise');
            $table->string('titre_stage');
            $table->string('deb_stage');
            $table->string('fin_stage');
            $table->string('duree');
            $table->string('desc_stage');
            //$table->foreign('id_entreprise')->references('id_entreprise')->on('entreprises');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offrestages');
    }
}
