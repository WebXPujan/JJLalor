<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('covers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('category')->change();
            $table->unsignedBigInteger('sub_category')->change();
            $table->string('photo');
            $table->string('cover_type');
            $table->longText('cover_type_html')->nullable();
            $table->longText('cover_type_text')->nullable();
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
        Schema::dropIfExists('covers');
    }
}
