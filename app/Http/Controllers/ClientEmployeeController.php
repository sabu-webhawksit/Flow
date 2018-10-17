<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClientEmployee;

class ClientEmployeeController extends Controller
{
    public function addClientEmployee(Request $request){
        //return $request->all();
        
        for($i=0;$i<count($request->input('skill_set'));$i++){
           $employee=new ClientEmployee;
           $employee->skill_set=$request->input('skill_set')[$i];
           $employee->tms_id=$request->input('tmsf_id');
           $employee->level=$request->input('level')[$i];
           $employee->quentity=$request->input('quentity')[$i];
           $employee->category=$request->input('category')[$i];
           $employee->save();
       }
       return back()->with('success','Employee Added Successfully !');
    }
}
