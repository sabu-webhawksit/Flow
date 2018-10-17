@extends('layouts.master')
@section('main_content')
<div class="col-md-10 col-md-offset-1">
  @if($errors->any())
  @foreach($errors->all() as $error)
  <p class="alert alert-warning"{{$error}}></p>
  @endforeach
  @endif
  
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
            <h3 class="panel-title"> All Users<br>
             
            <button type="button" class="btn btn-primary pull-right add-button " data-toggle="modal" data-target="#addUser">
              Add New User
            </button>
            </h3>
          </div>
          <div class="panel-body ">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Country</th>
                      <th>Branch</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!--/* View Users by Noor Jahan  */-->
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->country}}</td>
                            <td>{{$user->branch}}</td>
                            <td>@if($user->roles){{$user->roles->name}} @endif</td>
                    <!--/* View Users by Noor Jahan  */-->
                            <td>
                                <a class="btn btn-primary btn-xs edit_id" data-target="#editUser" data-toggle="modal" data-id="{{$user->id}}">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-danger btn-xs delete_id" data-target="#deleteUser" data-toggle="modal" data-id="{{$user->id}}" data-role-id="1">
                                    <i class="fa fa-trash-o "></i>
                                </a>
                            </td>
                        </tr>
                      @endforeach  
                    </tbody>
                  <tfoot>
                  </tfoot>
                </table>
                <hr>
                <!--/* View Users pagination by Noor Jahan  */-->
                  <div class="pull-right">{!!$users->render()!!}</div>
                <!--/* View Users pagination by Noor Jahan  */-->
               
          </div>
          
        </div>

</div>
@endsection

<!-- Modal -->

