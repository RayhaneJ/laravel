<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jurys', function (Blueprint $table) {
            $table->unsignedBigInteger('no_nanterre')->index();
            $table->string('statut');
            $table->string('prenom');
            $table->string('nom');
            $table->string('dt_naiss');
            $table->string('no_tel');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jurys');
    }
}
