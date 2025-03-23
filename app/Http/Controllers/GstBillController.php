<?php

namespace App\Http\Controllers;

use App\Models\GstBill;
use App\Models\parties_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GstBillController extends Controller
{
  public function index(){
    
    return view('admin.GstBill.index');

  }
  public function create(){
 $parties_type=parties_type::all();
    return view('admin.GstBill.create',compact('parties_type'));
  }
  public function store(Request $req){
 $validator=Validator::make($req->all(),[
  'parties_type_id'=>'required',
  'invoice_date'=>'required',
  'invoice_no	'=>'required',
  'item_desc'=>'required',
  'total_amount'=>'required',
  'cgst_rate'=>'required',
  'sgst_rate'=>'required',
  'igst_rate'=>'required',
  'cgst_amount'=>'required',
  'sgst_amount'=>'required',
  'igst_amount'=>'required',
  'tax_amount'=>'required',
  'net_amount'=>'required',
  'declaration'=>'required',
 ]);

 if($validator->passes()){
  GstBill::create([
    'parties_type_id'=>$req->parties_type_id,
    'invoice_date'=>$req->invoice_date,
    'invoice_no'=>$req->invoice_no,
    'item_desc'=>$req->item_desc,
    'total_amount'=>$req->total_amount,
    'cgst_rate'=>$req->cgst_rate,
    'sgst_rate'=>$req->sgst_rate,
    'igst_rate'=>$req->igst_rate,
    'cgst_amount'=>$req->cgst_amount,
    'sgst_amount'=>$req->sgst_amount,
    'igst_amount'=>$req->igst_amount,
    'tax_amount'=>$req->tax_amount,
    'net_amount'=>$req->net_amount,
    'declaration'=>$req->declaration,
  ]);
  return response()->json([
    'status'=>true,
    'message'=>"Bill successfully add"
  ]);
  
 }else{
  return response()->json([
    'status'=>false,
    'errors'=>$validator->errors(),
  ]);
 }


  }
  public function edit(){

  }
  public function update(){

  }
  public function Destroy(){

  }
}
