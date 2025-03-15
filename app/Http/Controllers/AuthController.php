<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(){
        $data['meta_title']='Register Page';
        return view('auth.register',$data);
    }
    public function login(){
        $data['meta_title']='Login Page';
        return view('auth.login',$data);
    }
    public function forgot_passwor(){
        $data['meta_title']='Forgot Password';
         return view('auth.forgot_password',$data);
    }
}
