<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GlossaryController extends Controller
{
    //
    public function showGlossary()
    {
        //f(Auth::check()){
            
            return view('client.glossary');

       // }

       // return redirect::to("/")->withError('Oopps! You do not have access');
        
    }
}
