<?php

namespace App\Http\Controllers;
use App\Course;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 


class CourseController extends Controller
{
    public function latestCourse(){

    	//return Course::all();//Show all course
    	//return Course::latest()->take(10)->get();
        return Course::latest()->get(['title', 'course_category', 'course_instructor','duration']);
    }

    public function courseByID($id){
    	
    	return Course::find($id);//Show a course using id
    }


    //Create New course
    public function store(Request $request)
    {
        if (Auth::check()) {
            //$user_id = Auth::id();
            $course = new Course;
            $course->title = $request->title;
            $course->level = $request->level;
            
            //For image upload
            $imageName = time().'.'.$request->image->extension(); 
            $course->image = $request->image->move(public_path('images'), $imageName);


            $course->description = $request->description;
            $course->course_category = $request->course_category;
            $course->course_instructor = $request->course_instructor;
            $course->duration = $request->duration;
            $course->total_class = $request->total_class;
            $course->department = $request->department;

            
   
            // $com->user_id = $user_id;
            // $com->lecture_list_id = $lecture_list_id;

            
            $course->save();

            return response()->json([
                'code'   => 200,
                'status' => true,
                'message'=> "Course Successfully Store",
            ], 200);
        }else{
            return response()->json([
                'code'   => 401,
                'status' => false,
                'message'=> "Unauthorized User",
            ], 401);
        }
       // Course::create($request->all());
         
    }
}
