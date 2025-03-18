<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PhpParser\Node\Stmt\TryCatch;

class PartiesTypeController extends Controller
{
    public function parties_type(){
        return view('admin.parties_Type.list');
        // return view('admin.DasHBoard');
    }
    public function parties_type_add(){
return view('admin.parties_Type.add');
    }
    public function parties_type_store(Request $req){
$validator=Validator::make($req->all(),[
    'parties_name'=>'required|unique:parties_type'
]);
if($validator->fails()){
 

    return response()->json([
        'status'=>false,
        'message'=>'Record Did not  found ',
        'errors'=>$validator->errors(),
    ]);
}else{
    return response()->json([
        'status'=>true,
        'message'=>'Record Added Successfully',
        'errors'=>[],
    ]);
}
    }
}
