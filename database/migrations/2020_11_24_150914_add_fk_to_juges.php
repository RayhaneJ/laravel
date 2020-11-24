<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkToJuges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('juges', function (Blueprint $table) {
            $table->foreign('no_nanterre')->references('no_nanterre')->on('jurys');
            $table->foreign('id_doc')->references('id_doc')->on('dossiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('juges', function (Blueprint $table) {
            //
        });
    }
}
