<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCohortsTable extends Migration
{
    public function up()
    {
        Schema::create('cohorts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('year');
            $table->string('stage')->nullable();
            $table->string('block')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cohorts');
    }
}
