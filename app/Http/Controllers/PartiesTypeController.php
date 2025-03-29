<?php

namespace App\Http\Controllers;

use App\Models\parties_type;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;


class PartiesTypeController extends Controller
{
    public function parties_type(){
        // $party_type=parties_type::with('parties')->get();
        // return $party_type;
        $records=parties_type::get();
        return view('admin.parties_Type.list',compact('records'));
        // return view('admin.DasHBoard');
    }
    public function parties_type_add(){
return view('admin.parties_Type.add');
    }
    public function parties_type_store(Request $req){
$validator=Validator::make($req->all(),[
    'parties_name'=>'required|unique:parties_types'
]);
if($validator->fails()){
    return response()->json([
        'status'=>false,
        'message'=>'Record Did not  found ',
        'errors'=>$validator->errors(),
    ],422);
}else{
    parties_type::create([
        'parties_name'=>trim($req->parties_name),
    ]);
    return response()->json([
        'status'=>true,
        'message'=>'Record Added Successfully',
        'errors'=>[],
    ]);
}
    }
    public function parties_type_edit($id){
 $edit=parties_type::find($id);
 return view('admin.parties_Type.update',compact('edit'));

    }
    public function parties_type_update(Request $req,string $id){
        $update=parties_type::find($id);                    
        $validator=Validator::make($req->all(),[
            'parties_name'=>'required'
        ]);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Record Did not  found ',
                'errors'=>$validator->errors(),
            ]);
        }else{
            $update->update([
                'parties_name'=>trim($req->parties_name),
            ]);
            return response()->json([
                'status'=>true,
                'message'=>'Record updated Successfully',
                'errors'=>[],
            ]);
        }
            }
            public function parties_type_delete(String $id){
                $delteid=parties_type::find($id);
                $data=$delteid->delete();
                return response()->json([
                    'status'=>true,
                    'message'=>'Partie deleted successfully',
                    'record'=>$data,
                ]);
            }
            public function pdf_generator(){
                $getRecordAll=parties_type::get();
               $data=[
                'title'=>'Welcome to Talha Billing Softwere',
                'date'=>date('m/d/Y'),
                'parties'=>$getRecordAll,
               ];
        
            $pdf = Pdf::loadView('admin.parties_Type.pdf', $data);
            return $pdf->download('partiesType.pdf');
            }
            public function singlepdf_generator(String $id){
                $getsinglerecord=parties_type::find($id);
                $data=[
                    'title'=>"<h1>Programing & Web Development Tutorials and script</h1>",
                    'date'=>date('m/d/Y'),
                    'party'=>$getsinglerecord,
                ];
                
                    $pdf = Pdf::loadView('admin.parties_Type.pdfsingle', $data);
                    return $pdf->download('singleRecord.pdf');
            }
}