<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemarquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('remarques', function (Blueprint $table) {
            $table->unsignedBigInteger('id_remarque')->index();
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('remarque');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('remarques');
    }
}
