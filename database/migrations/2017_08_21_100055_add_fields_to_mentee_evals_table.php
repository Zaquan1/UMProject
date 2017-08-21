<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToMenteeEvalsTable extends Migration
{
    public function up()
    {
        Schema::table('mentee_evals', function (Blueprint $table) {
            $table->softDeletes();
            $table->timestamps();

            $table->text('location')->nullable();
            $table->text('purpose')->nullable();
            $table->text('session_feedback')->nullable();
            $table->text('session_comment')->nullable();
            $table->text('mentor_feedback')->nullable();
            $table->text('flags')->nullable();
        });
    }

    public function down()
    {
        Schema::table('mentee_evals', function (Blueprint $table) {
            $table->dropColumn([
                'location',
                'purpose',
                'session_feedback',
                'session_comment',
                'mentor_feedback',
                'flags',
                'deleted_at',
                'created_at',
                'updated_at'
            ]);
        });
    }
}
