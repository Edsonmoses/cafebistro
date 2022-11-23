<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBistroTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bistro_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name')->default();
            $table->string('slug')->default();
            $table->longText('desc');
            $table->string('position')->default();
            $table->string('image')->default('favicon.ico');
            $table->string('status')->default('1');
            $table->string('postedby')->default();
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
        Schema::dropIfExists('bistro_testimonials');
    }
}
