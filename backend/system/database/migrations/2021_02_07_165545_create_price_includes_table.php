<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceIncludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_includes', function (Blueprint $table) {
            $table->id();
            $table->string('category', 100)->nullable()->default('text');
            $table->string('additional_qty', 100)->nullable()->default('text');
            $table->string('additional_price', 100)->nullable()->default('0');
            $table->string('includes', 100)->nullable()->default('text');
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
        Schema::dropIfExists('price_includes');
    }
}
