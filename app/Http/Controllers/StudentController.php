<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{

public  function store(Request $request){
        $user = User::create([
            'name'=> $request ->name,
            'email'=>$request ->email ,
            'password'=>$request ->password
        ]);

        $student =$user->student() ->create([
            'age' => $request->age,
        ]);
        return response()->json([
            'message'=> 'User as Student created successfully' ,
             'data' =>['user'=>$user,'student'=> $student]],201);
     }

    public function index(){
       $students = Student::with('user')->get();
      return response()->json($students);
    }

    public function show($id){
        $course = Course::find($id);
        $course->students()->attach([1]);
        return response()->json([
            'message'=> 'students in a course' ,
            'data'=> [$course->students]
        ]);
    }
}
