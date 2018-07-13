<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Contact;
use Mail;

class ContactController extends Controller
{
    //
    public function contactSend(Request $request) 
   {
   	$input = Input::all();
   	$name = $input['contact_name'];
   	$from = $input['contact_email'];
   	$subject = $input['contact_subject'];
   	$message = $input['message'];

   	$contacts = new Contact();
   	$contacts->name = $name;
   	$contacts->email = $from;
   	$contacts->subject = $subject;
   	$contacts->message = $message;
	$contacts->updated_at = null;

	$contacts->save();

   	$data = array(
                'name' => $name,
                'email' => $from ,
                'subject' => $subject,
                'page' => 'Contact',
                'msg' => $request->message
            );
   
    Mail::send('contact-message',
       $data, function($message) use ($from, $subject, $name)
    {	
       $message->from($from, $name);
       $message->to('info@ovaismalik.com', 'Ovais Malik')->subject($subject);
    });

    return response()->json(['success' => 'Thanks for contacting us!']);
   }
}
