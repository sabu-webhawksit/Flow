<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use App\Http\Requests;
use App\Http\Requests\accessRequestStore;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    
    //login pages --ashik--
    
    public function login ()
    {
    	return view('auth.signin');
    }
    public function postLogin(Request $request)
  	{
  	    $this->validate($request,[
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);
        if (Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password"), 'is_active'=> 1])) 
        {
            return redirect()->intended('sales-lead');
        }
        return redirect()->back()->withErrors(['email'=>'Authentication failed!']);
    }
    
    //Home Pages --ashik--
    
    public function home()
    {
        return view('saleslead.home');
    }
    
    // Forgot password pages --ashik--
    
    public function getForget()
    {
        return view('auth.forgot');
    }
    public function postForget(Request $request)
    {
        $this->validate($request, [
            'email' => 'required'
        ]);
        $input_email = $request['email'];
        if($input_email){
            Session::flash('seccess','Password send your mail.');
            return redirect()->back();
        }else
        return redirect()->back()->withError();
    }
    //logout page --ashik--
	public function logout(){
		    Auth::logout();
        Session::flash('seccess','Logout Successfully.');
        return redirect()->action('AuthController@login');
	}
	//Change-Password page --ashik--
	public function changePassword()
    {
        return view('auth.change_password');
    }
	
	public function getAccessRequest()
	{
	    
	    return view('auth.access');
	    
	}
	
	public function postAccessRequest(accessRequestStore $request)
	{
	    
	    $request['password'] = bcrypt($request->input('access_password'));
	    
	    if( User::create($request->all()) )
	    {
	        
	        return redirect()->route('login')->withErrors('Your request has been saved. Please wait for the Admin to review it.');
	        
	    } else{
	        
	        return back()->withInput()->withErrors('Failed to process your request. Please retry or contact admin if you need assistance.');
	        
	    }
	    
	}
	
	
	public function getEditAccessRequest()
	{
	
	    if(!auth()->user()){ return back()->route('login')->withErrors('Please login to continue'); }
	    
	    return view('auth.edit-access', ['users'=> User::where('is_active', 0)->paginate(30) ]);
	    
	}
	
	
	public function postEditAccessRequest(Request $request)
	{
	    
	    if( User::find($request->input('user_id'))->update(['is_active'=>1]) )
	    {
	        
	        return back()->withErrors('User has been activated successfully');
	        
	    } else{
	        
	        return back()->withErrors('Failed to activate user.');
	        
	    }
	    
	}
    
}
