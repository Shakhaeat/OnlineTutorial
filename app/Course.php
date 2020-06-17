<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //This is belongs to User
    public function users() {

        return $this->belongsToMany(User::class)->withTimeStamps();
    }

    //For one to many relationship with lecture_list
    public function lecture_lists() {
    	
        return $this->hasMany(LectureList::class);
    }
}
