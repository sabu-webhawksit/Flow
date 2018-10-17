@extends('layouts.master')
@section('main_content')
	<div class="top_hr">
            <span>WORKSTATION ACTIVATION</span>
    </div>
<form action="" method="post">
<div class="col-md-12 col-xs-11">
    <table class="table table-bordered custom-table">
        <tbody>
          <tr>
            <td class="table-background">Invoice Number</td>
            
            <td colspan="5"><input type="text" class="form-control" name="invoice"/></td>
          </tr>
          <tr>
            <td class="table-background">Client Name</td>
            <td colspan="5"></td>
          </tr>
          <tr>
            <td class="table-background">No. of hire</td>
            <td><input type="text" name="on_hire" class="form-control"/></td>
            <td class="table-background">Supervisors</td>
            <td><input type="text" name="supervisor" class="form-control"/></td>
            <td class="table-background">Team Member</td>
            <td><input type="text" name="team_member" class="form-control"/></td>
          </tr>
          <tr>
            <td class="table-background">No. of PC</td>
            <td><input type="text" name="pc" class="form-control"/></td>
            <td class="table-background">Windows</td>
            <td><input type="text" name="windows" class="form-control"/></td>
            <td class="table-background">MAC</td>
            <td><input type="text" name="mac" class="form-control"/></td>
          </tr>
        </tbody>
      </table>
</div>
<div class="col-md-12 col-xs-11">
    <table class="table table-bordered custom-table">
        <caption id="infa_id" class="custom-style">
            <i class="fa fa-plus-square-o"></i>
            Add a New Column
        </caption>
        <thead>
            <tr>
                <th>ITEM</th>
                <th>Quantity</th>
                <th>Starting Date ()</th>
                <th>Deadline</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody class="tableBody">
            <tr>
                <td>Food 
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>B.Card 	
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>ID Card 
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Orientation 		
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Plate
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Glass
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Stationaries
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Appointment letter
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Pay slip 
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>HR Code and conduct 	
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            <tr>
                <td>Office tour 	
                    <input type="hidden" name="item[]" value="TV"/>
                     <input type="hidden" name="group_id[]" value="1"/>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control"/>
                </td>
                <td>
                    <input type="text" name="starting_date[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="deadline[]" class="form-control pick_date"/>
                </td>
                <td>
                    <input type="text" name="notes[]" class="form-control"/>
                </td>
            </tr>
            
        </tbody>
    </table>
</div>
<div class="col-sm-4 col-sm-offset-4 col-xs-12">
    <div class="form-group no-margin-left-right text-center">
        <a href="#" class="btn btn-default custom-btn process_network" data-btn-id="2">Process To Core Team</a>
    </div>
</div>
</form>

@endsection
@section("footer_script")
$('.pick_date').datepicker();
@endsection