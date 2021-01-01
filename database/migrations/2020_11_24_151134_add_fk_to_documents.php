<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToDocuments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->foreign('id_remarque')->references('id_remarque')->on('remarques')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_stagiaire')->references('id_stagiaire')->on('stagiaires')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stagiaires', function (Blueprint $table) {
            //
        });
    }
}
