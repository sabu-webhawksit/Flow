@extends('layouts.master')
@section('main_content')
<div class="col-md-10 col-md-offset-1">
   <div class="panel panel-default custom-panel ">
          <div class="panel-heading pannel_header_custome clearfix">
            <h3 class="panel-title"> Add Permission</h3>
          </div>
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
          <div class="panel-body ">
              {!!Form::open(['url'=>'update-permission'])!!}
                   
                    <ul class="list-group">
                            @foreach($permissions as $premission)
                          <li class="list-group-item" style="font-size: 15px;font-weight: bold;">
                              {{$premission->name}}
                              <input type="checkbox" name="premission[]" value="{{$premission->id}}" 
                              @foreach($roles as $role)
                                 @if($role->id==$premission->id)
                                   checked="true"
                                 @endif
                             @endforeach
                              class="pull-right premission-checkbox">
                              </li>
                          @endforeach
                          <input type="hidden" value="{{$role_id}}" name="role_id">
                        </ul> 
               
                     <input class="btn btn-success btn-xs pull-right" name="" value="Update" type="submit">
                    <a class="btn btn-success btn-xs pull-right" style="margin-right: 1%;" href="{{url('role')}}">Cancel and Go back</a>
               {!!Form::close()!!}
            </div>
        </div>
</div>
@endsection