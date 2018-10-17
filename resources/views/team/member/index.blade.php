@extends('layouts.master')
@section('main_content')
	<div class="top_hr top_hr_supervisor">
        <div class="supervisor">
            <h1>Team Member</h1>
            <p>for the team interview</p>
        </div>
    </div>
<div class="col-md-12">
  @if(session('message'))
		        <div class="alert alert-success">{{session('message')}}</div>
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
                        $skills=DB::table('client_employees')
                        ->where('tms_id',$tmsf->id)
                        ->where('category','Team Member')
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
                          $candidate=App\Candidate::where('category','Team Member')->where('tmsf_id',$tmsf->id)->count();
                      ?>
                      <td>
                          @if($candidate<1)
                          
                          <a href="{{url('add-team-member',$tmsf->id)}}"class="btn btn-primary btn-xs editRole"  data-toggle="tooltip">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                          </a>
                          @else
                          <p>
                              <a data-placement="top" data-toggle="tooltip" style="margin-right: 10px;"  href="{{url('view-team-member',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              <a style="margin-right: 10px;" data-placement="top" data-toggle="tooltip" href="{{url('edit-team-memember',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                          </p>
                          @endif
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