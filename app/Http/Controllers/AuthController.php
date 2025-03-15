<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(){
        $data['meta_title']='Register Page';
        return view('auth.register',$data);
    }
    public function register_auth(Request $req){
        $req->validate([
           'name'=>'required',
           'email'=>'required|unique:users',
           'password'=>'required|min:3',
        ]);
       
        User::create([
           'name'=>trim($req->name),
           'email'=>trim($req->email),
           'password'=>Hash::make($req->password),
           'remember_token'=>Str::random(50),
        ]);
        return redirect()->route('login')->with('success','User register Successfully');
           }
    public function login(){
        $data['meta_title']='Login Page';
        return view('auth.login',$data);
    }
    public function loginauth(Request $req){
         if(Auth::attempt(['email'=>$req->email,'password'=>$req->password],true)){
            if(Auth::user()->role_as == '1'){
                return redirect()->route('dashboard')->with('success','User Login Successfully');
            }else{
                return redirect()->route('login')->with('danger',' you are not admin');
            }
         }else{
            return redirect()->route('login')->with('danger','Either Email/password is incorrect');

         };
    }
    public function forgot_passwor(){
        $data['meta_title']='Forgot Password';
         return view('auth.forgot_password',$data);
    }
   public function dashboard(){
    return view('DasHBoard');
   }
}
