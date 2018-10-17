<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\FollowUp;
use App\User;
use Illuminate\Support\Facades\Mail;

class FollowupsController extends Controller
{
    public function addFollowUps(Request $request){
        
        
        //return $request->all();
        
        $follow_up_group=FollowUp::where('tmsf_id',$request->input('tmsf_id'))->orderBy('id','desc')->first();
		
		if(empty($follow_up_group)){
			$follow_up_group_id=1;
		}else{
			$follow_up_group_id=$follow_up_group->group_id+1;
		}
		
        for($i=0;$i<count($request->input('follow_up_list'));$i++){
           $follow_up=new FollowUp;
           $follow_up->follow_up_list=$request->input('follow_up_list')[$i];
           $follow_up->tmsf_id=$request->input('tmsf_id');
           $follow_up->next_action_list=$request->input('next_action_list')[$i];
           $follow_up->reminder_topics=$request->input('reminder_topics')[$i];
          // $follow_up->reminder_via=$request->input('reminder_via')[$i];
           $follow_up->follow_pick_date=date_format(date_create($request->input('follow_pick_date')[$i]),'Y-m-d H:i:s');
           $follow_up->follow_pick_time=$request->input('follow_pick_time')[$i];
           $follow_up->follow_up_comments=$request->input('follow_up_comments')[$i];
           $follow_up->group_id = $follow_up_group_id;
           $follow_up->save();
       }
       
        $user = (array) User::whereIn('id',$request->input('follow_up_list'))->select('email')->get()->lists('email');
	    $user = collect($user)->first();
	    
        $email_store = 'first Email send and test';
        $email = Mail::send('email.flowup', ['user' => $email_store], function ($m) use ($user) {
            $m->from('info@hawksfollow.com', 'HawksFollow');
            $m->to($user)->subject('Welcome to HawksFlow');
        });
        
        if($email){
            return back()->with('success','Follow Up Added Successfully !');
        }else{
            return back()->with('success','Something went wrong !');
        }
    }
}
