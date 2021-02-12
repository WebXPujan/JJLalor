<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product', function (Blueprint $table) {
            $table->id()->unique()->change();
            $table->string('name')->change();
            $table->unsignedBigInteger('category')->change();
            $table->unsignedBigInteger('sub_category')->change();
            $table->unsignedBigInteger('verse')->change();
            $table->foreign('category')->references('id')->on('categories')->change();
            $table->foreign('sub_category')->references('id')->on('sub_categories')->change();
            $table->foreign('verse')->references('id')->on('verses')->change();
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
        Schema::dropIfExists('product');
    }
}
