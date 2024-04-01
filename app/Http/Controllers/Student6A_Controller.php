<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student6A;
use App\Models\Department;
use App\Models\city;


class Student6A_Controller extends Controller
{
    public function readStudents6A()
    {
    
    // Fetch table contents, then
    // pass to the web page
    $stdHandler = Student6A::latest()->get();
    // In the with statement below, the array name 
    // 'students' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.
    return view ("student/read")
    ->with(['students' => $stdHandler]);}

    //
    public function create() {
        //$departments = Department::all(); // Load all departments. To add in the dropdown
        $cit=city::all();
        return view ("student/create")
        ->with(['city' => $cit]);
    }       
    public function store(Request $request) {
 
        $student = new Student6A; // Must import the Model file: use App\Student;
        $student->name = $request->get('name');
        $student->registration_no = $request->get('reg');
        $student->email = $request->get('email');
        $student->gender = $request->get('gen');
        $student->dob = $request->get('Dob');
        $student->city_id = $request->get('city');


        // This is Foreign Key value in Student Table
        // It is taken from Drop Down list which was
        // populated in Create() from the Department Table
       // $student->department_id = $request->get('department');

 
 // Since the marital_status field has a default value of ZERO,
 // therefore, even if no text is copied from the text box
 // the value ZERO would be stored.
 //$student->marital_status = $request->get('marital_status'); 
         $student->save(); /* Store data inside the table */
 

// public function loadCreareWithFKPage();
// {
//     $depHandler = Department::all();
//     return view("student6A/createWithFK")
//     ->with(['depts' =>$department])
// }

 // --------------------------------------
 // Help on the following code is given at the following URL
 // https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
 //
        return redirect('student6A/create')->with('status', 'Name ' . $student->name . ' added successfully!');
 // --------------------------------------
    }
    public function delete() {
        return view ("student.delete");
    }
    public function deleterecord(Request $request){
        $stdHandler=Student6A::where('registration_no', $request->reg);
        $stdHandler->delete();
        return redirect('student6A/read');
    }
    
    public function destroy(Request $request, $id)
{
    $student = Student6A::where('registration_no',$id);
    $student->delete();
    return redirect('student6A/read');
}

public function edit(Request $request, $reg) { 
 
    $students = Student6A::where('registration_no',$reg)->first();// Load students using the model 'Student'
    
    // Pass the $students to the view, 'student/update'
    // so that user can update.
    return view('student/update')
    ->with(['student' => $students]);
    }

    public function update(Request $request, $reg) {
 
        // Locate the row of this CNIC so that updated record
        // can be overwritten ONLY on the previous record of this CNIC.
        $student = Student6A::where('registration_no',$reg)->first();
        // you can add the chech here whether this student exists or not?
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->gender = $request->input('gen');
        $student->dob = $request->input('Dob');
        
        // Since the marital_status field has a default value of ZERO,
        // therefore, even if no text is copied from the text box
        // the value ZERO would be stored.
        //$student->marital_status = $request->get('marital_status'); 
        $student->save(); /* Overwrite data on the row pointed by CNIC */
        
        // -------------------------------------
         // Help on the following code is given at the following URL
    // https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
    //
    return redirect('student6A/read')
    ->with('status', 'Registration No: ',$student->reg,' updated Successfully!');
 // --------------------------------------
 }


}
