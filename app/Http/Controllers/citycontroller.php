<?php

namespace App\Http\Controllers;
use App\Models\city;
use Illuminate\Http\Request;

class citycontroller extends Controller
{
    public function create() {
        return view ('city/create');
    }

    public function store(Request $request) {
 
        $b = new city; // Must import the Model file: use App\Student;
        $b->city = $request->get('cit');
        
 
         $b->save(); 
 
 
        return redirect('city/create')->with('status', 'Name ' . $b->city . ' added successfully!');
    }
}
