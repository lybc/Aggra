<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('文章标题');
            $table->string('slug')->nullable();
            $table->enum('status', ['draft', 'published'])->default('published')->comment('文章状态');
            $table->text('content')->comment('文章内容');
            $table->unsignedInteger('views')->default(0)->comment('文章点击数');
            $table->unsignedInteger('comments')->default(0)->comment('文章回复数');
            $table->unsignedInteger('category_id')->comment('文章所属分类');
            $table->softDeletes();
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
        Schema::dropIfExists('posts');
    }
}
