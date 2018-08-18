<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiRecordTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('si_record', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->json('identifier');
            $table->json('sample');
            $table->string('session');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('si_record');
    }
}
