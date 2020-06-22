<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
           // $table->id();
           //$table->char('review', 5);
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');    
            $table->unsignedBigInteger('lecture_list_id'); 
            $table->integer('rating');  
            $table->text('comment');
           // $table->timestamps();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
           $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('lecture_list_id')->references('id')->on('lecture_lists')->onDelete('cascade');

            // $table->foreignId('user_id')
            //      // ->constrained()
            //       ->references('id')
            //       ->on('users')
            //       ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
        // $table->dropColumn('user_id');
    }
}
