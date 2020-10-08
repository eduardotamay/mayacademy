<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Course;

use Illuminate\Support\Facades\Auth;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth',["except"=>"show"]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::all();
        return view("courses.index",["courses"=>$courses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $course = new Course;
        return view("courses.create",['course'=>$course]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Para subir img
        $hasFile = $request->hasFile('img_course') && $request->img_course->isValid();

        $course = new Course;
        $course->name = $request->name;
        $course->description = $request->description;
        $course->pricing1 = $request->pricing;
        $course->user_id = Auth::user()->id;

        if ($hasFile) {
            $extension = $request->img_course->extension();
            $course->extension = $extension;
        }

        if ($course->save()) {
            if ($hasFile) {
                $request->file('img_course')->storeAS('img_courses',"$course->id.$request->name.$extension");
            }
            return redirect("/courses");
        }else{
            return view("courses.create");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //mostrar los productos a los usuarios
        $course = Course::find($id);
        return view('courses.show',['course'=>$course]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit',['course'=>$course]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $course = Course::find($id);
        $course->name = $request->name;
        $course->description = $request->description;
        $course->pricing1 = $request->pricing;
        $course->user_id = Auth::user()->id;

        if ($course->save()) {
            return redirect("/courses");
        }else{
            return view("courses.edit");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::destroy($id);
        return redirect('/courses');
    }
}
