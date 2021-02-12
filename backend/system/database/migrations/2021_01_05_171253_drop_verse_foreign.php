<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropVerseForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cover', function (Blueprint $table) {
            $table->id()->unique();
            $table->string('name');
            $table->unsignedBigInteger('category');
            $table->unsignedBigInteger('sub_category');
            $table->foreign('category')->references('id')->on('categories')->change();
            $table->foreign('sub_category')->references('id')->on('sub_categories')->change();
            $table->string('front_cover')->change();
            $table->string('back_cover')->change();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cover');
    }
}
