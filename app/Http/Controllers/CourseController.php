<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
    	return User::all();
    }
}
