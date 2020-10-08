<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Course;

class MainController extends Controller
{
    public function welcome()
    {
        $courses = Course::latest()->simplePaginate(10);
        return view('welcome',['courses'=>$courses]);
    }

    public function home()
    {   
        return view('main.home');
    }

    public function courseslist()
    {
        $courses = Course::latest()->simplePaginate(10);
        return view("courses.list_courses",["courses"=>$courses,"count"=>3]);
    }

    public function profile()
    {
        return view('teacher.profile');
    }

    public function contact()
    {
        return view('main.contact');
    }
}
