@extends('layouts.master')
@section('title', 'Service-pack')
@section('main_content')
<div class="col-xs-12 no-padding-left-right">
  <div class="top_hr top_hr_supervisor">
      <div class="supervisor">
          <h1>Service Pack</h1>
          <p>for the Sales Lead</p>
      </div>
  </div>
   <div class="container">
    <div class="row">
    </div>
  </div>
    <div class="container">
      <div class="row">
        <div class="user_header" style="margin-top:10%"> 
        
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
            <div class="col-md-6 col-md-offset-3">
              <div class="panel panel-primary">
                  <div class="panel-heading clickable">
                      <h3 class="panel-title">Create New Service Pack</h3>
                  </div>
                  <div class="panel-body" style="display:none">
                    <p class="vat-tax-heading custom-margin-right-value text-center"><a href="{{url('service-pack/create')}}" class="btn btn-info custom-info-btn">Click Me</a></p>
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-success">
                    <div class="panel-heading clickable">
                        <h3 class="panel-title">View Existing Service Pack</h3>
                    </div>
                    <div class="panel-body" style="display:none">
                        {!!Form::open(['url'=>url('view-pack'),'class'=>'from-control'])!!}
                         <select class="form-control" name="country_id" style="margin-bottom:20px;border-radius:1px;">
                           <option>--Select Country--</option>
                          @foreach($country_list as $contry)
                            <option value="{{$contry->name}}">{{$contry->name}}</option>
                          @endforeach
                          </select>
                        <p class="vat-tax-heading custom-margin-right-value text-center"><button type="submit" class="btn btn-info custom-info-btn">Click Me</button></p>
                        {!!Form::close()!!}
                    </div>
                  </div>
            </div>
        </div>
    </div>
  </div>
</div>
@stop