
<!-- Modal For Edit Meeting -->
<div id="editSetupMeeting" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Meeting</h4>
      </div>
      {!! Form::open(['url'=>url('update-meeting'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
            <div class="col-xs-12 no-padding-left-right">
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Select Timezone</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <select class="form-control custom-form-control" name="edit_meeting_time_zone">
                        @foreach($time_zone as $tm)
                        <option value="{{$tm->text}}">{{$tm->text}}</option>
                        @endforeach
                        
                      </select>
                    </div>
                  </div>
                  
                </div>
                <span class="help-block">{{$errors->first('edit_meeting_time_zone')}}</span>
              </div>
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Pick Date</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <input type="text" class="form-control custom-form-control pick_date" name="edit_meeting_date" placeholder="Select date">
                      <input type="hidden" name="meeting_id" value="{{old('meeting_id')}}" />
                    </div>
                  </div>
                </div>
                <span class="help-block">{{$errors->first('edit_meeting_date')}}</span>
              </div>
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Choose Time</div>
                  <div class="panel-body bootstrap-timepicker timepicker">
                    <input type="text" class="form-control custom-form-control input-small chose_time" name="edit_meeting_time"  placeholder="Select time">
                  </div>
                </div>
                <span class="help-block">{{$errors->first('edit_meeting_time')}}</span>
              </div>
            </div>
            <div class="col-xs-12 no-padding-left-right">
              <div class="col-xs-12 col-sm-4 form-group no-margin-left-right">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Meeting Type</div>
                  <div class="panel-body">
                    <div class="no-margin-left-right">
                      <select class="form-control custom-form-control" name="edit_meeting_type">
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
                      <input type="text" class="form-control custom-form-control" name="edit_physical_meeting_address"  placeholder="Enter Address">
                    </div>
                  </div>
                </div>
              </div>
              <div style="display:none" class="col-xs-12 col-sm-4 form-group no-margin-left-right virtual_meeting">
                <div class="panel panel-default custom-panel-box">
                  <div class="panel-heading custom-panel-box-heading">Virtual Address</div>
                  <div class="panel-body bootstrap-timepicker timepicker">
                    <select class="form-control custom-form-control" name="edit_meeting_address">
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
                {!!Form::select('edit_attendent[]',$attendee, old('edit_attendent'), ['multiple' =>'multiple','id'=>"tokenize",'class'=>'form-control custom-form-control tokenize-sample tokenize'])!!}
                <span class="help-block">{{$errors->first('edit_attendent')}}</span>
                
            </div>
            <div class="col-xs-12">
               <div class="form-group no-margin-left-right">
                  <textarea placeholder="Sales Lead Comment" name="edit_comments" rows="3" class="form-control custom-form-control"></textarea>
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