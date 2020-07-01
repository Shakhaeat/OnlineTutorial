<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LectureList extends Model
{
	protected $fillable = ['course_id', 'lecture_title','lecture_file'];
	
    //This is belongs to Courses
    public function course() {

        return $this->belongsTo(Course::class);
    }

    //For one to many relationship with Comments
    public function comments() {
    	
        return $this->hasMany(Comment::class);
    }
}
