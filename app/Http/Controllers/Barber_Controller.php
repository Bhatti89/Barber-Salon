<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barber;


class Barber_Controller extends Controller
{
    public function readBarbers()
    {
    
    // Fetch table contents, then
    // pass to the web page
    $stdHandler = Barber::latest()->get();
    // In the with statement below, the array name 
    // 'barbers' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.
    return view ("barber/read")
    ->with(['barbers' => $stdHandler]);}
    //
    public function create() {
        return view ("barber.create");
    }
    public function store(Request $request) {
 
        $barber = new Barber; // Must import the Model file: use App\Student;
        $barber->first_name = $request->get('first_name');
        $barber->last_name = $request->get('last_name');
        $barber->email = $request->get('email');
        $barber->gender = $request->get('gender');
        $barber->user_name = $request->get('user_name');
        $barber->password = $request->get('password');
 
        $barber->save(); /* Store data inside the table */
 
 // --------------------------------------
 // Help on the following code is given at the following URL
 // https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
 //
        return redirect('barber/create')->with('status', 'User name ' . $barber->name . ' added successfully!');
 // --------------------------------------
    }
//     public function delete() {
//         return view ("student.delete");
//     }
//     public function deleterecord(Request $request){
//         $stdHandler=Student6A::where('registration_no', $request->reg);
//         $stdHandler->delete();
//         return redirect('student6A/read');
//     }
    
//     public function destroy(Request $request, $id)
// {
//     $student = Student6A::where('registration_no',$id);
//     $student->delete();
//     return redirect('student6A/read');
// }

// public function edit(Request $request, $reg) { 
 
//     $students = Student6A::where('registration_no',$reg)->first();// Load students using the model 'Student'
    
//     // Pass the $students to the view, 'student/update'
//     // so that user can update.
//     return view('student/update')
//     ->with(['student' => $students]);
//     }

//     public function update(Request $request, $reg) {
 
//         // Locate the row of this CNIC so that updated record
//         // can be overwritten ONLY on the previous record of this CNIC.
//         $student = Student6A::where('registration_no',$reg)->first();
//         // you can add the chech here whether this student exists or not?
//         $student->name = $request->input('name');
//         $student->email = $request->input('email');
//         $student->gender = $request->input('gen');
//         $student->dob = $request->input('Dob');
        
//         // Since the marital_status field has a default value of ZERO,
//         // therefore, even if no text is copied from the text box
//         // the value ZERO would be stored.
//         //$student->marital_status = $request->get('marital_status'); 
//         $student->save(); /* Overwrite data on the row pointed by CNIC */
        
//         // -------------------------------------
//          // Help on the following code is given at the following URL
//     // https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
//     //
//     return redirect('student6A/read')
//     ->with('status', 'Registration No: ',$student->reg,' updated Successfully!');
//  // --------------------------------------
//  }


}