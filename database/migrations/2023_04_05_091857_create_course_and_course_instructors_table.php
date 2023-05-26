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
        Schema::create('course_and_course_instructors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->bigInteger('course_instructor_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_instructor_id')->references('id')->on('course_instructors')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('course_and_course_instructors');
    }
};
