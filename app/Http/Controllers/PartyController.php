<?php

namespace App\Http\Controllers;

use App\Models\parties_type;
use App\Models\Party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PartyController extends Controller
{
 public function index(){
  //  $record=Party::get();
  $record=Party::with('parties_type')->get();
return view('admin.parties.list',compact('record'));
 }
 public function create(){
   $party_type=parties_type::get();
    return view('admin.parties.create',compact('party_type'));
 }
 public function store(Request $req){
   // dd($req->all());
 $validator=Validator::make($req->all(),[
   'parties_type_id'=>'required',
    'name'=>'required',
    'phone'=>'required|min:3',
    'address'=>'required',
    'account_holder_name'=>'required',
    'account_number'=>'required',
    'bank_name'=>'required',
    'ifsc_code'=>'required',
    'branch_address'=>'required',
 ]);
 if($validator->passes()){
   Party::create([
      'name'=>$req->name,
      'parties_type_id'=>$req->parties_type_id,
      'phone'=>$req->phone,
      'address'=>$req->address,
      'account_holder_name'=>$req->account_holder_name,
      'account_number'=>$req->account_number,
      'bank_name'=>$req->bank_name,
      'ifsc_code'=>$req->ifsc_code,
      'branch_address'=>$req->branch_address,
   ]);
    return response()->json([
        'status'=>true,
        'message'=>'parties created successfully',
    ]);
 }else{
   return response()->json([
      'status'=>false,
      'errors'=>$validator->errors(),
   ]);
 }
 }
public function edit(string $id){
  $data['party_type']=parties_type::get();
$data['edit']=Party::find($id);
return view('admin.parties.update',$data);
}
public function update(Request $req,string $id){
  $edit=Party::find($id);
  $validator=Validator::make($req->all(),[
    'parties_type_id'=>'required',
     'name'=>'required',
     'phone'=>'required|min:3',
     'address'=>'required',
     'account_holder_name'=>'required',
     'account_number'=>'required',
     'bank_name'=>'required',
     'ifsc_code'=>'required',
     'branch_address'=>'required',
  ]);
  if($validator->passes()){
   $edit->update([
       'name'=>$req->name,
       'parties_type_id'=>$req->parties_type_id,
       'phone'=>$req->phone,
       'address'=>$req->address,
       'account_holder_name'=>$req->account_holder_name,
       'account_number'=>$req->account_number,
       'bank_name'=>$req->bank_name,
       'ifsc_code'=>$req->ifsc_code,
       'branch_address'=>$req->branch_address,
    ]);
     return response()->json([
         'status'=>true,
         'message'=>'parties updated successfully',
     ]);
  }else{
    return response()->json([
       'status'=>false,
       'errors'=>$validator->errors(),
    ]);
  }


}
 public function Destroy(string $id){
  $id=Party::find($id);
  if(!empty($id)){
    $id->delete();
    return response()->json([
      'status'=>true,
      'message'=>'Party successfully Deleted'
    ]);
  }else{
    return response()->json([
      'status'=>false,
      'message'=>'Record did not found'
    ]);
  }
 }
}
