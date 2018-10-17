<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade as PDF;
use App\NdaTamplate;
use App\Nda;

class NdaController extends Controller
{
   public function index($id){
        return view('nda.index')->with(['tms_id'=>$id]);
    }
    
    public function getNdaTemplate($name){
        $template=NdaTamplate::where('nda_type',$name)->first();
        return $template;
    }
    
    public function postAddNda(Request $request){
        $nda=new Nda;
        $nda->nda_type=$request->input('agreement_title');
        $nda->tms_id=$request->input('tms_id');
        $nda->nda_body=$request->input('agreement_body');
        $nda->save();
        return redirect('sales-lead')->with('success','Nda added Successfully!');
    }
    
    public function getView($id){
        
        $agreement=Nda::where('tms_id',$id)->first();
        return view('nda.view')->with(compact('agreement'));
    }
    public function updateNda(Request $request){
        
        $agreement=Nda::find($request->input('tms_id'));
        $agreement->nda_type=$request->input('agreement_title');
        $agreement->nda_body=$request->input('agreement_body');
        $agreement->save();
        return redirect('sales-lead')->with('success','NDA Update Successfully!');
    }
    public function getPdfNda($id){
        $agreement=Nda::where('tms_id',$id)->first();
        //return $agreement;
        $view =  \View::make('pdf.nda', compact('agreement'))->render();
        $dompdf = new \DOMPDF();
        $dompdf->load_html($view);
        $dompdf->render();
        $dompdf->get_canvas()->get_cpdf()->setEncryption("pass", "pass");
        return $dompdf->stream('nda.pdf');
       
    }
    
}
