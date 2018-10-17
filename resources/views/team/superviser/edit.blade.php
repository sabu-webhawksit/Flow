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
          <td>TMSF{{str_pad($sales_lead->tms_id, 4, '0', STR_PAD_LEFT)}}</td>
        </tr>
        <tr style="background:#E8F6FF">
          <td>Number Of Hire</td>
          <td>{{$sales_lead->qty}}</td>
        </tr>
        <tr>
          <td>No. Of Candidates</td>
          <td>{{$sales_lead->qty*3}}</td>
        </tr>
      </table>
  </div>
  {!!Form::open(['url'=>url('update-candidate-info'),'files' => true])!!}
  <div class="col-xs-12 custom-settings">
    <table class="table table-bordered custom-table custom-table-class">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Education</th>
          <th>Skills</th>
          <th>Exp.(Y)</th>
          <th>Int.date</th>
          <th>Compact CV</th>
          <th>Full CV</th>
        </tr>
      </thead>
      <tbody>
          <?php $i=1;?>
        @foreach($candidates as $candidate)  
        <tr>
          <td></td>
          <td><input type="text"class="form-control" name="candidate_name[]" value="{{$candidate->candidate_name}}" required></td>
          <td><input type="text" class="form-control" name="education[]" value="{{$candidate->others_one}}" required ></td>
          <td><input type="text" class="form-control" name="candidate_skills[]" value="{{$candidate->candidate_skills}}" required></td>
          <td><input type="text" class="form-control" name="candidate_experience[]" value="{{$candidate->candidate_experience}}" required  ></td>
          <td><input type="text" class="form-control pick_date" name="joining_date[]"value="{{$candidate->joining_date}}" required></td>
          <td>
            <input type="file" name="candidate_cv[]" >
            <input type="hidden" name="id[]" value="{{$candidate->id}}"/>
            <input type="hidden" name="tms_id" value="{{$sales_lead->tms_id}}"/>
          </td>
          <td><input type="file" name="full_cv[]" ></td>
          
        </tr>
        <?php $i++;?>
        @endforeach
      </tbody>
    </table>
  </div>
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