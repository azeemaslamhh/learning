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
        Schema::create('blog_post_and_blog_post_categories', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('blog_post_id')->unsigned()->nullable();
            $table->bigInteger('blog_post_category_id')->unsigned()->nullable();
            $table->foreign('blog_post_id')->references('id')->on('blog_posts')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('blog_post_category_id')->references('id')->on('blog_post_categories')->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('blog_post_and_blog_post_categories');
    }
};
