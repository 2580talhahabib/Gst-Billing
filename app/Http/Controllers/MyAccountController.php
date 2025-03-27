<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyAccountController extends Controller
{
    public function myaccount(){
        return view('admin.MyAccount.update');
    }
    public function myaccount_update(Request $req){
        dd($req->all());
    }
}