@extends('layouts.master')
@section('main_content')
	<div class="top_hr top_hr_supervisor">
        <div class="supervisor">
            <h1>SUPERVISER</h1>
            <p>for the team interview</p>
        </div>
    </div>
<div class="col-md-12">
  @if(session('message'))
		        <div class="alert alert-success">{{session('message')}}</div>
	@endif

   <div class="col-sm-4 col-xs-12 col-sm-offset-8 custom-settings">
    <table class="table table-bordered custom-table">
        <tr>
          <td>Number Of Supervisor like to hire</td>
          <td>1</td>
        </tr>
        <tr style="background:#E8F6FF">
          <td>Number Of Supervisor you have to interview</td>
          <td>2</td>
        </tr>
        <tr>
          <td>Ratio of Hire/Interview</td>
          <td>1:2</td>
        </tr>
      </table>
  </div>
  <div class="col-xs-12 col-sm-4 custom-settings">
    <table class="table table-bordered custom-table">
        <tr>
          <td>Company ID</td>
          <td>TMSF-{{str_pad($sales_lead->tms_id, 4, '0', STR_PAD_LEFT)}}-{{$client_info->full_name}}-{{$client_info->company}}</td>
        </tr>
        <tr style="background:#E8F6FF">
          <td>Number Of Hire</td>
          <td>{{$sales_lead->qty}}</td>
        </tr>
        <tr>
          <td>No. Of Candidates</td>
          <td>{{$sales_lead->qty*2}}</td>
        </tr>
      </table>
  </div>
  {!!Form::open(['url'=>url('add_candidate'),'files' => true])!!}
      <div class="col-xs-12 custom-settings">
        <table class="table table-bordered custom-table custom-table-class">
          <thead>
            <tr>
              <th></th>
              <th><center>Name</center></th>
              <th><center>Education</center></th>
              <th><center>Skills</center></th>
              <th><center>Exp.(Y)</center></th>
              <th><center>Int.date</center></th>
              <th><center>Compact CV</center></th>
              <th><center>Full CV</center></th>
            </tr>
          </thead>
          <tbody>
             <?php for($i=0;$i<$sales_lead->qty*2;$i++){?>
            <tr>
              <td></td>
              <td><input type="text"class="form-control" name="candidate_name[]" required placeholder="Name"></td>
              <td><input type="text" class="form-control" name="education[]" required placeholder="Education" ></td>
              <td><input type="text" class="form-control" name="candidate_skills[]" required placeholder="Skills Set" ></td>
              <td><input type="text" class="form-control" name="candidate_experience[]" required placeholder="Cxperience" ></td>
              <td><input type="text" class="form-control pick_date" id="" name="joining_date[]" required></td>
              <td><input type="file" name="candidate_cv[]" required></td>
              <td><input type="file" name="full_cv[]" required></td>
            </tr>
            <?php }?>
          </tbody>
    </table>
      </div>
      <input type="hidden" name="tms_id" value="{{$sales_lead->tms_id}}"/>
      <input type="hidden" name="category" value="{{$sales_lead->category}}"/>
      <div class="col-xs-12">
        <div class="col-sm-4 col-xs-offset-8 col-xs-12">
           <div class="form-group no-margin-left-right">
              <button type="submit" class="btn btn-default custom-btn pull-right">Save</button>
            </div>
        </div>
      </div>
  {!!Form::close()!!}
@endsection
@section('footer_script')
$('.pick_date').datepicker();
@stop