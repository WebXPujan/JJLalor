<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('queries', function (Blueprint $table) {
            $table->id();
            $table->string('step_position', 100)->nullable();
            $table->string('category', 100)->nullable();
            $table->string('sub_category', 100)->nullable();
            $table->string('gender', 100)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->string('age', 100)->nullable();
            $table->string('dod', 100)->nullable();
            $table->string('border', 100)->nullable();
            $table->longText('front_cover')->nullable();
            $table->longText('back_cover')->nullable();
            $table->longText('inside_right')->nullable();
            $table->longText('inside_left')->nullable();
            $table->string('cover_type', 100)->nullable();
            $table->longText('photo')->nullable();
            $table->string('status', 100)->nullable();
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
        Schema::dropIfExists('queries');
    }
}
