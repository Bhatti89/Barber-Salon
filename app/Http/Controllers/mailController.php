<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;
use App\Mail\form_mail;
use App\Models\filing;
class mailController extends Controller
{
    //
    public function open_form()
{
return view('Mails/Mail_form');
}

public function send_mail(Request $req)
{
    
    $emails = [
        'email' => $req->input('email'),
        'cc' => $req->input('cc'),
        'bcc' => $req->input('bcc')
    ];
    $details = [
        'subject' => $req->input('subject'),
        'body' => $req->input('details')
    ];
    $req->validate([
        'file' => 'required|file|mimes:pdf,doc,docx,xls,xlsx,csv,zip,rar,jpg,jpeg,png,txt|max:45000',
    ]);
    
    
        $filename = time().'.'.$req->file('file')->extension();
        $req->file('file')->move('uploads', $filename);
        $filewritter = new filing;
        $filewritter -> file = $filename;
        $filewritter->save();
        
       
        $attachmentPath = public_path('uploads/' . $filename);
    
    
    if ($emails['cc'] == '' && $emails['bcc'] == '') {
        Mail::to($emails['email'])->send(new form_mail($details, $attachmentPath)); // Update the class name
        return redirect()->route('mail_form')->with('status', 'Email Sent Successfully!');
    } elseif ($emails['bcc'] == '') {
        Mail::to($emails['email'])->cc($emails['cc'])->send(new form_mail($details, $attachmentPath)); // Update the class name
        return redirect()->route('mail_form')->with('status', 'Email Sent Successfully!');
    } else {
        Mail::to($emails['email'])->cc($emails['cc'])->bcc($emails['bcc'])->send(new form_mail($details, $attachmentPath)); // Update the class name
        return redirect()->route('mail_form')->with('status', 'Email Sent Successfully!');
    }

}
public function show_file_data(){
    $data = filing::all();
    return view('Mails.showfile', compact('data'));
    }
public function file_view($id){
        $data = filing::find($id);
        return view ('Mails.view_file', compact('data'));
        }
        public function file_download($file)
        {
    
            $filePath = public_path('uploads/' . $file);
            
             return response()->download($filePath);
            
             
            
        }  
        

}
