<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard(){
        if(Auth::user()->role_as ==1){
            // $data['isSelected']=true;
            return view('admin.DasHBoard');
        }
       }
}
