<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStagiaireTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stagiaires', function (Blueprint $table) {
            $table->unsignedBigInteger('no_nanterre')->index();
            $table->unsignedBigInteger('id_stage')->index();
            $table->unsignedBigInteger('id_doc')->nullable();
            $table->unsignedBigInteger('id_mission')->nullable();
            $table->unsignedBigInteger('id_remarque')->nullable();
            $table->boolean('conventionValideEn')->default(0);
            $table->boolean('conventionValideTu')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stagiaires');
    }
}
