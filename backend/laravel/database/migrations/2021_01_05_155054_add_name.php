<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddName extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
        Schema::table('product', function (Blueprint $table) {
            
            $table->foreign('category')->references('id')->on('categories');
            $table->foreign('sub_category')->references('id')->on('sub_categories');
            $table->foreign('verse')->references('id')->on('verses');
          
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
