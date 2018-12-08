<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //

    public function makeSignUp(Request $request){

        $this->validate($request,[
            'email' => 'required|email|unique:users|',
            'password' => 'required|min:4'
        ]);

        $user = new User();

        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);

        $user->save();

        return redirect()->back()->with(['message_signup'=>'u have been successfuly register']);
    }

    public function makeSignIn(Request $request){

        $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email'=>$request['email'],'password'=>$request['password']])){

            return redirect()->route('dashboard');
        }

        return redirect()->back()->with(['message'=>'email or password not match']);
    }

}
