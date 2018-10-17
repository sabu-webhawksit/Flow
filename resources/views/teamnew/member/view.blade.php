@extends('layouts.master')
@section('title', 'Interview')

@section('main_content')
<div class="col-xs-12 no-padding-left-right">
  <div class="top_hr top_hr_supervisor">
      <div class="supervisor">
          <h1>SUPERVISER</h1>
          <p>for the team interview</p>
      </div>
  </div>
  <div class="col-sm-4 col-xs-12 col-sm-offset-8 custom-settings">
    <table class="table table-bordered custom-table">
        <tr>
          <td>Number Of Supervisor like to hire</td>
          <td>1</td>
        </tr>
        <tr style="background:#E8F6FF">
          <td>Number Of Supervisor you have to interview</td>
          <td>3</td>
        </tr>
        <tr>
          <td>Ratio of Hire/Interview</td>
          <td>1:3</td>
        </tr>
      </table>
  </div>
  <div class="col-xs-12 col-sm-4 custom-settings">
    <table class="table table-bordered custom-table">
        <tr>
          <td>Company ID</td>
          <td>TMSF{{str_pad($sales_lead->tms_id, 4, '0', STR_PAD_LEFT)}}-{{str_slug($client_info->company)}}</td>
        </tr>
        <tr style="background:#E8F6FF">
          <td>Number Of Hire</td>
          <td>{{$qty}}</td>
        </tr>
        <tr>
          <td>No. Of Candidates</td>
          <td>{{$qty}}</td>
        </tr>
      </table>
  </div>
  
  <div class="col-xs-12 custom-settings">
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
    <!--<table class="table table-bordered custom-table">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Skills</th>
          <th>Exp.(Y)</th>
          <th>Int.date & Time</th>
          <th>CV</th>
          <th>Status</th>
          <th>Int.Report</th>
          <th>Rating</th>
          <th>Reported By</th>
        </tr>
      </thead>
      <tbody>
          <?php $i=1;?>
        @foreach($candidates as $candidate)  
        <tr>
          <td>{{$i}}</td>
          <td>{{$candidate->candidate_name}}</td>
          <td>{{$candidate->candidate_skills}}</td>
          <td>{{$candidate->candidate_experience}}</td>
          <td>{{$candidate->joining_date}}</td>
          <td><center><a href="{{url('download-file',$candidate->id)}}"><i class="fa fa-cloud-download" aria-hidden="true"></i></a></center></td>
          <td>{{$candidate->reporting_status}}</td>
          <td>{{$candidate->initial_report}}</td>
          <td>{{($candidate->rating==0)?' ':$candidate->rating}}</td>
          <td>{{$candidate->reported_by}}</td>
        </tr>
        <?php $i++;?>
        @endforeach
      </tbody>
    </table>-->
    <ul class="list-unstyled">
      @foreach($candidates as $candidate)  
      <li class="">
        <div class="col-sm-8">
          <p>Name       : {{$candidate->candidate_name}}</p>
          <p>Education  : {{$candidate->others_one}}</p>
          <p>Experience :{{$candidate->candidate_experience}}</p>
          <p>Skills     : {{$candidate->candidate_skills}}</p>
        </div>
        <div class="col-sm-4">
          <a href="{{url('download-full-cv',$candidate->id)}}" class="btn btn-primary">Download Full CV</a>
          <a href="{{url('download-file',$candidate->id)}}" class="btn btn-primary">Download Compact CV</a>
          @if($candidate->orientation_package != null)
          <a href="{{url('download-orientation-package',$candidate->id)}}" class="btn btn-primary">Orientation Package</a>
          @endif
          @if($candidate->talent_data != null)
          <a href="{{url('download-talent-data',$candidate->id)}}" class="btn btn-primary">Talent Data</a>
          @endif
        </div>
      </li>
      @endforeach
    </ul>
  </div>
</div>
@stop