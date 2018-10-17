@extends('layouts.master')
@section('title','Work Station')
@section('main_content')
 <div class="col-xs-12 no-padding-left-right">
    <div class="top_hr">
        <span>WORKSTATION ACTIVATION</span>
    </div>
    <div class="col-sm-12">
      <table class="table table-bordered custom-table">
        <tbody>
          <tr>
              <td class="table-background">Invoice Number</td>
              <td colspan="5">{{$workstation_item->invoice}}</td>
            </tr>
          <tr>
              <td class="table-background">Client Name</td>
              <td colspan="5">{{$company->company}}</td>
            </tr>
          <tr>
              <td class="table-background">No. of hire</td>
              <td>{{$workstation_item->number_of_hire}}</td>
              <td class="table-background">Supervisors</td>
              <td>{{$workstation_item->supervisor}}</td>
              <td class="table-background">Team Member</td>
              <td>{{$workstation_item->team_member}}</td>
            </tr>
          <tr>
              <td class="table-background">No. of PC</td>
              <td>{{$workstation_item->pc}}</td>
              <td class="table-background">Windows</td>
              <td>{{$workstation_item->others_one}}</td>
              <td class="table-background">MAC</td>
              <td>{{$workstation_item->mac}}</td>
            </tr>
        </tbody>
      </table>
    </div>
    <div class="col-xs-12">
      <div id="exTab2">
        <ul class="nav nav-tabs custom-nav-tabs">
      	<li class="active"><a  href="#1" data-toggle="tab">Servnet</a></li>
      	<li><a href="#3" data-toggle="tab">Talent Acquisition</a></li>
        <li><a href="#4" data-toggle="tab">Hawks Lab</a></li>
        <li><a href="#5" data-toggle="tab">Accounts</a></li>
      </ul>
        <div class="tab-content ">
      	<div class="tab-pane active" id="1">
                <table class="table table-bordered custom-table">
                  
                                  <thead>
                                    <tr>
                                      <th>ITEM</th>
                                      <th>Quantity</th>
                                      <th>Starting Date</th>
                                      <th>Deadline</th>
                                      <th>Notes</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($workstation_product as $work_pro)
                                  @if($work_pro->group_id==8)
                                    <tr>
                                      <td>{{$work_pro->item}}</td>
                                      <td>{{($work_pro->qty==0)?"":$work_pro->qty}}</td>
                                      <td>{{$work_pro->starting_date}}</td>
                                      <td>{{$work_pro->deadline}}</td>
                                      <td>{{$work_pro->notes}}</td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                                </table>

      				</div>
        <div class="tab-pane" id="3">
                <table class="table table-bordered custom-table">
                  
                                  <thead>
                                    <tr>
                                      <th>ITEM</th>
                                      <th>Quantity</th>
                                      <th>Starting Date</th>
                                      <th>Deadline</th>
                                      <th>Notes</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                  @foreach($workstation_product as $work_pro)
                                  @if($work_pro->group_id==10)
                                    <tr>
                                      <td>{{$work_pro->item}}</td>
                                      <td>{{($work_pro->qty==0)?"":$work_pro->qty}}</td>
                                      <td>{{$work_pro->starting_date}}</td>
                                      <td>{{$work_pro->deadline}}</td>
                                      <td>{{$work_pro->notes}}</td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
                                </table>
      				</div>
      	<div class="tab-pane" id="4">
          <table class="table table-bordered custom-table">
            <thead>
                                    <tr>
                                      <th>ITEM</th>
                                      <th>Quantity</th>
                                      <th>Starting Date </th>
                                      <th>Deadline</th>
                                      <th>Notes</th>
                                    </tr>
                                  </thead>
            <tbody>
                                  @foreach($workstation_product as $work_pro)
                                  @if($work_pro->group_id==11)
                                    <tr>
                                      <td>{{$work_pro->item}}</td>
                                      <td>{{($work_pro->qty==0)?"":$work_pro->qty}}</td>
                                      <td>{{$work_pro->starting_date}}</td>
                                      <td>{{$work_pro->deadline}}</td>
                                      <td>{{$work_pro->notes}}</td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
          </table>
      	</div>
      	<div class="tab-pane" id="5">
          <table class="table table-bordered custom-table">
            <thead>
                                    <tr>
                                      <th>ITEM</th>
                                      <th>Quantity</th>
                                      <th>Starting Date</th>
                                      <th>Deadline</th>
                                      <th>Notes</th>
                                    </tr>
                                  </thead>
            <tbody>
                                  @foreach($workstation_product as $work_pro)
                                  @if($work_pro->group_id==12)
                                    <tr>
                                      <td>{{$work_pro->item}}</td>
                                      <td>{{($work_pro->qty==0)?"":$work_pro->qty}}</td>
                                      <td>{{$work_pro->starting_date}}</td>
                                      <td>{{$work_pro->deadline}}</td>
                                      <td>{{$work_pro->notes}}</td>
                                    </tr>
                                  @endif
                                  @endforeach
                                </tbody>
          </table>
      	</div>
      </div>
      </div>
    </div>
  </div>
@stop