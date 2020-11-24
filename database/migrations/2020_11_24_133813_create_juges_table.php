<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJugesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('juges', function (Blueprint $table) {
            $table->unsignedBigInteger('no_nanterre');
            $table->unsignedBigInteger('id_doc');
            //$table->foreign('no_nanterre')->references('no_nanterre')->on('jurys');
            //$table->foreign('id_doc')->references('id_doc')->on('dossiers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('juges');
    }
}
