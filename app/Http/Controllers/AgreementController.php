<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\AgreementTemplate;
use App\Agreement;
use Barryvdh\DomPDF\Facade as PDF;



class AgreementController extends Controller
{
    
    public function index($id){
        return view('agreement.index')->with(['tms_id'=>$id]);
    }
    
    public function getAgreementTemplate($name){
        $template=AgreementTemplate::where('agreement_type',$name)->first();
        return $template;
    }
    
    public function getView($id){
        $agreement=Agreement::where('tms_id',$id)->first();
        return view('agreement.view')->with(compact('agreement'));
    }
    public function updateAgreement(Request $request){
        $agreement=Agreement::find($request->input('tms_id'));
        $agreement->agreement_type=$request->input('agreement_title');
        $agreement->agreement_body=$request->input('agreement_body');
        $agreement->save();
        return redirect('sales-lead')->with('success','Agreement Update Successfully!');
    }
    
    public function getPdfAgreement($id){
        $agreement=Agreement::where('tms_id',$id)->first();
        $view =  \View::make('pdf.agreement', compact('agreement'))->render();
        $dompdf = new \DOMPDF();
        $dompdf->load_html($view);
        $dompdf->render();
        $dompdf->get_canvas()->get_cpdf()->setEncryption("pass", "pass");
        return $dompdf->stream('agreement.pdf');
       
    }
    
    public function postAddAgreement(Request $request){
        $request['agreement_type']=$request->input('agreement_title');
        if(Agreement::create($request->all())){
            return redirect('sales-lead')->with('success','Agreement added Successfully!');
        }
    }
    
}