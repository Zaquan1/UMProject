<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturersTable extends Migration
{
    public function up()
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('department_id');
            $table->string('name');
            $table->string('email');
            $table->string('designation');
            $table->string('status');
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
