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
            $table->integer('department_id')->nullable();
            $table->string('name');
            $table->string('email');
            $table->string('designation')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('lecturers');
    }
}
