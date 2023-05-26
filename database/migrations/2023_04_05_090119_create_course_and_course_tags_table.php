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
        Schema::create('course_and_course_tags', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('course_id')->unsigned()->nullable();
            $table->bigInteger('course_tag_id')->unsigned()->nullable();
            $table->foreign('course_id')->references('id')->on('courses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('course_tag_id')->references('id')->on('course_tags')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('course_and_course_tags');
    }
};
