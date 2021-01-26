<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateVerseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verses', function (Blueprint $table) {
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('sub_category');
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('sub_category')->references('id')->on('sub_categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
