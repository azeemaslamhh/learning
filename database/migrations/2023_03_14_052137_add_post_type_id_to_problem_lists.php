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
        Schema::table('problem_lists', function (Blueprint $table) {
            $table->bigInteger('post_type_id')->unsigned()->nullable();
            $table->foreign('post_type_id')->references('id')->on('post_types')->onUpdate('cascade')->onDelete('cascade');
      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('problem_lists', function (Blueprint $table) {
            $table->dropForeign(['post_type_id']);
            $table->dropColumn('post_type_id');
        });
    }
};
