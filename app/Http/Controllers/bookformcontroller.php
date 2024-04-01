<?php

namespace App\Http\Controllers;
use App\Models\bookmodel;
use Illuminate\Http\Request;

class bookformcontroller extends Controller
{
    public function readbookforms()
    {
    // Fetch table contents, then
    // pass to the web page
    $stdHandler = bookmodel::latest()->get();
    // In the with statement below, the array name 
    // 'students' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.
    return view ("bookform/read")
    ->with(['bookforms' => $stdHandler]);}

    public function create() {
        return view ("bookform.create");
    }

    public function readbook(Request $request)
    {
    $stdHandler = bookmodel::where('name', $request->book_name)->get();
    return view("bookform.read")
    ->with(['bookforms' => $stdHandler]);
    }
    public function store(Request $request) {
 
        $student = new bookmodel; // Must import the Model file: use App\Student;
        $student->name = $request->get('name');
        $student->author = $request->get('author');
        $student->publisher = $request->get('publisher');
        $student->year_of_publisher = $request->get('y_publisher');
        $student->Number_of_pages = $request->get('N_pages');
        $student->language = $request->get('language');

       
 
 // Since the marital_status field has a default value of ZERO,
 // therefore, even if no text is copied from the text box
 // the value ZERO would be stored.
 //$student->marital_status = $request->get('marital_status'); 
         $student->save(); /* Store data inside the table */
 
 // --------------------------------------
 // Help on the following code is given at the following URL
 // https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
 //
        return redirect('bookform/create')->with('status', 'Name ' . $student->name . ' added successfully!');
 // --------------------------------------
    }
}
