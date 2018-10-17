<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Candidate;
use App\ClientEmployee;
use DB;
use App\SalesLead;
use Response;


class CandidateController extends Controller
{
   public function postAddCandidate(Request $request){
        
        for($i=0;$i<count($request->input('candidate_name'));$i++){
            $candidates=new Candidate;
            $candidates->candidate_name=$request->input('candidate_name')[$i];
            $candidates->others_one=$request->input('education')[$i];
            $candidates->candidate_skills=$request->input('candidate_skills')[$i];
            $candidates->candidate_experience=$request->input('candidate_experience')[$i];
            $candidates->joining_date=date_format(date_create($request->input('joining_date')[$i]),'Y-m-d H:i:s');
            $candidates->tmsf_id=$request->input('tms_id');
            $candidates->category=$request->input('category');
            // Short cv
        	 $file = $request->file('candidate_cv')[$i];
        	 $filename = $file->getClientOriginalName();
        	 $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	 $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	 $upload=$file->move(config('file.upload_folder'),$fullname);
             $candidates->candidate_cv=$fullname;
             //full cv
             $file = $request->file('full_cv')[$i];
        	 $filename = $file->getClientOriginalName();
        	 $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	 $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	 $upload=$file->move(config('file.upload_folder'),$fullname);
             $candidates->others_two=$fullname;
             $candidates->save(); 
        }
        if($request->input('category')=='Team Member'){
            return redirect('team-interview')->with('success','Candidate Added Successfully');
        }
        return redirect('interview')->with('success','Candidate Added Successfully');
   }
   
   public function getViewCandidate($id){
       $sales_lead=ClientEmployee::where('tms_id',$id)
            ->where('category','Supervisor')
            ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
            ->first();
        $client_info=SalesLead::find($id);
        $candidates=Candidate::where('tmsf_id',$id)->where('category','Supervisor')->get();
        return view('team.superviser.view')->with(compact('candidates','sales_lead','client_info'));
   }
   
    public function getDownloadFile($id){
       $candidate=Candidate::find($id);
        $file= public_path(). "/uploads/".$candidate->candidate_cv;
        return Response::download($file, $candidate->candidate_cv);
   }
   public function getDownloadFullCv($id){
       $candidate=Candidate::find($id);
        $file= public_path(). "/uploads/".$candidate->others_two;
        return Response::download($file, $candidate->others_two);
   }
    public function getEditCandidate($id){
        $sales_lead=ClientEmployee::where('tms_id',$id)
            ->where('category','Supervisor')
            ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
            ->first();
        $candidates=Candidate::where('tmsf_id',$id)->where('category','Supervisor')->get();
        return view('team.superviser.edit')->with(compact('sales_lead','candidates'));
    }
    public function postUpdateCandidate(Request $request){

        for($i=0;$i<count($request->input('id'));$i++){
            $candidate=Candidate::find($request->input('id')[$i]);
            $candidate->reporting_status=$request->input('reporting_status')[$i];
            $candidate->initial_report=$request->input('initial_report')[$i];
            $candidate->rating=$request->input('rating')[$i];
            $candidate->reported_by=$request->input('reported_by')[$i];
            $candidate->save();
        }
        return redirect(url('view-candidate',$request->input('tms_id')))->with('success','Candidate Update Successfully !');
    }
    public function postUpdateTeamCandidate(Request $request){
        
        for($i=0;$i<count($request->input('id'));$i++){
            $candidates=Candidate::find($request->input('id')[$i]);
            $candidates->candidate_name=$request->input('candidate_name')[$i];
            $candidates->others_one=$request->input('education')[$i];
            $candidates->candidate_skills=$request->input('candidate_skills')[$i];
            $candidates->candidate_experience=$request->input('candidate_experience')[$i];
            $candidates->joining_date=date_format(date_create($request->input('joining_date')[$i]),'Y-m-d H:i:s');
            
            
            if ($request->hasFile('candidate_cv')) {
                $file = $request->file('candidate_cv')[$i];
                if($file){
                   $filename = $file->getClientOriginalName();
        	        $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	        $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	        $upload=$file->move(config('file.upload_folder'),$fullname);
                    $candidates->candidate_cv=$fullname;  
                }
    	        
            }
             
             //full cv
             if($request->hasFile('full_cv')[$i]){
                $file = $request->file('full_cv')[$i];
                if($file){
                   $filename = $file->getClientOriginalName();
        	        $filename = date('Y-m-d-H:i:s')."-". pathinfo($filename, PATHINFO_FILENAME);
        	        $fullname = str_slug($filename).'.'.$file->getClientOriginalExtension();
        	        $upload=$file->move(config('file.upload_folder'),$fullname);
                    $candidates->others_two=$fullname; 
                }
             }
            $candidates->save();
        }
        return redirect(url('view-team-member',$request->input('tms_id')))->with('success','Candidate Update Successfully !');
    }
    
    public function getHireCandidate($id){
        $candidates=Candidate::find($id);
        $candidates->status = 1;
        $candidates->save();
        return back()->with('success', 'Candidate hired successfully.');
    }
}
