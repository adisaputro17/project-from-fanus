<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function loginpage(){
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('login');
        }
    }

    public function registerpage(){
        if(Auth::check()){
            return redirect('/');
        }else{
            return view('register');
        }
    }
    
    public function prosesregister(Request $request){

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('login')->with('status','register successfuly')->with('class','text-success');
    }

    public function proseslogin(Request $request){
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect('/');
        }else{
            return redirect('login')->with('status','login failed, check email or password')->with('class','text-danger');;
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('login')->with('status','logout successfuly')->with('class','text-success');
    }
}
