<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //This is belongs to a User
    public function user() {

        return $this->belongsTo(App\User::class);
    }

    //This is also belongs to Lecture List

    public function lecture_list() {

        return $this->belongsTo(LectureList::class);
    }
}
