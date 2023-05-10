<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMangaDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manga_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('manga_id');
            $table->tinyInteger('manga_status');
            $table->integer('author_id');
            $table->string('other_name');
            $table->string('title');
            $table->tinyInteger('age_range');
            $table->text('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manga_detail');
    }
}
