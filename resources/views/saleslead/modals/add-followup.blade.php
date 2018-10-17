
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
                  <select class="form-control custom-form-control" required name="follow_up_list[]">
                    <option value="">--Follow Up List--</option>
                    
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
               <!--<div class="form-group no-margin-left-right">
                  <select class="form-control custom-form-control" name="reminder_via[]">
                    <option>--Reminder Via--</option>
                    <option value="Official Email">Official Email</option>
                    <option value="Persional Email">Persional Email</option>
                  </select>
                </div>-->
                <div class="form-group no-margin-left-right">
                  <div class="checkbox form-control custom-form-control remove-bd-ceckbox">
                    <label><input type="checkbox" name="reminder_via[]" value="1">Notify by Email</label>
                  </div>
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