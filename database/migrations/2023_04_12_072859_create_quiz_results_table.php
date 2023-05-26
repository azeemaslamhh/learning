<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_results', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('quiz_id')->unsigned();
            $table->bigInteger('quiz_question_id')->unsigned();
            $table->bigInteger('quiz_option_id')->unsigned();
            $table->float('obtain_score');
            $table->float('total_score');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quiz_option_id')->references('id')->on('quiz_options')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz_results');
    }
};
