<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\WorksSpaceItem;
use App\WorksSpaceProduct;
use App\SalesLead;

class WrokStationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // return view('work_station.index');
    }
    
    public function getWorkStationList(){
        $this->authorize('work-station-list');
        $tmsfes=DB::table('sales_leads')
            ->where('sales_leads.pitching_for',7)
            ->join('client_employees','client_employees.tms_id','=','sales_leads.id')
            ->groupBy('client_employees.tms_id')
            ->select('sales_leads.*')
            ->paginate(15);
        return view('work_station.index')->with(compact('tmsfes'));
        
    }
    //  Infrastructure crud starts by Noor //
    public function getInfraStructure($group, $id){
        $tms_id=$id;
        $workStationItem=DB::table('worksspacesitems')->where('tms_id',$tms_id)->first();
        $group_id=$group;
        $company_name=DB::table('sales_leads')->where('id',$id)->select('company','id')->first();
        
        if($group_id==8){
            return view('work_station.infra_structure')->with(compact('company_name','group_id','workStationItem')); 
        }/*else if($group_id==9){
            return view('work_station.network')->with(compact('company_name','group_id','workStationItem'));
        }*/else{
            return view('work_station.core_team')->with(compact('company_name','group_id','workStationItem'));
        }
    }
    public function postAddWorkstation(Request $request){
        $tms=WorksSpaceItem::where('tms_id',$request->input('tms_id'))->first();
        if($tms){
        $workStationItem=WorksSpaceItem::find($tms->id);
        $workStationItem->tms_id=$request->input('tms_id');
        $workStationItem->number_of_hire=$request->input("on_hire");
        $workStationItem->supervisor=$request->input('supervisor');
        $workStationItem->team_member=$request->input('team_member');
        $workStationItem->pc=$request->input('pc');
        $workStationItem->mac=$request->input('mac');
        $workStationItem->others_one=$request->input('windows');
        $workStationItem->invoice=$request->input('invoice');
        $workStationItem->save();
        for($i=0;$i<count($request->input('item'));$i++){
            $workStationProduct= new WorksSpaceProduct;
            $workStationProduct->tms_id=$request->input('tms_id');
            $workStationProduct->group_id=$request->input('group_id');
            $workStationProduct->item=$request->input('item')[$i];
            $workStationProduct->qty=$request->input('qty')[$i];
            $workStationProduct->starting_date=date_format(date_create($request->input('starting_date')[$i]),'Y-m-d H:i:s');
            $workStationProduct->deadline=date_format(date_create($request->input('deadline')[$i]),'Y-m-d H:i:s');
            $workStationProduct->notes=$request->input('notes')[$i];
            $workStationProduct->save();
        }
        }else{
        $workStationItem=new WorksSpaceItem;
        $workStationItem->tms_id=$request->input('tms_id');
        $workStationItem->number_of_hire=$request->input("on_hire");
        $workStationItem->supervisor=$request->input('supervisor');
        $workStationItem->team_member=$request->input('team_member');
        $workStationItem->pc=$request->input('pc');
        $workStationItem->mac=$request->input('mac');
        $workStationItem->others_one=$request->input('windows');
        $workStationItem->invoice=$request->input('invoice');
        $workStationItem->save();
        for($i=0;$i<count($request->input('item'));$i++){
            $workStationProduct= new WorksSpaceProduct;
            $workStationProduct->tms_id=$request->input('tms_id');
            $workStationProduct->group_id=$request->input('group_id');
            $workStationProduct->item=$request->input('item')[$i];
            $workStationProduct->qty=$request->input('qty')[$i];
            $workStationProduct->starting_date=date_format(date_create($request->input('starting_date')[$i]),'Y-m-d H:i:s');
            $workStationProduct->deadline=date_format(date_create($request->input('deadline')[$i]),'Y-m-d H:i:s');
            $workStationProduct->notes=$request->input('notes')[$i];
            $workStationProduct->save();
            } 
        }
        return redirect('work-station-list')->with('success','Workstation Task Assign Successfully!');
    }
    
    public function createInfraStructure($group, $id){
        
        $WorksSpaceItem                         = new WorksSpaceItem;
        $WorksSpaceItem->invoice                = $request->input('invoice');
        $WorksSpaceItem->number_of_hire         = $request->input('on_hire');
        $WorksSpaceItem->supervisor             = $request->input('supervisor');
        $WorksSpaceItem->team_member            = $request->input('team_member');
        $WorksSpaceItem->pc                     = $request->input('pc');
        $WorksSpaceItem->mac                    = $request->input('mac');
        
        return redirect(action('WrokStationController@getInfraStructure'))->with('message','Added Successfully');
    }
    
    public function viewWorkStation($id){
        $workstation_item= WorksSpaceItem::where('tms_id',$id)->first();
        $workstation_product=WorksSpaceProduct::where('tms_id',$id)->get();
        $company=SalesLead::find($id);
        return view('work_station.view')->with(compact('workstation_item','workstation_product','company'));
    }
    // Infrastructure crud ends by Noor //
    public function getNetwork($group, $id){
        return view('work_station.network');
    }
    
    public function getAdmin($group, $id){
        return view('work_station.admin');
    }
    
    public function getCoreTeam($group, $id){
        return view('work_station.core_team');
    }
    
    public function getAccount($group, $id){
        return view('work_station.account');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
