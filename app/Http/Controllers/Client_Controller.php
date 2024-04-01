<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Clients;

class Client_Controller extends Controller
{
    //
    public function readClients()
    {
    // Fetch table contents, then
    // pass to the web page
    
    $salon = Clients::all();
    // In the with statement below, the array name 
    // 'clients' is being passed to the web page (view),
    // where we shall use it in the foreach loop there.

    return view ("client/read")
    ->with(['clients' => $salon]);}
    public function create() {
        return view ("client.create");
    }
    public function store(Request $request) {
        $client = new Clients; 
        $client->first_name = $request->get('name');
        $client->last_name = $request->get('L_name');
        $client->user_name = $request->get('U_name');
        $client->password = $request->get('pass');
        $client->email = $request->get('mail');
        $client->gender = $request->get('gen');    
        $client->save();
        return redirect('client/create')->with('status', 'Client name ' . $client->first_name . ' added successfully!');
   }
   public function destroy(Request $request, $id)
   {
       $client = Clients::where('id',$id);
       $client->delete();
       return redirect('client/read');
   } 
   public function edit(Request $request, $id) { 
    $clients = Clients::where('id',$id)->first();// Load clients using the model 'Clients' 
    // Pass the $clients to the view, 'client/update'
    // so that user can update.
    return view('client/update')
    ->with(['client' => $clients]);
    }
    public function update(Request $request, $id) {
        $client = Clients::where('id',$id)->first();
        $client->first_name = $request->input('name');
        $client->last_name = $request->input('L_name');
        $client->user_name = $request->input('U_name');
        $client->password = $request->input('pass');
        $client->email = $request->input('mail');
        $client->gender = $request->input('gen');       
        $client->save();
        return redirect('client/read')
        ->with('status', 'User Name ',$client->user_name,' updated Successfully!');
 }
}
