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
            $table->string('image');
            $table->text('description');
            $table->string('course_category')->nullable();
            $table->string('course_instructor');
            $table->string('duration');
            $table->integer('total_class');
            $table->string('department');
            $table->integer('price');

          //  $table->string('rating', 5)->nullable();
            // $table->string('review');
            //$table->string('price');
            //$table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
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
