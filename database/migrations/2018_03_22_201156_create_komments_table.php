<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('author');
            $table->text('content');
            $table->integer('article_id')
                ->unsigned()
                ->nullable();
            $table->foreign('article_id')
                ->references('id')
                ->on('articles')
                ->onDelete('SET NULL');
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
        Schema::dropIfExists('komments');
    }
}
