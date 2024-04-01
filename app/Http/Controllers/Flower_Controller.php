<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flower;

class Flower_Controller extends Controller
{
    //
    public function readFlowers()
    {
    // Fetch table contents, then
    // pass to the web page
    
    $stdHandler = Flower::all();
    // In the with statement below, the array name 
    // 'flowers' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.

    return view ("flower/read")
    ->with(['flowers' => $stdHandler]);}

    public function create() {
        return view ("flower.create");
    }

    public function store(Request $request) {
 
        $flower = new Flower; 
        $flower->name = $request->get('name');
        $flower->type = $request->get('type');
        $flower->save();

return redirect('flower/create')->with('status', 'Name ' . $flower->name . ' added successfully!');
// --------------------------------------
   }

   
   public function delete() {
    return view ("flower.delete");
}
public function deleterecord(Request $request){
    $stdHandler=Flower::where('type', $request->type);
    $stdHandler->delete();
    return redirect('flower/read');
}

// public function destroy(Request $request, $id)
// {
// $flower = Flower::where('type',$id);
// $flower->delete();
// return redirect('flower/read');
// }

public function edit(Request $request, $type) { 

$flowers = Flower::where('type',$type)->first();// Load students using the model 'Student'

// Pass the $students to the view, 'student/update'
// so that user can update.
return view('flower/update')
->with(['flower' => $flowers]);
}

public function update(Request $request, $type) {

    // Locate the row of this CNIC so that updated record
    // can be overwritten ONLY on the previous record of this CNIC.
    $flower = Flower::where('type',$type)->first();
    // you can add the chech here whether this student exists or not?
    $flower->name = $request->input('name');
  
    
    // Since the marital_status field has a default value of ZERO,
    // therefore, even if no text is copied from the text box
    // the value ZERO would be stored.
    //$student->marital_status = $request->get('marital_status'); 
    $flower->save(); /* Overwrite data on the row pointed by CNIC */
    
    // -------------------------------------
     // Help on the following code is given at the following URL
// https://laravel.com/docs/5.8/redirects#redirecting-with-flashed-session-data
//
return redirect('flower/read')
->with('status', 'Type: ',$flower->type,' updated Successfully!');
// --------------------------------------
}

}
