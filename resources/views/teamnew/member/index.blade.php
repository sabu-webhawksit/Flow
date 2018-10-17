@extends('layouts.master')
@section('main_content')
	<div class="top_hr top_hr_supervisor">
        <div class="supervisor">
            <h1>Team Member</h1>
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
            <h3 class="panel-title"> Team Member for the team interview</h3>
          </div>
          <div class="panel-body ">
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
                        $skills=DB::table('candidates')
                        ->where('tmsf_id',$tmsf->id)
                        ->select('candidate_skills')
                        ->first();
                        ?>
                      <td>
                      {{$skills->candidate_skills}}
                      </td>
                      <?php 
                        $candidate_qty=DB::table('candidates')
                        ->where('tmsf_id',$tmsf->id)
                        ->where('status',1)
                        ->select('candidate_skills')
                        ->count();
                        ?>
                      <td>
                       {{$candidate_qty}}
                      </td>
                      
                      <td>
                         <!-- <a href="{{--url('add-team-member',$tmsf->id)--}}"class="btn btn-primary btn-xs editRole"  data-toggle="tooltip">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                          </a>-->
                          <p>
                              <a data-placement="top" data-toggle="tooltip" style="margin-right: 10px;"  href="{{url('view-team-viwer',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <a style="margin-right: 10px;" data-placement="top" data-toggle="tooltip" href="{{url('add-team-viewer',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          </p>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <hr>
                <nav aria-label="..." class="pull-right remove-padding">
                  {!! $tmsfes->render() !!}
                </nav>
          </div>
          </div>

</div>

@endsection