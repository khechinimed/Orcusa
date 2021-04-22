<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //
    public function send(ContactRequest $request){
        $details = $request->validated();

        Mail::to('khechinibakr20@gmail.com')->send(new ContactMail($details));
    }
}
