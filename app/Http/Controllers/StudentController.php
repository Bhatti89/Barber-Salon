<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
   public function readStudents()
   {
      $stdHandler = Student::all();
      return view ("student/read") 
      ->with(['ABC' =>$stdHandler]);
   }
}
