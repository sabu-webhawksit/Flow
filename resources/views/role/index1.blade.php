@extends('layouts.master')
@section('main_content')
<div class="col-md-10 col-md-offset-1">
   <div class="panel panel-default custom-panel ">
          <div class="panel-heading pannel_header_custome clearfix">
            <h3 class="panel-title"> All Users
           
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
                      <th>Create</th>
                      <th>Last Update</th>
                      <th>Permission</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                   @foreach($role_list as $role)
                    <tr>
                        <td>{{$role->name}} </td>
                        <td>Create</td>
                        <td>Update</td>
                        <td>  
                             <a href="" class="btn btn-primary btn-md custom-button " data-target="" data-toggle="modal">
                                Edit
                            </a>
                        </td>
                        <td>
                             <a class="btn btn-primary btn-xs" data-target="#editRole" data-toggle="modal" id="editRole" data-role_id="{{$role->id}}">
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
                <!--/* View Users pagination by Noor Jahan  */-->
                  
                <!--/* View Users pagination by Noor Jahan  */-->
               
          </div>
          
        </div>

</div>
@endsection

<!-- Modal -->

<!-- Add User --SI-->

<!-- Edite User --SI-->
<div class="modal fade" id="editRole" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="" method="post">
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="_token" id="update_token" value="{{ csrf_token() }}">
      <div class="modal-header model-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Edit Role</h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="edit_name_role" class="form-control" name="name" value="" placeholder="name">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="update_role" class="btn btn-primary">Update</button>
      </div>
    </form>
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
      <form action="" method="post">
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
    $('#edit_id').click();
  @endif
@endsection