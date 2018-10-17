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
          <td>TMSF-{{str_pad($sales_lead->tms_id, 4, '0', STR_PAD_LEFT)}}-{{str_slug($client_info->company,'-')}}</td>
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
  {!!Form::open(['url'=>url('update-team-viewer'),'files' => true])!!}
      <div class="col-xs-12 custom-settings">
        <table class="table table-bordered custom-table custom-table-class">
          <thead>
            <tr>
              <th></th>
              <th><center>Name</center></th>
              <th><center>Skills</center></th>
              <th><center>Exp.(Y)</center></th>
              <th><center>Orientation Package</center></th>
              <th><center>Talent Data</center></th>
            </tr>
          </thead>
          <tbody>
              
            @foreach($candidates as $candidate)
                <tr>
              <td></td>
              <td>{{$candidate->candidate_name}}</td>
              <td>{{$candidate->candidate_skills}}</td>
              <td>{{$candidate->candidate_experience}}</td>
              <td><input type="file" name="orientation_package[]" required></td>
              <td><input type="file" name="talent_data[]" required></td>
              <input type="hidden" name="candidate_id[]" value="{{$candidate->id}}"/>
            </tr>
            @endforeach
          </tbody>
    </table>
      </div>
      <input type="hidden" name="tms_id" value="{{$sales_lead->tms_id}}"/>
      <div class="col-xs-12">
        <div class="col-sm-4 col-xs-offset-8 col-xs-12">
           <div class="form-group no-margin-left-right">
              <button type="submit" class="btn btn-default custom-btn pull-right">Update</button>
            </div>
        </div>
      </div>
  {!!Form::close()!!}
</div>
@stop

@section('footer_script')
$('.pick_date').datepicker();
@stop