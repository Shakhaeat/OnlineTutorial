<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            //$table->id();
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('level');
            $table->text('description');
            $table->string('duration');
            $table->integer('total_class');
            $table->string('department');
            $table->string('rating', 5)->nullable();
            $table->string('review');
        //    $table->string('price');
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
        Schema::dropIfExists('courses');
    }
}
