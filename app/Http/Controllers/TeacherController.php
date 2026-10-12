<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
     public  function store(Request $request){
        $user = User::create([
            'name'=> $request ->name,
            'email'=>$request ->email ,
            'password'=>$request ->password
        ]);

        $teacher =$user->teacher() ->create([
            'joining_date' => $request->joining_date,
            'certification' => $request ->certification,

        ]);
        return response()->json([
            'message'=> 'User as Teacher created successfully' ,
             'data' =>['user'=>$user,'teacher'=> $teacher]],201);
     }


    public function index(){
        $teachers = Teacher::with('user')->get();
        return response()->json($teachers);
    }

    public function show($id){
        $teachers = Teacher::find($id);
        return response()->json($teachers->courses);
    }

    public function createMany($id){
       $teacher = Teacher::find($id);
       $courses = $teacher->courses()->createMany([
       ['name' => 'PHP'],
       ['name' => 'LARAVEL'],
       ['name'=> 'C++']
       ]);
       return response()->json([
       'message'=> 'courses attached to teacher' ,
       'data'=> [$courses]
       ]);
    }

}
