<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function showLogin(){

        return view('auth.login');

    }

    public function showProfile()
    {

       // if(Auth::check()){

            return view('client.profile');

      //  }

       // return redirect::to("/")->withError('Oopps! You do not have access');
 
    }

    public function updatePassword(Request $request){
     
        $rules = [
            'mypassword' => 'required',
            'password'   => 'required|confirmed|min:6|max:18'
    
        ];
        $message = [
        'mypassword.required' => 'The field is required',
        'password.required'   => 'The field is required',
        'password.confirmed'  => 'Passwords do not match',
        'password.min'        => 'The minimum allowed is 6 characters',
        'password.max'        => 'The maximum allowed is 18 characters'
    
        ];
    
        $validator = Validator::make($request->all(),$rules,$message);
    
        if($validator->fails()){
            return redirect ('profile')->withErrors($validator);
    
        }
        else{
    
            if(Hash::check($request->mypassword,Auth::user()->password)){
                $user = new User;
                $user->where('email','=',Auth::user()->email)
                ->update(['password'=>Hash::make($request->password)]);

                return redirect('profile')->with('status','password successfully updated');
            } 
            else{
    
                return redirect('profile')->with('message','Incorrect password');
    
            } 
        }
     }
}
