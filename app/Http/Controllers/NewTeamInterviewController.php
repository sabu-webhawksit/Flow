<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\SalesLead;
use App\Meeting;
use DB;
use App\Http\Requests\SalesLeadRequest;
use Auth;
use App\ClientEmployee;
use App\Candidate;
use Response;

class NewTeamInterviewController extends Controller
{
    public function index(){
       $this->authorize('team-interview');
        $tmsfes=DB::table('sales_leads')
            ->where('sales_leads.pitching_for',7)
            ->join('candidates','candidates.tmsf_id','=','sales_leads.id')
            ->where('candidates.status',1)
            ->groupBy('candidates.tmsf_id')
            ->select('sales_leads.*')
            ->paginate(15);
           // return $tmsfes;
        return view('teamnew.member.index')->with(compact('tmsfes'));
        
    }
    
    public function add($id){
        $sales_lead=Candidate::where('tmsf_id',$id)
        ->where('status',1)
        ->select('tmsf_id')
        ->first();
        $candidates=Candidate::where('tmsf_id',$id)
            ->where('status',1)
            ->get();
        $qty=Candidate::where('tmsf_id',$id)
        ->where('status',1)
        ->count();
      
        $client_info=SalesLead::find($id);
        return view('teamnew.member.add')->with(compact('sales_lead','client_info','qty','candidates'));
    }
    
    public function updateTeamViewer(Request $request){
        //return $request->all();
        for($i=0;$i<count($request->input('candidate_id'));$i++){
            $candidates=Candidate::find($request->input('candidate_id')[$i]);
            
            if ($request->hasFile('orientation_package')) {
                $file = $request->file('orientation_package')[$i];
                if($file){
                   $filename = $file->getClientOriginalName();
        	        $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	        $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	        $upload=$file->move(config('file.upload_folder'),$fullname);
                    $candidates->orientation_package=$fullname;  
                }
    	        
            }
             
             //full cv
            if($request->hasFile('talent_data')){
                $file = $request->file('talent_data')[$i];
                if($file){
                   $filename = $file->getClientOriginalName();
        	        $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	        $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	        $upload=$file->move(config('file.upload_folder'),$fullname);
                    $candidates->talent_data = $fullname; 
                }
             }
            $candidates->save();
        }
        return redirect(url('new-team-viewer'))->with('success','Candidate Update Successfully !');
    }
    
    public function viewTeamViewr($id){
        $sales_lead=Candidate::where('tmsf_id',$id)
            ->where('status',1)
            ->select('tmsf_id')
            ->first();
        $candidates=Candidate::where('tmsf_id',$id)
            ->where('status',1)
            ->get();
        $qty=Candidate::where('tmsf_id',$id)
        ->where('status',1)
        ->count();
        
        $client_info=SalesLead::find($id);
        return view('teamnew.member.view')->with(compact('candidates','sales_lead','qty','client_info'));
        
    }
    
    public function downloadOrentationPackage($id){
        $candidate=Candidate::find($id);
        $file= public_path(). "/uploads/".$candidate->orientation_package;
        return Response::download($file, $candidate->orientation_package);
    }
    public function downloadTalentData($id){
        $candidate=Candidate::find($id);
        $file= public_path(). "/uploads/".$candidate->talent_data;
        return Response::download($file, $candidate->talent_data);
    }
}
