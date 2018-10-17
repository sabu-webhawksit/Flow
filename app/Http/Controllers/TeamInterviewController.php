<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\ClientEmployee;
use App\SalesLead;
use App\Candidate;

class TeamInterviewController extends Controller
{
    public function index(){
       $this->authorize('team-interview');
        $tmsfes=DB::table('sales_leads')
            ->where('sales_leads.pitching_for',7)
            ->join('client_employees','client_employees.tms_id','=','sales_leads.id')
            ->where('client_employees.category','Team Member')
            ->groupBy('client_employees.tms_id')
            ->select('sales_leads.*')
            ->paginate(15);
           // return $tmsfes;
        return view('team.member.index')->with(compact('tmsfes'));
        
    }
    public function getAddTeamMember($id){
        $sales_lead=ClientEmployee::where('tms_id',$id)
        ->where('category','Team Member')
        ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
        ->first();
        $client_info=SalesLead::find($id);
        return view('team.member.add')->with(compact('sales_lead','client_info'));
    }
    public function getViewTeamMember($id){
        $sales_lead=ClientEmployee::where('tms_id',$id)
        ->where('category','Team Member')
        ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
        ->first();
        $candidates=Candidate::where('tmsf_id',$id)->where('category','Team Member')->get();
        return view('team.member.view')->with(compact('candidates','sales_lead'));
    }
    public function getEditTeamMember($id){
        $sales_lead=ClientEmployee::where('tms_id',$id)
            ->where('category','Team Member')
            ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
            ->first();
        $candidates=Candidate::where('tmsf_id',$id)->where('category','Team Member')->get();
        return view('team.member.edit')->with(compact('sales_lead','candidates'));

    }
    public function getHireCandidate($id){
        $candidates=Candidate::find($id);
        $candidates->status = 1;
        $candidates->save();
        return back()->with('success', 'Candidate hired successfully.');
    }
}
