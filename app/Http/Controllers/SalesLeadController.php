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

class SalesLeadController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {
       // $this->authorize('sales_lead');
        $users_email = User::select('email','id')->get();
        $country_list=json_decode(file_get_contents(public_path().'/countries.json'));
        $time_zone=json_decode(file_get_contents(public_path().'/timezones.json'));
        
        if(Auth::user()->role_id==1 ||Auth::user()->role_id==2)
        {
            
            $sales_leads = SalesLead::get();
            
        } elseif(Auth::user()->role_id==5 ||Auth::user()->role_id==6)
        {
            
            $sales_leads = SalesLead::where('created_by',Auth::id())->get();
            
        } elseif( Auth::user()->role_id == 3 )
        {
            
            $sales_leads = SalesLead::where( 'country_manager', Auth::id() )->get();
            
        } elseif( Auth::user()->role_id > 7 && Auth::user()->role_id < 13 )
        {
            
            $sales_leads = SalesLead::where( 'pitching_for', 7 )->get();
            
        } else{
            
             $sales_leads = SalesLead::where( 'reference', Auth::id() )
		        ->orWhere( 'create_by', Auth::id() )
		        ->orWhere( 'client_id', Auth::id() )
		        ->get();
        }
        
        $users = User::all();
        
        return view('saleslead.home')->with(compact('users_email','country_list','sales_leads','time_zone','users'));
    
        
    }


    public function getMeetingAttendie($id)
    {
        $meeting = Meeting::with('users')->where('tmsf_id',$id)->first();
        return $meeting;
    }
    
    public function doUnlockSalesLead($id)
    {
        $sales_lead=SalesLead::find($id);
        $sales_lead->status = 0;
        $sales_lead->save();
        return back()->with('success', 'Sales Lead Unlocked successfully.');
    }
    
    public function doLockSalesLead($id)
    {
        $sales_lead=SalesLead::find($id);
        $sales_lead->status = 1;
        $sales_lead->save();
        return back()->with('success', 'Sales Lead Locked successfully.');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_edit = User::all();
        return $user_edit;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SalesLeadRequest $request)
    {
       
        $country_namager        = User::where('country_i_manage', 'like', $request->input('country'))->where('role_id',3)->first(['id']);
        
        $users                  = $request->only(['email','country']);
        $users['name']          = $request->input('full_name');
        $users['password']      = bcrypt('WebHawksIT@654321');
        $users['designation']   = $request->input('position');
        $users['role_id']       = $request->input('pitch_for');
       
        if($user=User::create($users)){
            $sales_leads                    = new SalesLead;
            $sales_leads->name              = $request->input('full_name');
            $sales_leads->position          = $request->input('position'); 
            $sales_leads->company           = $request->input('company_name');
            $sales_leads->country           = $request->input('country');
            $sales_leads->state             = $request->input('state');
            $sales_leads->zip_code          = $request->input('zip_code');
            $sales_leads->linkdin           = $request->input('linkedin');
            $sales_leads->others_link       = $request->input('other_link');
            $sales_leads->pitching_for      = $request->input('pitch_for');
            
            if(empty($request->input('reference'))){
                $sales_leads->reference     = $request->input('enter_new_email');
            }else{
                $sales_leads->reference     = $request->input('reference');    
            }
            $sales_leads->country_manager   = $country_namager ? $country_namager->id : 46;
            $sales_leads->create_by         = Auth::id();
            $sales_leads->client_id         = $user->id;
            $sales_leads->comments          = $request->input('comments');
            $sales_leads->pack              = array_values(array_filter($request->input('pack')));
            $sales_leads->extras            = $request->input('extras');
            $sales_leads->save();
            return back()->with('success','Sales Lead Created successfully!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    
    public function country($country_name){
        $service_pack=DB::table('service_pack')
            ->where('country_name',$country_name)
            ->join('pack', 'pack.id', '=', 'service_pack.pack_name')
            ->select('service_pack.*','pack.pack_name')
            ->get();
        return $service_pack;
    }
    
    
}
