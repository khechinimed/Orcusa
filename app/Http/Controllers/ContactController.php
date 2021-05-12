<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Models\Adhesion;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function send(ContactRequest $request){
        $details = $request->validated();

        Mail::to('khechinibakr20@gmail.com')->send(new ContactMail($details));
    }

    public function demande(Request $request){
        //validation
        $request->validate([
            'fullName' => 'required',
            'email' => 'required|email',
            'date' => 'required',
            'ville' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'message' => 'required',
        ]);

        $demande = Adhesion::create([
            'fullName' => $request->fullName,
            'email' => $request->email,
            'date' => $request->date,
            'ville' => $request->ville,
            'adresse' => $request->adresse,
            'telephone' => $request->telephone,
            'message' => $request->message,
        ]);
        return $demande;
    }
}
