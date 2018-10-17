@extends('layouts.master')
@section('main_content')
	<div class="top_hr">
            <span>WORKSTATION ACTIVATION</span>
    </div>
{!!Form::open(['url'=>url('add-workstation')])!!}

<div class="col-md-12 col-xs-11">
    <table class="table table-bordered custom-table">
        <tbody>
          <tr>
            <td class="table-background">Invoice Number</td>
            
            <td colspan="5"><input type="text" value="{{($workStationItem!=null)?$workStationItem->invoice:''}}" class="form-control" name="invoice"/></td>
            <input type="hidden" name="tms_id" value="{{$company_name->id}}"/>
          </tr>
          <tr>
            <td class="table-background">Client Name</td>
            <td colspan="5">{{$company_name->company}}</td>
          </tr>
          <tr>
            <td class="table-background">No. of hire</td>
            <td><input type="text" value="{{($workStationItem!=null)?$workStationItem->number_of_hire:''}}" name="on_hire" class="form-control"/></td>
            <td class="table-background">Supervisors</td>
            <td><input type="text" value="{{($workStationItem!=null)?$workStationItem->supervisor:''}}" name="supervisor" class="form-control"/></td>
            <td class="table-background">Team Member</td>
            <td><input type="text" value="{{($workStationItem!=null)?$workStationItem->team_member:''}}" name="team_member" class="form-control"/></td>
          </tr>
          <tr>
            <td class="table-background">No. of PC</td>
            <td><input type="text" name="pc" value="{{($workStationItem!=null)?$workStationItem->pc:''}}" class="form-control"/></td>
            <td class="table-background">Windows</td>
            <td><input type="text" value="{{($workStationItem!=null)?$workStationItem->others_one:''}}" name="windows" class="form-control"/></td>
            <td class="table-background">MAC</td>
            <td><input type="text" name="mac" value="{{($workStationItem!=null)?$workStationItem->mac:''}}" class="form-control"/></td>
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
                <th>Starting Date </th>
                <th>Deadline</th>
                <th>Notes</th>
            </tr>
        </thead>
        <tbody class="tableBody">
            
        </tbody>
    </table>
</div>
<div class="col-sm-4 col-sm-offset-4 col-xs-12">
    <div class="form-group no-margin-left-right text-center">
        <input type="hidden" name="group_id" value="{{$group_id}}"/>
        <input type="submit" class="btn btn-default custom-btn process_network" value="Save">
    </div>
</div>
{!!Form::close()!!}

@endsection
@section("footer_script")
$('.pick_date').datepicker();
@endsection