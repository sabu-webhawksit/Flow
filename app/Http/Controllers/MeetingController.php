<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Http\Requests\UpdateMettingRequest;
use App\Meeting;
use App\User;
use Mail;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(MeetingRequest $request)
    {
        
        $meeting=[];
        $meeting['meeting_time_zone']=$request->input('time_zone');
        $meeting['meeting_date']=date_format(date_create($request->input('meeting_date')),'Y-m-d H:i:s');
        $meeting['meeting_time']=$request->input('meeting_time');
        $meeting['meeting_type']=$request->input('meeting_type');
        if(empty($request->input('physical_meeting_address'))){
            $meeting['meeting_address']=$request->input('meeting_address');
        }else{
            $meeting['meeting_address']=$request->input('physical_meeting_address');
        }
        
        $meeting['tmsf_id']=$request->input('tmsf_id');
        $meeting['comments']=$request->input('comments');
        
        $attendent=$request->input('attendent');
        
        foreach ($attendent as $value) {
            if(is_numeric($value)){
                $newArray[]=$value;
            }
        }
        if($meetings=Meeting::create($meeting)){
           $meetings->users()->attach($newArray);
        }
        
        $user = (array) User::whereIn('id',$newArray)->select('email')->get()->lists('email');
	    $user = collect($user)->first();
        
        $email_store = 'first Email send and test';
        $email = Mail::send('email.flowup', ['user' => $email_store], function ($m) use ($user) {
            $m->from('info@hawksfollow.com', 'HawksFollow');
            $m->to($user)->subject('Welcome to HawksFlow');
        });
        if($email){
            return back()->with('success','Meeting Added Successfully !');
        }else{
            return back()->with('success','Something went wrong !');
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
    public function updateMeeting(UpdateMettingRequest $request){
       // return $request->all();
        $meeting=[];
        $meeting['meeting_time_zone']=$request->input('edit_meeting_time_zone');
        $meeting['meeting_date']=date_format(date_create($request->input('edit_meeting_date')),'Y-m-d H:i:s');
        $meeting['meeting_time']=$request->input('edit_meeting_time');
        $meeting['meeting_type']=$request->input('edit_meeting_type');
        if(empty($request->input('edit_physical_meeting_address'))){
            $meeting['meeting_address']=$request->input('meeting_address');
        }else{
            $meeting['meeting_address']=$request->input('edit_physical_meeting_address');
        }
        
        $meeting['comments']=$request->input('edit_comments');
        
        $attendent=$request->input('edit_attendent');
        
        foreach ($attendent as $value) {
            if(is_numeric($value)){
                $newArray[]=$value;
            }
        }
        if($meetings=Meeting::find($request->input('meeting_id'))->update($meeting)){
           $myMeeting=Meeting::find($request->input('meeting_id'));
           $myMeeting->users()->detach();
           $myMeeting->users()->attach($newArray);
        }
        
        $user = (array) User::whereIn('id',$newArray)->select('email')->get()->lists('email');
	    $user = collect($user)->first();
        
        $email_store = 'first Email send and test';
        $email = Mail::send('email.flowup', ['user' => $email_store], function ($m) use ($user) {
            $m->from('info@hawksfollow.com', 'HawksFollow');
            $m->to($user)->subject('Welcome to HawksFlow');
        });
        
        if($email){
            return back()->with('success','Meeting Update Successfully !');
        }else{
            return back()->with('success','Something went wrong !');
        }
    }
    
    public function getMeeting($id){
        $meeting=Meeting::with('users')->where('id',$id)->first();
        return $meeting;
    }
    
    public function completeMeeting($id){
        $meeting=Meeting::find($id);
        $meeting->status=1;
        $meeting->save();
        return back()->with('success','Meeting Complete Successfully!');
    }
}
