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
        Schema::create('quiz_options', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_id')->unsigned();
            $table->bigInteger('quiz_question_id')->unsigned();
            $table->string('option_name');
            $table->boolean('correct_option')->default(false);  // false refer to not correct answers
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('quiz_question_id')->references('id')->on('quiz_questions')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('quiz_answers');
    }
};
