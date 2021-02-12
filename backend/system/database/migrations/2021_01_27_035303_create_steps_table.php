<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('steps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category')->nullable()->default(12);
            $table->bigInteger('sub_category')->nullable()->default(12);
            $table->bigInteger('step_position')->nullable()->default(12);
            $table->string('step_name', 100)->nullable()->default('text');
            $table->string('cover_type', 100)->nullable()->default('text');
            $table->string('step_type', 100)->nullable()->default('text');
            $table->string('description', 250)->nullable()->default('text');
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
        Schema::dropIfExists('steps');
    }
}
