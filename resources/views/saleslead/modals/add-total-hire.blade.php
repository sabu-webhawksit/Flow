
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