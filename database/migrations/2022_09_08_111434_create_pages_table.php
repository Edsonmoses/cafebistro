<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('title')->default();
            $table->longText('body')->default();
            $table->string('image')->default();
            $table->string('signature')->default('favicon.ico');
            $table->string('postedby')->default();
            $table->bigInteger('pcategory_id')->unsigned()->nullable();
            $table->string('status')->default('1');
            $table->timestamps();
            $table->foreign('pcategory_id')->references('id')->on('pcategories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
