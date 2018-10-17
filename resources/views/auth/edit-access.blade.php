@extends('layouts.master')
@section('main_content')
<div class="col-md-12">
  @if(Session::has('success'))
  		<div class="alert alert-success">
  			<b>{!!Session::get('success')!!}</b>
  		</div>
  	@endif
    @if(Session::has('error'))
      <div class="alert alert-warning">
      		<b>{!!Session::get('error')!!}</b>
      </div>   
    @endif
   <div class="panel panel-default custom-panel ">
     <h1 class="text-center">Users waiting for access</h1>
          <div class="panel-body ">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th width="100">Permit</th>
                      <th width="100">Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($users)
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->name}} </td>
                        <td>{{$user->email}}</td>
                        <td>@if($user->roles){{$user->roles->name}}@endif</td>
                        <td>
                          {!! Form::open(['url'=>action('AuthController@postEditAccessRequest')]) !!}
                          
                          {!! Form::hidden('user_id', $user->id) !!}
                          
                          <button type="submit" class="btn btn-primary btn-md custom-button">
                            <i class="fa fa-unlock"></i>
                          </button>
                          
                          {!! Form::close()  !!}
                        </td>
                        <td>
                          
                          {!! Form::open(['url'=>action('UserController@destroy', $user->id), 'method'=> 'DELETE']) !!}
                          
                          {!! Form::hidden('id', $user->id) !!}
                          
                          <button type="submit" class="btn btn-primary btn-md custom-button">
                            <i class="fa fa-trash"></i>
                          </button>
                          
                          {!! Form::close()  !!}
                          
                        </td>
                       
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                </table>
                <hr>
          </div>
          </div>

        

</div>
@endsection
