<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('request-access', 'AuthController@getAccessRequest');
Route::post('request-access', 'AuthController@postAccessRequest');

Route::get('welcome-new-user', 'AuthController@getEditAccessRequest');
Route::post('welcome-new-user', 'AuthController@postEditAccessRequest');

// VOLA: Login Page Get Request
Route::get('/', [
		'as'	=>	'login',
		'uses'	=>	'AuthController@login'
    ]);
// VOLA: Login Page Post Request
Route::post('handlelogin', [
	    'as'	=>	'handlelogin',
	    'uses'	=>	'AuthController@postLogin'
	 ]);
// VOLA: Forget Page Get Request
Route::get('forget',[
		'as'	=>	'forgetPassword',
		'uses'	=>	'AuthController@getForget'
	]);
// VOLA: Forget Page Post Request
Route::post('forget',[
		'as'	=>	'postForgetPassowd',
		'uses'	=>	'AuthController@postForget'
	]);

//Role --SI--
Route::post('update-permission','RoleController@updatePermission');
Route::resource('roles', 'RoleController');

Route::get('superviser', function () {
    return view('team.superviser.index');
});
Route::get('superviser/add', function () {
    return view('team.superviser.add');
});

//workstation controller routes by Noor//

Route::get('work-station-list','WrokStationController@getWorkStationList');
Route::get('infra_structure/{group}/{id}','WrokStationController@getInfraStructure');
Route::post('add-workstation','WrokStationController@postAddWorkstation');
Route::get('view-work-station/{id}','WrokStationController@viewWorkStation');

Route::get('network/{group}/{id}','WrokStationController@getInfraStructure');
Route::get('admin_hr/{group}/{id}','WrokStationController@getInfraStructure');
Route::get('core_team/{group}/{id}','WrokStationController@getInfraStructure');
Route::get('accounts/{group}/{id}','WrokStationController@getInfraStructure');

// Interview For Supervisor
Route::get('interview','InterviewController@index');
Route::get('add-candidate/{id}','InterviewController@getAddCandidate');
Route::post('add_candidate','CandidateController@postAddCandidate');
Route::get('view-candidate/{id}','CandidateController@getViewCandidate');
Route::get('hire-candidate/{id}','CandidateController@getHireCandidate');
Route::get('download-file/{id}','CandidateController@getDownloadFile');
Route::get('download-full-cv/{id}','CandidateController@getDownloadFullCv');
Route::get('edit-candidate/{id}','CandidateController@getEditCandidate');
Route::post('update-candidate-info','CandidateController@postUpdateCandidate');

Route::post('update-team_member','CandidateController@postUpdateTeamCandidate');


//Interview For Team Member
Route::get('team-interview','TeamInterviewController@index');
Route::get('add-team-member/{id}','TeamInterviewController@getAddTeamMember');
Route::get('view-team-member/{id}','TeamInterviewController@getViewTeamMember');
Route::get('hire-team-member/{id}','TeamInterviewController@getHireCandidate');
Route::get('edit-team-memember/{id}','TeamInterviewController@getEditTeamMember');

//New Interview For Team Member
Route::get('new-team-viewer', 'NewTeamInterviewController@index');
Route::get('add-team-viewer/{id}','NewTeamInterviewController@add');
Route::post('update-team-viewer','NewTeamInterviewController@updateTeamViewer');
Route::get('view-team-viwer/{id}','NewTeamInterviewController@viewTeamViewr');
Route::get('download-orientation-package/{id}','NewTeamInterviewController@downloadOrentationPackage');
Route::get('download-talent-data/{id}','NewTeamInterviewController@downloadTalentData');
//workstation controller routes by Noor//
//permission --SI--test

Route::get('permission', function () {
    return view('permission.index');
});
Route::get('member/view', function () {
    return view('team.member.view');
});
Route::get('member/edit', function () {
    return view('team.member.edit');
});


Route::get('workstation/add-infra', function () {
    return view('work_station.infra_structure');
});
Route::get('workstation/add', function () {
    return view('work_station.add');
});
Route::get('workstation/add-network', function () {
    return view('work_station.network');
});
Route::get('workstation/add-coreteam', function () {
    return view('work_station.core_team');
});
Route::get('workstation/add-account', function () {
    return view('work_station.account');
});

//User --SI--test
Route::resource('user','UserController');
Route::get('testing/{id}','UserController@testing');


//Service-pack page ashik
Route::get('home','AuthController@home');
Route::any('view-pack','ServicePackController@viewServices');
Route::resource('service-pack','ServicePackController');
Route::get('download-pack/{id}','ServicePackController@getDownloadPackFile');
Route::get('download-select-pack/{packname}/{country}','ServicePackController@downloadSelectPack');

//Agreement page ashik
Route::get('agreement/{id?}','AgreementController@index');
Route::get('view-agreement/{id?}','AgreementController@getView');
Route::get('pdf-agreement/{id}','AgreementController@getPdfAgreement');
Route::post('add-agreement','AgreementController@postAddAgreement');
Route::post('update-agreement','AgreementController@updateAgreement');
Route::get('ajax-agreement/{name}','AgreementController@getAgreementTemplate');

//NDA Page Section
Route::get('nda/{id}','NdaController@index');
Route::get('view-nda/{id}','NdaController@getView');
Route::post('add-nda','NdaController@postAddNda');
Route::post('update-nda','NdaController@updateNda');
Route::get('pdf-nda/{id}','NdaController@getPdfNda');
Route::get('ajax-nda/{name}','NdaController@getNdaTemplate');



Route::get('ajax-attentdie/{id}','SalesLeadController@getMeetingAttendie');
Route::get('country_list/{country_name}','SalesLeadController@country');
Route::resource('others-meeting','OthersMeetingController');

Route::resource('sales-lead','SalesLeadController');
Route::resource('sales_status_unlock','SalesLeadController@doUnlockSalesLead');
Route::resource('sales_status_lock','SalesLeadController@doLockSalesLead');

Route::get('get-meeting/{id}','MeetingController@getMeeting');
Route::post('update-meeting','MeetingController@updateMeeting');
Route::get('complete-meeting/{id}','MeetingController@completeMeeting');

Route::resource('meeting','MeetingController');
Route::post('add-client-employee','ClientEmployeeController@addClientEmployee');
Route::post('add-follow-up','FollowupsController@addFollowUps');

	//logout page ashik
	Route::get('logout', [
		'as'=>'logout',
		'uses'=>'AuthController@logout'
	]);
	//change-password page Get Request ashik
	Route::get('change_password', [
		'as'=>'change_password',
		'uses'=>'AuthController@changePassword'
	]);
	
	Route::get('test',function(){
		//return Carbon\Carbon::create()->subDays(5)->diffForHumans();;
		
		$user=App\User::find(1);
		return $user->created_at->diffForHumans();
		/*$user = (array) App\User::whereIn('id',[1,2,3,4])->select('email')->get()->lists('email');
		$user = collect($user)->first();
		// return $user;
		
		//$user = ['rayhan.edu.bd@gmail.com', 'rpnpi00@gmsil.com', 'rayhan@webhawksit.com', 'kera@webhawksit.com'];
        $email_store = 'first Email send and test';
        $email = Mail::send('email.flowup', ['user' => $email_store], function ($m) use ($user) {
            $m->from('info@hawksfollow.com', 'HawksFollow');
            $m->to($user)->subject('Welcome to HawksHierarchy');
        });
        if ($email) {
            return 'Please check in you inbox successfully send Email';
        }*/
	});
	
	