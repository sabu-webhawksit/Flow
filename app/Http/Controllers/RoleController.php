<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Role;
use App\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  $this->authorize('roles');
        $role_paginate = Role::paginate(5);
        $role_list =Role::all();
        
        return view('role.index')->with(compact('role_list','role_paginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:50|unique:roles,name',
        ]);
        
        $add_role           = new Role ;
        $add_role->name     = $request->input('name');
        
        if($add_role->save()){
            return redirect()->action('RoleController@index')->with('message','Role Added Succesfully');
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
        $role_id=$id;
        $permissions=Permission::get();
        $roles=Role::find($id)->permissions;
       // $this->authorize('access-management');
        return view('permission.index')
            ->with(compact('permissions','roles','role_id'));  
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $edit_role=Role::find($id);
        return $edit_role;
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
       
         $role_update       = Role::find($id);
         $this->validate($request,[
            'edit_name' => 'required|max:50|unique:roles,name',
        ]);
        //$update_error=$this->update->errors();
        
         $role_update->name = $request->input('edit_name');
         
         if($role_update->save()){
            return redirect()->action('RoleController@index')->with('message','Role Update Succesfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Role::destroy($id);
        
        return redirect ( action('RoleController@index'))->with('message','Role Deleted Succesfully');

    }
    
    public function updatePermission(Request $request){
        $role = Role::find($request->input('role_id'));
        $premission=$request->input('premission');
        $role->permissions()->detach();
        for($i=0;$i<count($premission);$i++){
            $role->permissions()->attach($premission[$i]);
        }
        return redirect('roles')->with('success','Permission Update Successfully!');

    }
}
