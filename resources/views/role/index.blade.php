@extends('layouts.master')
@section('main_content')
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
            <h3 class="panel-title"> Role Table
            <button class="btn btn-primary pull-right add-button " data-toggle="modal" data-target="#addRole">Add New Role</button>
            </h3>
          </div>
          <div class="panel-body ">
               <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Permission</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($role_list as $role)
                    <tr>
                        <td>{{$role->name}} </td>
                        <td>  
                             <a href="{{url('roles',$role->id)}}" class="btn btn-primary btn-md custom-button " data-target="" data-toggle="modal" data-role-id="{{$role->id}}">
                                Edit
                            </a>
                        </td>
                        <td>
                             <a class="btn btn-primary btn-xs editRole" data-target="#editRole" data-toggle="modal"  data-id="{{$role->id}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-danger btn-xs " data-target="#deleteRole" data-toggle="modal" data-role-id="1">
                                <i class="fa fa-trash-o "></i>
                            </a>
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


<!-- Add Role --SI-->


<div class="modal fade" id="addRole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add New Role</h4>
      </div>
      <form action="{{action('RoleController@store')}}" method="post">
      <div class="modal-body">
        
          {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placehplder="Enter Role Name">
                  @if($errors->has('name'))
                      <p class="text-danger pull-right"> {{$errors->first('name')}}</p>
                  @endif
            </div>
        
        
        
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Edite Role --SI-->

<div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Role</h4>
      </div>
      {!!Form::open(['url'=>'lorem','method'=>'PUT','name'=>'edit_role_from'])!!}
      <div class="modal-body">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
         
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control"  id="edit_name" name="edit_name" placehplder="Enter Role Name">
                 @if($errors->has('name'))
                      <p class="text-danger pull-right"> {{$errors->first('edit_name')}}</p>
                  @endif
                <input type="hidden" name="role_id"/>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Update</button>
      </div>
    {!!Form::close()!!}
    
    </div>
  </div>
</div>

<!-- Delete Role --SI-->

<div class="modal fade" id="deleteRole">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Delete Role</h4>
      </div>
      <div class="modal-body">
        {!! Form::open(['url'=>url('roles',$role->id),'method'=>'DELETE','class'=>'delete_role_class'])!!}
           <p>Are you sure you want to delete roles ?</p>
      </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Delete</button>
        </div>
     {!!Form::close()!!}
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@section('footer_script')
  @if(count($errors)>0)
    $('#addRole').modal('show');
  @endif

  @if($errors->has('edit_name')))
    $('#editRole').modal('show');
  @endif
@endsection