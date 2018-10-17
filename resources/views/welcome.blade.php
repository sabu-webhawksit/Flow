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
                  TMSF-{{str_pad($sales_lead->id, 4, '0', STR_PAD_LEFT)}}-{{$sales_lead->company}}<i class="fa fa-angle-down pull-right"></i>
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
                        <div class="form-control custom-form-control input-view">{{$sales_lead->roles->name}}</div>
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
                        
                        <div class="form-control custom-form-control input-view">{{$sales_lead->country_manager_name->name}}</div>
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
                     <div class="form-control custom-form-control input-view">
                     <?php 
                        $pack_name=DB::table('service_pack')
                                    ->where('id',$sales_lead->pack)
                                    ->first(['pack_name']);
                        $pack=DB::table('pack')->where('id',$pack_name->pack_name)->first(['pack_name'])
                       ?>
                       {{$pack->pack_name}}
                     </div>
                     <a href="{{url('download-select-pack',[$sales_lead->pack,$sales_lead->country])}}" class="btn btn-default custom-btn" style="margin-top:5px">Download</a>
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
                 // print_r($client_employee);
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
                    $group_by_follow_up=DB::table('follow_ups')->groupBy('group_id')->where('tmsf_id',$sales_lead->id)->get();
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
                      @if($client_employee<1)
                      <button type="submit" id="btn_employee_client" data-id="{{$sales_lead->id}}" data-toggle="modal" data-target="#addTotalHire" class="btn btn-default custom-btn">Hire</button>
                      @endif
                      <button class="btn btn-default custom-btn" id="btn_add_followup" data-toggle="modal" data-target="#addFollowUp" data-id="{{$sales_lead->id}}">Follow Up</button>
                      <?php
                          $agreements=DB::table('agreements')->where('tms_id',$sales_lead->id)->count();
                        ?>
                        @if($agreements>=1)
                        <a class="btn btn-default custom-btn " href="{{url('view-agreement',$sales_lead->id)}}">Agrement</a>
                        @else
                        <a class="btn btn-default custom-btn" href="{{url('agreement',$sales_lead->id)}}">Agrement</a>
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

