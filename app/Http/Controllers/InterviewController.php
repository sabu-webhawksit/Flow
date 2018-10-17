<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\ClientEmployee;
use App\SalesLead;

class InterviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('interview');
        $tmsfes=DB::table('sales_leads')
            ->where('sales_leads.pitching_for',7)
            ->join('client_employees','client_employees.tms_id','=','sales_leads.id')
            ->where('client_employees.category','Supervisor')
            ->groupBy('client_employees.tms_id')
            ->select('sales_leads.*')
            ->paginate(15);
           /*
            ->groupBy('client_employees.tms_id')
            ->select('sales_leads.*')
            ->paginate(15);*/
        return view('team.superviser.index')->with(compact('tmsfes'));
    }

    public function getAddCandidate($id){
        
        $sales_lead=ClientEmployee::where('tms_id',$id)
        ->where('category','Supervisor')
        ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
        ->first();
        $client_info=SalesLead::find($id);
        return view('team.superviser.add')->with(compact('sales_lead','client_info'));
    }
    public function getEditCandidate($id){
        $sales_lead=ClientEmployee::where('tms_id',$id)
            ->where('category','Supervisor')
            ->select('tms_id','category',DB::raw('SUM(quentity) as qty'))
            ->first();
        $candidates=Candidate::where('tmsf_id',$id)->where('category','Supervisor')->get();
        return view('supervisor_interview.edit')->with(compact('sales_lead','candidates'));
    }
}
