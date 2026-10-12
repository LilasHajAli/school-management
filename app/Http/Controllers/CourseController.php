<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function sync($id){
        $course = Course::find($id);
        $course->students()->sync( [1 ]);
        return response()->json([
            'message'=> 'students in course',
            'data'=> $course->load('students')
        ]);
    }
}
