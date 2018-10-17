@extends('layouts.master')

@section('main_content')
 <div class="col-xs-12 no-padding-left-right">
    <div class="top_hr">
        <span>Monthly Prospective sales leads</span>
    </div>
    <div class="col-sm-12 custom-settings">
        <form class="form-horizontal" role="form">
          <div class="col-xs-12">
           <div class="form-group no-margin-left-right">
              <sapn class="form-control custom-form-control">TMSF {{str_pad($tms_id, 4, '0', STR_PAD_LEFT)}}</span>
            </div>
          </div>
          <div class="col-xs-12">
              <div class="form-group no-margin-left-right">
             <select id="agreement_type" name="nda_type" class="form-control custom-form-control custom-form-control custom-form-control">
                <option>NDA Type</option>
                <option value="advisors">Advisors</option>
                <option value="client">Client</option>
                <option value="Advisory & Sales Rep">Advisory & Sales Rep </option>
                <option value="Sales & Marketing Leads">Sales & Marketing Leads </option>
              </select>
            </div>
          </div>
        </form>
        <div class="col-xs-12">
          <p class="text-justify" id="load_agreement_tmp"></p>
        </div>
        <div class="col-xs-12">
          <div class="form-group no-margin-left-right">
            <button type="submit" class="btn btn-default custom-btn" style="padding: 10px 50px;" data-toggle="modal" data-target="#addAgreement">Edit</button>
          </div>
        </div>
    </div>
</div>
<!-- Modal For Follow Up -->
<div id="addAgreement" class="modal fade" role="dialog">
  <div class="modal-dialog custom-modal">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header panel-heading-title">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Agreement</h4>
      </div>
      {!! Form::open(['url'=>url('add-nda'),'class'=>'form-horizontal','role'=>'form'])!!}
      <div class="modal-body">
        <div class="row">
            <div class="col-xs-12 col-sm-4">
               <div class="form-group no-margin-left-right">
                  <input type="text" class="form-control custom-form-control" name="agreement_title" placeholder="">
                </div>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div class="form-group no-margin-left-right">
              <textarea class="form-control custom-form-control" rows="3" name="agreement_body" placeholder="Comments"></textarea>
              <input type="hidden" name="tms_id" value="{{$tms_id}}"/>
            </div>
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