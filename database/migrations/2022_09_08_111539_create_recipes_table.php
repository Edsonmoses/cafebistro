<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecipesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->longText('directions')->default();
            $table->string('recipeName')->default();
            $table->longText('recipeDesc')->default();
            $table->string('descTitle')->default();
            $table->longText('nutrition')->default();
            $table->string('image')->default();
            $table->string('postedby')->default();
            $table->bigInteger('rcategory_id')->unsigned()->nullable();
            $table->string('status')->default('1');
            $table->timestamps();
            $table->foreign('rcategory_id')->references('id')->on('rcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recipes');
    }
}
