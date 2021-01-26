<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('template', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->string('border_style');
            $table->longText('inside_right');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('sub_category');
            $table->unsignedBigInteger('cover_id');
            $table->unsignedBigInteger('verse_id');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('sub_category')->references('id')->on('sub_categories');
            $table->foreign('cover_id')->references('id')->on('cover');
            $table->foreign('verse_id')->references('id')->on('verses');
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
        Schema::dropIfExists('template');
    }
}
