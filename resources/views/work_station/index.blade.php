@extends('layouts.master')
@section('main_content')
	<div class="col-xs-12 no-padding-left-right">
    <div class="top_hr">
        <span>WORKSTATION ACTIVATION</span>
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
              <h3 class="panel-title"> Workstation List</h3>
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
                    <!--<td> TMSF 0007</td>-->
                    <!--<td>Brendon McDermott</td>-->
                    <!--<td>McCullough, Miller and Green</td>-->
                    <td>TMSF {{str_pad($tmsf->id, 4, '0', STR_PAD_LEFT)}}</td>
                    <td>{{$tmsf->name}}</td>
                    <td>{{$tmsf->company}}</td>
                    <?php 
                    $skills=DB::table('client_employees')
                    ->where('tms_id',$tmsf->id)
                    //->where('category','Team Member')
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
                        $candidate=App\WorksSpaceItem::where('tms_id',$tmsf->id)->count();
                    ?>
                    <td>
                      @can('infra-structure')
                        @if(App\WorksSpaceProduct::where('tms_id',$tmsf->id)->where('group_id',8)->count()<1) 
                          <a data-placement="top" data-toggle="tooltip" title="Infra-structure" href="{{url('infra_structure',[8,$tmsf->id])}}" class="btn btn-primary btn-xs"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        @endif
                      @endcan
                      @can('network')
                        @if(App\WorksSpaceProduct::where('tms_id',$tmsf->id)->where('group_id',9)->count()<1)
                          <!--<a data-placement="top" style="margin-right: 5px;" data-toggle="tooltip" title="Network" href="{{url('infra_structure',[9,$tmsf->id])}}" class="btn btn-primary btn-xs"><span class="fa fa-plus" aria-hidden="true"></span></a>-->
                        @endif
                      @endcan
                      @can('admin-hr')
                        @if(App\WorksSpaceProduct::where('tms_id',$tmsf->id)->where('group_id',10)->count()<1)
                          <a data-placement="top" style="margin-right: 5px;" data-toggle="tooltip" title="Admin, HR" href="{{url('infra_structure',[10,$tmsf->id])}}" class="btn btn-primary btn-xs"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        @endif
                      @endcan
                      @can('core-team')
                        @if(App\WorksSpaceProduct::where('tms_id',$tmsf->id)->where('group_id',11)->count()<1)
                          <a data-placement="top" style="margin-right: 5px;" data-toggle="tooltip" title="Core team" href="{{url('infra_structure',[11,$tmsf->id])}}" class="btn btn-primary btn-xs"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        @endif
                      @endcan
                      @can('accounts')
                        @if(App\WorksSpaceProduct::where('tms_id',$tmsf->id)->where('group_id',12)->count()<1)
                          <a data-placement="top" style="margin-right: 5px;" data-toggle="tooltip" title="Accounts" href="{{url('infra_structure',[12,$tmsf->id])}}" class="btn btn-primary btn-xs"><span class="fa fa-plus" aria-hidden="true"></span></a>
                        @endif
                      @endcan
                      @if( \App\WorksSpaceProduct::where('tms_id', $tmsf->id)->count() > 0 )
                        <a data-placement="top" data-toggle="tooltip" style="margin-right: 10px;" title="View Workstation" href="{{url('view-work-station',$tmsf->id)}}" class="btn btn-primary btn-xs"><i class="fa fa-eye" aria-hidden="true"></i></a>
                      @endif     
                        
                        
                    </td>
                  </tr>
                  @endforeach
                </tbody>
  
                <tfoot></tfoot>
              </table>
              <hr>
              
            </div>
          </div>
        </div>
  </div>


@endsection