<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMentorEvalsTable extends Migration
{
    public function up()
    {
        Schema::table('mentor_evals', function (Blueprint $table) {
            $table->text('location')->nullable();
            $table->text('main_issue')->nullable();
            $table->text('other_issue')->nullable();
            $table->text('outcome')->nullable();
            $table->text('discussed_strategy')->nullable();
            $table->text('purpose')->nullable();
            $table->text('i_find_my_mentee')->nullable();
            $table->text('time_spent_with_mentee_was')->nullable();
            $table->text('mentor_mentee_programme_is')->nullable();
            $table->text('suggestion_and_comment')->nullable();
        });
    }

    public function down()
    {
        Schema::table('mentor_evals', function (Blueprint $table) {
            $table->dropColumn([
                'location',
                'main_issue',
                'other_issue',
                'outcome',
                'discussed_strategy',
                'purpose',
                'i_find_my_mentee',
                'time_spent_with_mentee_was',
                'mentor_mentee_programme_is',
                'suggestion_and_comment'
            ]);
        });
    }
}
