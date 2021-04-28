<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class NewsletterController extends Controller
{
    //
    public function subscribe(){

        $email = request('email');
        
        //Session::flash('subscribed', 'Vous êtes abonné à la Newsletter');

        return Newsletter::subscribe($email);
    }
}
