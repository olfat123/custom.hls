<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AcademyController extends Controller
{
    //
    public function showAcademy(){

       // if(Auth::check()){

             return view('client.academy');

       // }

        //return redirect::to("/")->withError('Oopps! You do not have access');
    }
}
