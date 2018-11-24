<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100)->comment('分类名称');
            $table->string('icon', 50)->nullable()->comment('分类图标');
            $table->string('desc')->nullable()->comment('分类描述');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级分类');
            $table->string('cover')->nullable()->comment('封面图片');
            $table->boolean('is_index')->default(false)->comment('是否首页跳转');
            $table->string('link')->nullable()->comment('跳转到固定的页面');
            $table->enum('link_target', ['_blank', '_self', '_parent', '_top'])->default('_self')
                ->comment('分类打开target');
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
        Schema::dropIfExists('categories');
    }
}
