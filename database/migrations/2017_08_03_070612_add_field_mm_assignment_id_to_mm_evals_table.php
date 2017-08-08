<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldMmAssignmentIdToMmEvalsTable extends Migration
{
    public function up()
    {
        Schema::table('mm_evals', function (Blueprint $table) {
            $table->integer('mm_assignment_id');
        });
    }

    public function down()
    {
        Schema::table('mm_evals', function (Blueprint $table) {
            $table->dropColumn(['mm_assignment_id']);
        });
    }
}
