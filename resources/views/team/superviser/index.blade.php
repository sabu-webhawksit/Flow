@extends('layouts.master')
@section('main_content')
	<div class="top_hr top_hr_supervisor">
        <div class="supervisor">
            <h1>SUPERVISER</h1>
            <p>for the team interview</p>
        </div>
    </div>
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
          <div class="panel-heading pannel_header_custome clearfix">
            <h3 class="panel-title"> Superviser for the team interview</h3>
          </div>
          <div class="panel-body">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>TMSF No.</th>
                      <th>Client Name.</th>
                      <th>Company.</th>
                      <th>Skill Set</th>
                      <th>Quantity</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="tableBody">
                    @foreach($tmsfes as $tmsf)
                    <tr>
                      <td>TMSF {{str_pad($tmsf->id, 4, '0', STR_PAD_LEFT)}}</td>
                      <td>{{$tmsf->name}}</td>
                      <td>{{$tmsf->company}}</td>
                      <?php 
                        $skills=DB::table('client_employees')
                        ->where('tms_id',$tmsf->id)
                        ->where('category','Supervisor')
                        ->get();
                        ?>
                      <td>
                        @foreach($skills as $skill)
                        {{$skill->skill_set}}
                        @endforeach
                      </td>
                      <?php $data=0;?>
                      <td>
                        @foreach($skills as $skill)
                        <?php $data += $skill->quentity;?>
                        @endforeach
                        {{$data}}
                      </td>
                      <?php  
                          $candidate=App\Candidate::where('category','Supervisor')->where('tmsf_id',$tmsf->id)->count();
                      ?>
                      <td>
                          @if($candidate<1)
                          
                          <a href="{{url('add-candidate',$tmsf->id)}}"class="btn btn-primary btn-xs editRole" title="Add Candidates" data-toggle="tooltip">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                          </a>
                          @else
                          <p>
                              <a data-placement="top" data-toggle="tooltip" style="margin-right: 10px;" title="View Workstation" href="{{url('view-candidate',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <a style="margin-right: 10px;" data-placement="top" data-toggle="tooltip" title="Update Candidate" href="{{url('edit-candidate',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          </p>
                          @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <hr>
          </div>
      </div>
</div>

@endsection