<!-- This Is a Modal Area For Add Sales Lead  -->
<div id="addsalesLead" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Sales Lead</h4>
      </div>
      {!! Form::open(['url'=>url('sales-lead'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
          <div class="col-xs-12 col-sm-4">
             <div class="form-group no-margin-left-right {{$errors->has('full_name')?'has-error':''}}">
                {!!Form::text('full_name',old('full_name'),['class'=>'form-control custom-form-control','placeholder'=>'Name e.g. John Morder'])!!}
                <span class="help-block">{{$errors->first('full_name')}}</span>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4">
             <div class="form-group no-margin-left-right {{$errors->has('position')?'has-error':''}}">
                {!!Form::text('position',old('position'),['class'=>'form-control custom-form-control','placeholder'=>'Position e.g. CTO'])!!}
                <span class="help-block">{{$errors->first('position')}}</span>
              </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('company_name')?'has-error':''}}">
              {!!Form::text('company_name',old('company_name'),['class'=>'form-control custom-form-control','placeholder'=>'Company e.g. ANW IT'])!!}
              <span class="help-block">{{$errors->first('company_name')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('country')?'has-error':''}}">
             <?php $data=[''=>'--Please Select--'];?>
               @foreach($country_list as $country)
               <?php 
                  $data[$country->name]=$country->name;
               ?>
               @endforeach
             {!!Form::select('country',$data, old('username'),['class'=>'form-control custom-form-control']) !!}
             <span class="help-block">{{$errors->first('country')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('state')?'has-error':''}}">
              {!!Form::text('state',old('state'),['class'=>'form-control custom-form-control','placeholder'=>'State e.g. California,New York'])!!}
              <span class="help-block">{{$errors->first('state')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('zip_code')?'has-error':''}}">
              {!!Form::text('zip_code',old('zip_code'),['class'=>'form-control custom-form-control','placeholder'=>'Zip Code e.g. 10004'])!!}
              <span class="help-block">{{$errors->first('zip_code')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('linkedin')?'has-error':''}}">
              {!!Form::text('linkedin',old('linkedin'),['class'=>'form-control custom-form-control','placeholder'=>'Linkedin e.g. https://www.linkedin.com/ '])!!}
              <span class="help-block">{{$errors->first('linkedin')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="form-group no-margin-left-right {{$errors->has('other_link')?'has-error':''}}">
              {!!Form::text('other_link',old('other_link'),['class'=>'form-control custom-form-control','placeholder'=>'Other link e.g.http://www.other.com'])!!}
              <span class="help-block">{{$errors->first('other_link')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('pitch_for')?'has-error':''}}">
             {!!Form::select('pitch_for', array(4 => 'Advisors', 5 => 'Sales & Marketing Leads',6 =>'Advisory & Sales Rep',7=>'Clients'), null, ['class'=>'form-control custom-form-control','placeholder' => 'Pitching for'])!!}
             <span class="help-block">{{$errors->first('pitch_for')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
              <select class="form-control custom-form-control" id="reference_id" name="reference">
                  <option  value="">Select Reference Email address</option>
                  @foreach($users_email as $user)
                      <option value="{{$user->id}}">{{$user->email}}</option>
                  @endforeach
                  <option  id="other_email" value="">Other...</option>
              </select>
          </div>
          
          <div class="col-xs-12 col-sm-4" id="enter_new_email" style="display: none">
            <div class="form-group no-margin-left-right {{$errors->has('email')?'has-error':''}}">
              <input type="email" class="new_email" name="enter_new_email" placeholder="Please enter new email here" />
              <span class="help-block">{{$errors->first('email')}}</span>
            </div>
          </div>
          
          <div class="col-xs-12 col-sm-4">
            <div class="form-group no-margin-left-right {{$errors->has('email')?'has-error':''}}">
              {!!Form::text('email',old('email'),['class'=>'form-control custom-form-control','placeholder'=>'Email'])!!}
              <span class="help-block">{{$errors->first('email')}}</span>
            </div>
          </div>
          <!--<div class="col-xs-12 col-sm-4 password">-->
          <!--  <div class="form-group no-margin-left-right {{$errors->has('password')?'has-error':''}}">-->
          <!--    {!!Form::input('password','password',old('password'),['class'=>'form-control custom-form-control','placeholder'=>'Password'])!!}-->
          <!--    <span class="help-block">{{$errors->first('password')}}</span>-->
          <!--  </div>-->
          <!--</div>-->
          <div class="col-xs-12">
           <div class="form-group no-margin-left-right {{ $errors->has('comments')?'has-error':''}}">
              <textarea name="comments" class="form-control custom-form-control" rows="5"  placeholder="Comments "></textarea>
              <span class="help-block">{{$errors->first('comments')}}</span>
            </div>
          </div>
        
          <div class="col-xs-12 col-sm-4">
           <div class="form-group no-margin-left-right {{$errors->has('pack')?'has-error':'' }}">
              {!!Form::select('pack', [], null, ['placeholder' => 'Select pack','class'=>'form-control custom-form-control'])!!}
              <span class="help-block">{{$errors->first('pack')}}</span>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4">
            <div class="form-group no-margin-left-right">
              {!!Form::text('extras',old('extras'),['class'=>'form-control custom-form-control','placeholder'=>'Extras'])!!}
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
<!--End Modal for create Sales Lead-->
<!-- Modal For Setup Meeting -->
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
                      <input type="hidden" name="tmsf_id" value="{{old('tmsf_id')}}" />
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
                      <input type="text" class="form-control custom-form-control" name="physical_meeting_address"  placeholder="Enter Address">
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
<!-- Modal For Follow Up -->
<div id="addFollowUp" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Follow Up</h4>
      </div>
      {!! Form::open(['url'=>url('add-follow-up'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
        <div class="row" id="follow_up_id">
          <div id="follow_up_id_html">
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <select class="form-control custom-form-control" name="follow_up_list[]">
                    <option>--Follow Up List--</option>
                    @foreach($meeting->users as $attendee)
                    <option>{{$attendee->name}}</option>
                    @endforeach
                  </select>
                  
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <input type="text" required class="form-control custom-form-control" name="next_action_list[]" placeholder="Next Action Next">
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <input type="text" required class="form-control custom-form-control" name="reminder_topics[]"  placeholder="Reminder Topics">
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <select class="form-control custom-form-control" name="reminder_via[]">
                    <option>--Reminder Via--</option>
                    <option value="Official Email">Official Email</option>
                    <option value="Persional Email">Persional Email</option>
                  </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <input type="text" required class="form-control custom-form-control follow_pick_date" name="follow_pick_date[]"/>
                </div>
            </div>
            <div class="col-xs-12 col-sm-3">
               <div class="form-group no-margin-left-right">
                  <input type="text" class="form-control custom-form-control follow_pick_time" required name="follow_pick_time[]"/>
                    <input type="hidden" name="tmsf_id" >
                </div>
            </div>
          </div>
            <div class="col-xs-12 col-sm-6">
              <div class="form-group no-margin-left-right">
                <textarea class="form-control custom-form-control" rows="1" name="follow_up_comments[]" required placeholder="Comments"></textarea>
              </div>
            </div>
            <!--<div class=""><i class="fa fa-trash btn btn-danger delete_follow_up_row new-margin"></i></div>-->
        </div>
        <div class=" row follow_up_class">
          
        </div>
        <a href="#" class="btn btn-info btn-sm custom-btn" id="add_follow_up_btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
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

<!-- Modal For Totoal Hire -->
<div id="addTotalHire" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Total Hire</h4>
      </div>
      {!! Form::open(['url'=>url('add-client-employee'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12">
              <table class="table table-bordered custom-table client_employee">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Skill set</th>
                      <th>Level</th>
                      <th>Quantity</th>
                      <th>Category</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr class="employee_list">
                      <td><i class="fa fa-trash btn btn-danger delete_row"></i></td>
                      <td><input type="text" name="skill_set[]" class="form-control" required/></td>
                      <td>
                          <select name="level[]" class="form-control">
                            <option value="Beginner">Beginner</option>
                            <option value="Mid">Mid</option>
                            <option value="Advanced ">Advanced </option>
                          </select>
                        </td>
                      <td><input type="text" name="quentity[]" class="form-control" required/></td>
                      <td>
                        <select name="category[]" class="form-control">
                          <option value="Supervisor">Supervisor</option>
                          <option value="Team Member">Team Member</option>
                        </select>
                      </td>
                    </tr>
                  </tbody>
                </table>
              <a href="#" class="btn btn-default custom-btn add_client_employee">Add More</a>
              <input type="hidden" name="tmsf_id"/>
            </div>
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