<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Department;

class Department_Controller extends Controller
{
    public function readDepartments()
    {
    // Fetch table contents, then
    // pass to the web page
    $salon = Department::all();
    // In the with statement below, the array name 
    // 'orders' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.

    return view ("department/read")
    ->with(['departments' => $salon]);}
    public function create() 
    {
        return view ("department.create");
    }
    public function store(Request $request) 
    {
        $department = new Department; 
        $department->name = $request->get('name');
       
        $department->save();
        return redirect('department/create')->with('status',  'department detail added successfully!');
    }
   public function destroy(Request $request, $id)
   {
       $department = Department::where('id',$id);
       $department->delete();
       return redirect('department/read');
   }
   public function edit(Request $request, $id) { 
    $departments = Department::where('id',$id)->first();// Load orders using the model 'Order'
    // Pass the $orders to the view, 'order/update'
    // so that user can update.
    return view('department/update')
    ->with(['department' => $departments]);
    }
    public function update(Request $request, $id) {
        $department = Department::where('id',$id)->first();
        $department->name  = $request->input('name');
    
        $department->save();
        return redirect('department/read')
        ->with('status', 'Department',$department->name,' updated Successfully!');
    }
}
