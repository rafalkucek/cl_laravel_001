<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_file', function (Blueprint $table) {
            $table->integer('article_id')->unsigned();
            $table->integer('file_id')->unsigned();

            $table->foreign('article_id')
                ->references('id')
                ->on('articles');

            $table->foreign('file_id')
                ->references('id')
                ->on('files');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('article_file');
    }
}
