<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditMentorEvalsTable extends Migration
{
    public function up()
    {
        Schema::table('mentor_evals', function (Blueprint $table) {
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::table('mentor_evals', function (Blueprint $table) {
            //
        });
    }
}
