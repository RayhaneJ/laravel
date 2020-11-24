<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToPostule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('postule', function (Blueprint $table) {
            $table->foreign('no_nanterre')->references('no_nanterre')->on('etudiants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_stage')->references('id_stage')->on('offrestages')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postule', function (Blueprint $table) {
            //
        });
    }
}
