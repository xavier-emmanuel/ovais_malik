<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
