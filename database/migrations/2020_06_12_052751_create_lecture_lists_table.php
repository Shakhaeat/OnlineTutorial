<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLectureListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture_lists', function (Blueprint $table) {
           // $table->id();
            $table->bigIncrements('id');
            $table->unsignedBigInteger('course_id');    
            $table->string('lecture_title');
            $table->string('lecture_file');
           // $table->string('level');
            $table->timestamps();
           
           $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture_lists');
    }
}
