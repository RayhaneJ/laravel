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
            $table->unsignedBigInteger('no_nanterre')->index();
            $table->unsignedBigInteger('id_stage')->index();
            $table->unique('no_nanterre', 'id_stage');
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
