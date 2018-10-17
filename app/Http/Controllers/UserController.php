<?php

//          User controller by Noor            //

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\User;

use App\Role;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //          User controller by Noor            //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users          = User::paginate(10);
        $roles          = Role::all();
        $country_list   = json_decode(file_get_contents(public_path().'/countries.json'));
        
        return view('user.index', compact('users','roles','country_list'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('user.index')->with('users',$users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:30|regex:/^[a-zA-Z0-9 ]+$/',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'designation' => 'required|max:30|regex:/^[a-zA-Z0-9 ]+$/',
            'department' => 'required|max:30|regex:/^[a-zA-Z0-9 ]+$/',
            'branch' => 'required|max:30|regex:/^[a-zA-Z0-9 ]+$/'
        ]);
        
        $edit_user                          = new User;
        $edit_user->name                    = $request->input('name');
        $edit_user->email                   = $request->input('email');
        $edit_user->password                = bcrypt($request->input('password'));
        $edit_user->designation             = $request->input('designation');
        $edit_user->department              = $request->input('department');
        $edit_user->country                 = $request->input('country');
        $edit_user->branch                  = $request->input('branch');
        $edit_user->role_id                 = $request->input('role_id');
        
        $edit_user->save();
        
        return redirect(action('UserController@index'))->with('success','User added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $users = User::select('email','id')->get();
        return $users;
        //return "washi";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user_edit = User::find($id);
        return $user_edit;
       
        $name = $user_edit->user;
        $name = $user_edit->id;
        $name = $user_edit->password;
        $dates = new Testing($name);
        $data = $dates->name();
        //return $name;
        return view('user.test', compact('data'));
    }
    
    public function testing($id){
     $user_edit = User::find($id);
     // return $user_edit;
       
       $name = $user_edit->name;
       $create = $user_edit->created_at;
       $department = $user_edit->department;
       $test = new Testing();
       $test->$user1 = $name;
       $test->$user2 = $create;
       $test->$user2 = $department;
       return $test->name();
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
        
        $this->validate($request, [
            'edit_name' => 'required|max:30',
            'edit_email' => 'required|email',
            'edit_designation' => 'required|max:30',
            'edit_department' => 'required|max:30',
            'edit_branch' => 'required|max:30'
        ]);
        
        $edit_user = User::find($id);
        
        if( $edit_user ){
            
            $edit_user->update([
                'name'          => $request->input('edit_name'),
                'email'         => $request->input('edit_email'),
                'designation'   => $request->input('edit_designation'),
                'department'    => $request->input('edit_department'),
                'country'       => $request->input('edit_country'),
                'country_i_manage'       => $request->input('country_i_manage'),
                'branch'        => $request->input('edit_branch'),
                'role_id'       => (int) $request->input('edit_role')
            ]);
            
        }
        
        return redirect(action('UserController@index'))->with('success','User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return back()->with('success','User Deleted Succesfully');
    }
}
//          User controller by Noor            //