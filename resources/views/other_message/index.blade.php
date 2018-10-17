
@extends('layouts.master')

@section('title', 'Others Meeting')


@section('main_content')
<div class="col-xs-12 no-padding-left-right">
    <div class="top_hr">
        <span>Others Meetings</span>
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
        <?php $i++;?>
          <div class="panel panel-default panel-style">
            <div class="panel-heading panel-heading-title">
              <h4 class="panel-title " data-toggle="collapse" data-parent="#accordion" href="#collapse_{{$sales_lead->id}}" aria-expanded="true" aria-controls="collapseOne">
                <span>
                  TMSF-{{str_pad($sales_lead->id, 4, '0', STR_PAD_LEFT)}}-{{$sales_lead->name}}-{{$sales_lead->name}} <i class="fa fa-angle-down pull-right"></i>
                </span>
              </h4>
            </div>
            <div id="collapse_{{$sales_lead->id}}" class="panel-collapse collapse ">
              <div class="panel-body">
                <div class="col-xs-12">
                  <div class="panel-group sub-panel-design" id="accordion_{{$sales_lead->id}}">
                    <?php
                      $meetings=App\Meeting::with('users')->where('tmsf_id',$sales_lead->id)->get();
                    ?>
                    @foreach($meetings as $meeting)
                    <div class="panel panel-default panel-style">
                      <div class="panel-heading panel-heading-title">
                        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion_{{$sales_lead->id}}" href="#collapse_sub_{{$sales_lead->id}}_{{$meeting->id}}">
                          <span>Meeting-{{$sales_lead->name}}-{{$sales_lead->company}}</span>
                          <i class="fa fa-angle-down pull-right"></i>
                        </h4>
                      </div>
                      <div id="collapse_sub_{{$sales_lead->id}}_{{$meeting->id}}" class="panel-collapse collapse in}}">
                        <div class="panel-body">
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
                            <div class="panel-heading custom-panel-box-heading text-center">Virtual or Real Address</div>
                            <div class="panel-body">
                              <div class="no-margin-left-right">
                                <p class="text-center">{{$meeting->meeting_address}}</p>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-xs-12">
                        <div class="form-group no-margin-left-right">
                            <div class="input-group">
                              <div class="input-group-addon custom-group-addon attendent-group-view">Attendue</div>
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

                          </div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
                <div class="col-sm-12 text-center">
                  <button class="btn btn-default custom-btn" id="btn_setup_meeting" data-toggle="modal" data-target="#addSetupMeeting" data-id="{{$sales_lead->id}}">Setup Meeting</button>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div> 
    </div>
</div>

<div id="addSetupMeeting" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Setup Meeting</h4>
      </div>
      {!! Form::open(['url'=>url('meeting'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
            <div class="col-xs-12 no-padding-left-right">
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Select Timezone</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <select class="form-control custom-form-control" name="time_zone">
                        @foreach($time_zone as $tm)
                        <option value="{{$tm->text}}">{{$tm->text}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
                <span class="help-block">{{$errors->first('time_zone')}}</span>
              </div>
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Pick Date</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <input type="text" class="form-control custom-form-control pick_date" name="meeting_date" placeholder="Select date">
                      <input type="hidden" name="tmsf_id" />
                    </div>
                  </div>
                </div>
                <span class="help-block">{{$errors->first('meeting_date')}}</span>
              </div>
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Choose Time</div>
                  <div class="panel-body bootstrap-timepicker timepicker">
                    <input type="text" class="form-control custom-form-control input-small chose_time" name="meeting_time"  placeholder="Select time">
                  </div>
                </div>
                <span class="help-block">{{$errors->first('meeting_time')}}</span>
              </div>
            </div>
            <div class="col-xs-12 no-padding-left-right">
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Meeting Type</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <select class="form-control custom-form-control" name="meeting_type">
                        <option>--Please Select--</option>
                        <option value="Physical Meeting">Physical Meeting</option>
                        <option value="Virtual">Virtual</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div style="display:none" class="col-xs-12 col-sm-4 form-group no-margin-left-right physical_meeting">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Physical Address</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <input type="text" class="form-control custom-form-control" name="meeting_address"  placeholder="Enter Address">
                    </div>
                  </div>
                </div>
              </div>
              <div style="display:none" class="col-xs-12 col-sm-4 form-group no-margin-left-right virtual_meeting">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Virtual Address</div>
                  <div class="panel-body bootstrap-timepicker timepicker">
                    <select class="form-control custom-form-control" name="meeting_address">
                      <option value="Skype">Skype</option>
                      <option value="WebEx">WebEx</option>
                    </select>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="col-xs-12">
                <?php  
                      $attendee=[];
                      foreach($users as $user){
                        $attendee[$user->id]=$user->name;
                      }
                    ?>
                {!!Form::select('attendent[]',$attendee, old('attendent'), ['multiple' => 'multiple','class'=>'form-control custom-form-control tokenize-sample tokenize'])!!}
                <span class="help-block">{{$errors->first('attendent')}}</span>
                <!--<select id="" name="attendent[]" multiple="multiple" class="form-control custom-form-control tokenize-sample tokenize">-->
                <!--    
                <!--</select>-->
            </div>
            <div class="col-xs-12">
              <div class="form-group no-margin-left-right">
                <textarea placeholder="Sales Lead Comment" name="comments" rows="3" class="form-control custom-form-control"></textarea>
              </div>
            </div>
          <div class="form-group">
            <!-- <div class="col-sm-12 text-center">
              <button type="submit" class="btn btn-default custom-btn">Submit</button>
            </div> -->
          </div>
      </div>
      <div class="modal-footer">
        <div class="form-group">
          <div class="col-sm-12 text-right">
            <button type="button" class="btn btn-default custom-close-btn" data-dismiss="modal">Close</button>
            <input type="submit" class="btn btn-default custom-btn" value="Save"/>
          </div>
        </div>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>

@stop

@section('footer_script')
  @if(count($errors)>0)
    @if($errors->has('time_zone') ||
    $errors->has('meeting_date')||
    $errors->has('meeting_time')||
    $errors->has('attendent'))
      $('#addSetupMeeting').modal('show');
    @endif
  @endif
  
$('.pick_date').datepicker();
$('#follow_pick_date').datepicker();
$('.follow_pick_date').datepicker();
$('.chose_time').timepicker({
    minuteStep: 1
  });
$('#follow_pick_time').timepicker({
  minuteStep: 1
});
$('.follow_pick_time').timepicker({
  minuteStep: 1
});
$('.tokenize').tokenize();
@stop