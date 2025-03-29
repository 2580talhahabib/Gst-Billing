<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MyAccountController extends Controller
{
    public function myaccount(){
        return view('admin.MyAccount.update');
    }
    public function myaccount_update(Request $req)
{
    $user = Auth::user();
    
    $validator = Validator::make($req->all(), [
        'email' => 'required|email|unique:users',
    ]);

    if($validator->passes()) {
        $updateData = [
            'email' => $req->email,
        ];
        if($req->name){
            $updateData['name']=$req->name;
        }
        if($req->password){
            $updateData['password'] = Hash::make($req->password);
        }

        if ($req->hasFile('image')) {
            if ($user->image) {
                Storage::delete('public/uploads/'.$user->image);
            }
            
            $file = $req->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->storeAs('uploads', $filename, 'public');
            $updateData['image'] = $filename;
        }

        User::where('id', $user->id)->update($updateData);

    return response()->json([
        'status'=>true,
        'message'=>'User Updated Successfully',
        'Data'=>$updateData,
    ]);
    } else{
        return response()->json([
            'status'=>false,
             'errors'=>$validator->errors(),
        ]);
    }
}
}