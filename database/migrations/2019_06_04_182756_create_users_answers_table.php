<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('answer')->nullable();
            $table->unsignedInteger('answer_id');
            $table->unsignedInteger('user_id');
            $table->timestamps();

            $table->foreign('answer_id')->references('id')->on('answers');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_answers', function (Blueprint $table) {
            $table->dropForeign('users_answers_answer_id_foreign');
            $table->dropForeign('users_answers_user_id_foreign');
            $table->dropForeign('users_answers_question_id_foreign');
        });
        Schema::dropIfExists('users_answers');
    }
}
