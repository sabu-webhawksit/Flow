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
              {!!Form::select('pack[]', [], null, ['placeholder' => 'Select pack','class'=>'form-control custom-form-control', 'multiple'=>'multiple' ])!!}
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