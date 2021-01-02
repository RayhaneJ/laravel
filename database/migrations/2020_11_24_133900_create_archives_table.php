<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->id('id_archives');
            $table->unsignedBigInteger('id_stagiaire');
            $table->unsignedBigInteger('no_nanterre');
            $table->unsignedBigInteger('id_stage');
            $table->boolean('conventionValideEn')->default(0);
            $table->boolean('conventionValideTu')->default(0);
            $table->boolean('isValid')->default(0);
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