<!-- Add User --SI-->
<div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <form action="{{action('UserController@store')}}" method="post">
      <!--<input type="hidden" name="_method" value="POST">-->
        <input type="hidden" name="_token" id="add_token" value="{{ csrf_token() }}">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Add New User</h4>
      </div>
      <div class="modal-body">
        
          <div class="form-group">
                <label for="email">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" id="name" value="{{Request::old('name')}}">
                  @if ($errors->has('name'))
                    <span class="text-right text-danger">{{$errors->first('name')}}</span>
                  @endif
          </div>
          <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" placeholder="email" value="{{Request::old('email')}}" id="email" autocomplete="off">
                @if ($errors->has('email'))
                    <span class="text-right text-danger">{{$errors->first('email')}}</span>
                  @endif
                
          </div>
          <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="password" id="password" autocomplete="off">
                  @if ($errors->has('password'))
                    <span class="text-right text-danger">{{$errors->first('password')}}</span>
                  @endif
          </div>
          <div class="form-group">
                <label for="designation">Designation</label>
                <input type="text" class="form-control" name="designation" placeholder="designation" id="designation" value="{{Request::old('designation')}}">
                @if ($errors->has('designation'))
                    <span class="text-right text-danger">{{$errors->first('designation')}}</span>
                  @endif
          </div>
          
          <div class="form-group">
                <label for="department">Department</label>
                <input type="text" class="form-control" name="department" placeholder="department" id="department" value="{{Request::old('department')}}">
                @if ($errors->has('department'))
                    <span class="text-right text-danger">{{$errors->first('department')}}</span>
                  @endif
          </div>
          <div class="form-group no-margin-left-right ">
              <label>Country</label>
              <select class="form-control custom-form-control" name="country">
                  <option  value="">Select Country</option>
                  @foreach($country_list as $country)
                      <option value="{{$country->name}}" @if (old('country_name') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group no-margin-left-right ">
              <label>Country I manage (country managers only)</label>
              <select class="form-control custom-form-control" name="country_i_manage">
                  <option  value="">Select Country</option>
                  @foreach($country_list as $country)
                      <option value="{{$country->name}}" @if (old('country_name') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
                <label for="branch">Branch</label>
                <input type="text" class="form-control" name="branch" placeholder="branch" id="branch" value="{{Request::old('branch')}}">
                @if ($errors->has('branch'))
                    <span class="text-right text-danger">{{$errors->first('branch')}}</span>
                  @endif
          </div>
          <div class="form-group">
            <label for="branch">Role</label>
              <select class="form-control" name="role_id" id="edit_role_list">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Edite User --SI-->
<div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(['url'=>url('user',$user->id),'method'=>'PUT','class'=>'update_user_class'])!!}
        <!--<input type="hidden" name="_method" value="PUT">-->
        <input type="hidden" name="_token" id="update_token" value="{{ csrf_token() }}">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
                <label for="edit_name">Name</label>
                <input type="text" id="edit_name" class="form-control" name="edit_name" placeholder="name" required>
                
                <span class="pull-right text-danger" id="edit_name_error">
                  @if ($errors->has('edit_name'))
                    <span class="text-right text-danger">{{$errors->first('edit_name')}}</span>
                  @endif
				      	</span>
          </div>
          <div class="form-group">
                <label for="edit_email">Email</label>
                <input type="email" id = "edit_email" class="form-control" name="edit_email" value="" placeholder="email" required>
                <span class="pull-right text-danger" id="edit_email_error">
                  @if ($errors->has('edit_email'))
                    <span class="text-right text-danger">{{$errors->first('edit_email')}}</span>
                  @endif
				      	</span>
          </div>
          <div class="form-group">
                <label for="edit_designation">Designation</label>
                <input type="text" id="edit_designation" class="form-control" name="edit_designation" value="" placeholder="designation" required>
                <span class="pull-right text-danger" id="edit_designation_error">
                  @if ($errors->has('edit_designation'))
                    <span class="text-right text-danger">{{$errors->first('edit_designation')}}</span>
                  @endif
				      	</span>
          </div>
          
          <div class="form-group">
                <label for="edit_department">Department</label>
                <input type="text" id="edit_department" class="form-control" name="edit_department" value="" placeholder="department" required>
                <span class="pull-right text-danger" id="edit_department_error">
                  @if ($errors->has('edit_department'))
                    <span class="text-right text-danger">{{$errors->first('edit_department')}}</span>
                  @endif
				      	</span>
          </div>
          <div class="form-group no-margin-left-right ">
              <label for="edit_country">Country</label>
              <select class="form-control custom-form-control" name="edit_country" id="edit_country">
                  <option  value="">Select Country</option>
                  @foreach($country_list as $country)
                      <option value="{{$country->name}}">{{$country->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group no-margin-left-right ">
              <label for="edit_country">Country I manage (Country managers only)</label>
              <select class="form-control custom-form-control" name="country_i_manage" id="country_i_manage">
                  <option  value="">Select Country</option>
                  @foreach($country_list as $country)
                      <option value="{{$country->name}}">{{$country->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
                <label for="edit_branch">Branch</label>
                <input type="text" id="edit_branch" class="form-control" name="edit_branch" value="" placeholder="branch" required>
                <span class="pull-right text-danger" id="edit_branch_error">
                 @if ($errors->has('edit_branch'))
                    <span class="text-right text-danger">{{$errors->first('edit_branch')}}</span>
                  @endif
				      	</span>
          </div>
          <div class="form-group">
            <label for="edit_role">Role</label>
              <select class="form-control" name="edit_role" id="edit_role_list">
                @foreach($roles as $role)
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach
              </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="update_user" data-id="{{$user->id}}" class="btn btn-primary">Save</button>
      </div>
    {!!Form::close()!!}
    </div>
  </div>
</div>

<!-- Delete User --SI-->
<div class="modal fade" id="deleteUser">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete User</h4>
      </div>
      
        {!! Form::open(['url'=>url('user',$user->id),'method'=>'DELETE','class'=>'edit_user_class'])!!}
          <div class="modal-body">
            <p>Are you sure you want to delete this User ?</p>
          </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
@section('footer_script')
  @if(count($errors)>0)
    @if (!$errors->has('edit_name') || 
          !$errors->has('edit_email') ||
          !$errors->has('edit_designation') ||
          !$errors->has('edit_department') ||
          !$errors->has('edit_branch'))
            $('#addUser').modal('show');
    @endif
  @endif
@endsection