<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {

    /**
     * Run the migrations.
     * One to many relationship tutorial
     * scratchcode.io
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('problem_list_id')->unsigned();
            $table->string("comment");
            $table->timestamps();
            $table->foreign('problem_list_id')->references('id')->on('problem_lists')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     * One to many relationship tutorial
     * scratchcode.io
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        Schema::dropForeign('problem_list_id');
        Schema::dropColumn('problem_list_id');
       
    }
};