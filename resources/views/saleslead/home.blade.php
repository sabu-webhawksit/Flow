@extends('layouts.master')
@section('title', 'Sales Lead')

@section('main_content')
  <div class="col-xs-12 no-padding-left-right">
    <div class="top_hr">
        <span>Monthly Prospective sales leads</span>
    </div>
    <div class="">
      <div class="col-xs-6 ">
        <!--{!! Form::open([ 'url'=> url('sales-lead'), 'method'=> 'POST', 'class'=> 'form-inline' ]) !!}
          <div class="form-group">
            <div class="input-group custom-input-group">
              <div class="input-group-addon custom-group-addon">
                <button class="custom-search-btn" type="submit"><i class="fa fa-search"></i></button></div>
              <input type="text" class="form-control custom-search-input" id="exampleInputAmount" placeholder="Search Lead">
            </div>
          </div>
        </form>-->
      </div>
      <div class="col-xs-6 text-right">
        <!-- Trigger add Sales Lead modal with a button -->
        @can('sales-lead-btn')
        <button type="button" class="btn btn-default custom-btn"  data-toggle="modal" data-target="#addsalesLead">Add New</button>
        @endcan
      </div>
    </div>
    <div class="col-sm-12 custom-settings">
      
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
      
      <div class="panel-group" id="accordion">
        <?php $i=0;?>
        @foreach($sales_leads as $sales_lead)
        <?php $i++?>
        <div class="panel panel-default panel-style">
            <div class="panel-heading panel-heading-title"  data-toggle="tooltip" data-placement="top" title="Click to Expand/Collapse">
              <h4 class="panel-title " data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$sales_lead->id}}" aria-expanded="true" aria-controls="collapseOne">
                <span>
                  TMSF-{{str_pad($sales_lead->id, 4, '0', STR_PAD_LEFT)}}-{{$sales_lead->company}}
                  
                  <i class="fa fa-angle-down pull-right"></i>&nbsp;&nbsp;&nbsp;
                  <i class="pull-right">{{$sales_lead->created_at->diffForHumans()}}</i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </span>
              </h4>
            </div>
            <div id="collapse_{{$sales_lead->id}}" class="panel-collapse collapse">
              <div class="panel-body">
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Name</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->name}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Designation</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->position}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Company</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->company}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Country</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->country}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>State</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->state}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Zip Code</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->zip_code}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Linked in Profile</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->linkdin}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Other Link</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->others_link}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Pitch for</label>
                        <div class="form-control custom-form-control input-view">@if($sales_lead->roles){{$sales_lead->roles->name}} @endif</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Reference Name</label>
                        <?php
                          if(is_numeric($sales_lead->reference)){
                            $reference=App\User::where('id',$sales_lead->reference)->first(['email'])->email;
                           
                          }else{
                            $reference=$sales_lead->reference;
                          }
                        ?>
                        <div class="form-control custom-form-control input-view">{{$reference}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Country Manager</label>
                        
                        <div class="form-control custom-form-control input-view">@if($sales_lead->country_manager_name){{$sales_lead->country_manager_name->name}} @endif</div>
                      </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                      <div class="form-group no-margin-left-right">
                        <label>Created By</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->create_by_name->name}}</div>
                      </div>
                  </div>
                  <div class="col-xs-12">
                   <div class="form-group no-margin-left-right">
                       <label>Comment</label>
                      <div class="form-control custom-form-control input-view input-view-textarea">
                       {{$sales_lead->comments}}
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-4">
                   <div class="form-group no-margin-left-right">
                       <label>Attachment</label>
                       @if($sales_lead->pack)
                       @foreach($sales_lead->pack as $pack)
                       <a href="{{url('download-select-pack',[$pack,$sales_lead->country])}}" class="btn btn-default custom-btn" style="margin-top:5px">Download @if(\App\Servicepack::find($pack)) - {{ \App\Servicepack::find($pack)->pack->pack_name }}@endif</a>
                       @endforeach
                       @endif
                     
                    </div>
                </div>
                  <div class="col-xs-12 col-sm-4">
                    <div class="form-group no-margin-left-right">
                         <label>Extras</label>
                        <div class="form-control custom-form-control input-view">{{$sales_lead->extras}}</div>
                      </div>
                  </div>
                  
                  <!--Meeting area Start-->
                  <?php
                    $meeting=\App\Meeting::with('users')->where('tmsf_id',$sales_lead->id)->first();
                    if(!empty($meeting)){
                  ?>
                  <div class="col-xs-12 no-padding-left-right">
                    <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                      <div class="panel panel-default custom-panel-box">
                        <div class="panel-heading custom-panel-box-heading text-center">Timezone</div>
                        <div class="panel-body">
                          <div class="no-margin-left-right">
                            <p class="text-center">{{$meeting->meeting_time_zone}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                      <div class="panel panel-default custom-panel-box">
                        <div class="panel-heading custom-panel-box-heading text-center">Pick Date</div>
                        <div class="panel-body">
                          <div class="no-margin-left-right">
                            <p class="text-center">{{$meeting->meeting_date}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                      <div class="panel panel-default custom-panel-box">
                        <div class="panel-heading custom-panel-box-heading text-center">Time</div>
                        <div class="panel-body">
                          <p class="text-center">{{$meeting->meeting_time}}</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-12 no-padding-left-right">
                    <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                      <div class="panel panel-default custom-panel-box">
                        <div class="panel-heading custom-panel-box-heading text-center">Meeting Type</div>
                        <div class="panel-body">
                          <div class="no-margin-left-right">
                            <p class="text-center">{{$meeting->meeting_type}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                      <div class="panel panel-default custom-panel-box">
                        <div class="panel-heading custom-panel-box-heading text-center">{{($meeting->meeting_type=='Virtual')?'Virtual':''}}  Address</div>
                        <div class="panel-body">
                          <div class="no-margin-left-right">
                            <p class="text-center">{{$meeting->meeting_address}}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                    @if($meeting->meeting_type!='Virtual')
                    <div class="col-xs-12 form-group no-margin-left-right">
                      <iframe
                        width="100%"
                        height="300"
                        frameborder="0" style="border:0"
                        src="https://www.google.com/maps/embed/v1/place?key=AIzaSyBBsolj6aI5T59PWGhldepYl6aADBCS_Qg
                          &q={{$meeting->meeting_address}}"
                      </iframe>
                    </div>
                    @endif
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group no-margin-left-right">
                         <div class="input-group">
                            <div class="input-group-addon custom-group-addon attendent-group-view">Attendee</div>
                            <div class="form-control custom-form-control attendent-view-control" >
                              @foreach($meeting->users as $attendee)
                              <span>{{$attendee->name}}</span>
                              @endforeach
                            </div>
                         </div>
                    </div>
                  </div>
                  <div class="col-xs-12">
                     <div class="form-group no-margin-left-right">
                      <div class="form-control custom-form-control" style="min-height:100px">{{$meeting->comments}}</div>
                    </div>
                  </div>
                  <!--End Meeting  Area-->
                  <?php } ?>
                <!--Client area Start-->
                @if($sales_lead->pitching_for==7)
                <?php
                  $client_employee=\App\ClientEmployee::where('tms_id',$sales_lead->id)->count();
                 
                ?>
                @if( $client_employee > 0 )
                <?php
                  $employees=\App\ClientEmployee::where('tms_id',$sales_lead->id)->get();
                ?>
                <div class="col-xs-12">
                  <table class="table table-bordered custom-table">
                      <thead>
                        <tr>
                          <th></th>
                          <th><center>Skill set</center></th>
                          <th><center>Level</center></th>
                          <th><center>Quantity</center></th>
                          <th><center>Category</center></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($employees as $employee)
                        <tr>
                          <td>{{str_pad($employee->id, 3, '0', STR_PAD_LEFT)}}</td>
                          <td style="max-width: 250px;min-width: 100px;">{{$employee->skill_set}}</td>
                          <td><center>{{$employee->level}}</center></td>
                          <td><center>{{$employee->quentity}}</center></td>
                          <td><center>{{$employee->category}}</center></td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  <button type="submit" id="btn_employee_client" data-id="{{$sales_lead->id}}" data-toggle="modal" data-target="#addTotalHire" class="btn btn-default custom-btn">Hire</button>
                </div>
                @endif
                @endif
                <!--Client area End-->
                <!--Follow Up Area Start-->
                <div class="col-xs-12">
                  <?php
                    $group_by_follow_up=App\FollowUp::groupBy('group_id')->where('tmsf_id',$sales_lead->id)->get();
                    $follow_id=1;
                  
                  ?>
                  @if($group_by_follow_up !=null)
                  <div class="panel-group sub-panel-design" id="accordion_{{$sales_lead->id}}">
                    @foreach($group_by_follow_up as $follow)
                    <div class="panel panel-default panel-style">
                      <div class="panel-heading panel-heading-title">
                        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion_{{$sales_lead->id}}" href="#collapse_sub_{{$sales_lead->id}}_{{$follow->id}}">
                          <span>Follow Up {{str_pad($follow_id, 3, '0', STR_PAD_LEFT)}}-{{$sales_lead->company}}</span>
                          <i class="fa fa-angle-down pull-right"></i>
                          <i class="pull-right">{{ $follow->created_at->diffForHumans() }}</i>
                        </h4>
                      </div>
                      <div id="collapse_sub_{{$sales_lead->id}}_{{$follow->id}}" class="panel-collapse collapse {{($follow_id <= 1)?' in':''}}">
                        <div class="panel-body">
                          <?php
                            $follow_up=DB::table('follow_ups')
                            ->where('follow_ups.group_id',$follow->group_id)
                            ->where('follow_ups.tmsf_id',$sales_lead->id)
                            ->join('users','users.id','=','follow_ups.follow_up_list')
                            ->select('follow_ups.*','users.name')
                            ->get()
                          ?>
                          @foreach($follow_up as $group_follow)
                            <div class="row">
                                <div class="col-xs-12 col-sm-3">
                                   <div class="form-group no-margin-left-right">
                                      <span class="form-control custom-form-control">{{$group_follow->name}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                   <div class="form-group no-margin-left-right">
                                      <span class="form-control custom-form-control">{{$group_follow->next_action_list}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                   <div class="form-group no-margin-left-right">
                                      <span class="form-control custom-form-control">{{$group_follow->reminder_topics}}</span>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                   <div class="form-group no-margin-left-right">
                                      <span class="form-control custom-form-control">{{$group_follow->reminder_via}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                              <div class="col-xs-12 col-sm-3">
                                 <div class="form-group no-margin-left-right">
                                    <span class="form-control custom-form-control">{{$group_follow->follow_pick_date}}</span>
                                  </div>
                              </div>
                              <div class="col-xs-12 col-sm-3">
                                 <div class="form-group no-margin-left-right">
                                    <span class="form-control custom-form-control">{{$group_follow->follow_pick_time}}</span>
                                  </div>
                              </div>
                              <div class="col-xs-6">
                                <div class="form-group no-margin-left-right">
                                  <span class="form-control custom-form-control" style="min-height:35px">{{$group_follow->follow_up_comments}}</span>
                                </div>
                              </div>
                            </div>
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <?php $follow_id++;?>
                    @endforeach
                  </div>
                  @endif
                </div>
                @if(empty($meeting))
                <div class="col-sm-12 text-center">
                  @can('setup-meeting-btn')
                  <button class="btn btn-default custom-btn" id="btn_setup_meeting" data-toggle="modal" data-target="#addSetupMeeting" data-id="{{$sales_lead->id}}">Setup Meeting</button>
                  @endcan
                </div>
                @endif
                @if(!empty($meeting))
                  @if($meeting->status==1)
                    <div class="col-sm-12 text-center">
                      @if(\App\ClientEmployee::where('tms_id',$sales_lead->id)->count() < 1)
                      @if($sales_lead->pitching_for==7)
                      <button type="submit" id="btn_employee_client" data-id="{{$sales_lead->id}}" data-toggle="modal" data-target="#addTotalHire" class="btn btn-default custom-btn">Hire</button>
                      @endif
                      @endif
                      <button class="btn btn-default custom-btn {{($sales_lead->status==0)?'disabled':''}}" id="btn_add_followup" data-toggle="modal" data-target="#addFollowUp" data-id="{{$sales_lead->id}}">Follow Up</button>
                      <?php
                          $agreements=DB::table('agreements')->where('tms_id',$sales_lead->id)->count();
                      ?>
                        @if($agreements>=1)
                        <a class="btn btn-default custom-btn " href="{{url('view-agreement',$sales_lead->id)}}">Agrement</a>
                        @else
                        <a class="btn btn-default custom-btn" href="{{url('agreement',$sales_lead->id)}}">Agrement</a>
                        @endif
                        
                        <?php
                          $nda=DB::table('nda')->where('tms_id',$sales_lead->id)->count();
                        ?>
                        @if($nda>=1)
                          <a class="btn btn-default custom-btn" href="{{url('view-nda',$sales_lead->id)}}">NDA</a>
                        @else
                          <a class="btn btn-default custom-btn" href="{{url('nda',$sales_lead->id)}}">NDA</a>
                        @endif
                        @if($sales_lead->status == 1)
                        <a class="btn btn-default custom-btn" href="{{url('sales_status_unlock',$sales_lead->id)}}">Lock</a>
                        @else
                        <a class="btn btn-default custom-btn" href="{{url('sales_status_lock',$sales_lead->id)}}">Unlock</a>
                        @endif
                  </div>
                  @endif
                @endif
                @if(!empty($meeting))
                  @if($meeting->status!=1)
                  <div class="col-sm-12 text-center">
                    <button class="btn btn-default custom-btn" id="btn_edit_meeting" data-toggle="modal" data-target="#editSetupMeeting" data-id="{{$meeting->id}}">Meeting Edit</button>
                    <a class="btn btn-default custom-btn" href="{{url('complete-meeting',$meeting->id)}}">Meeting Complete</a>
                  </div>
                  @endif
                @endif
              </div>
            </div>
          </div>
        @endforeach
      </div> 
    </div>
  </div>
  
  
@include('saleslead.modals.add-sales-lead')

@include('saleslead.modals.add-meeting-setup')

@include('saleslead.modals.edit-meeting-setup')

@include('saleslead.modals.add-followup')

@include('saleslead.modals.add-total-hire')


@stop  
@section('footer_script')
 $(document).ready(function() {
  
  $("#reference_id").select2();
  $('.pick_date').datepicker();
  $('.follow_pick_date').datepicker();
  $('.chose_time').timepicker({minuteStep: 1});
  $('#follow_pick_time').timepicker({
      minuteStep: 1
    });
  $('.follow_pick_time').timepicker({
    minuteStep: 1
  });
  $('.tokenize').tokenize();
  
  @if(count($errors)>0)
    @if ($errors->has('full_name') || 
          $errors->has('position') ||
          $errors->has('company_name') ||
          $errors->has('country') ||
          $errors->has('email') ||
          $errors->has('pack') ||
          $errors->has('pitch_for'))
            $('#addsalesLead').modal('show');
    @endif
    
    @if($errors->has('time_zone') ||
    $errors->has('meeting_date')||
    $errors->has('meeting_time')||
    $errors->has('attendent'))
      $('#addSetupMeeting').modal('show');
    @endif
    
    @if($errors->has('edit_meeting_time_zone') ||
    $errors->has('edit_meeting_date')||
    $errors->has('edit_meeting_time')||
    $errors->has('edit_attendent'))
      $('#editSetupMeeting').modal('show');
    @endif
    
  @endif
});
@stop