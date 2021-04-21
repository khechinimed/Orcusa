<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send(Request $request){
        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'demande' => $request->demande,
            'message' => $request->message
        ];

        Mail::to('khechinibakr20@gmail.com')->send(new ContactMail($details));
    }
}
