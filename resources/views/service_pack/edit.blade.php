
@extends('layouts.master')
@section('title', 'Create Service Pack')
@section('main_content')

<div class="top_hr top_hr_supervisor">
      <div class="supervisor">
          <h1>Service Pack</h1>
          <p>for the Sales Lead</p>
      </div>
</div>
{!! Form::open(['url'=>action('ServicePackController@update',$service->id),'files'=>true,'method'=>'PATCH'])!!}
  
<div class="col-lg-offset-3 col-lg-6">
    <div class="panel panel-primary" style="margin-top:8%">
       <div class="panel-heading">Create Service Pack</div>
          <div class="panel-body">
                   <div class="col-xs-12">
                       <div class="form-group no-margin-left-right ">
                          <label>Choice Pack </label>
                          <input type="hidden" name="{{$service->id}}" value="{{$service->id}}" id="id" />
                              <select class="form-control custom-form-control" name="pack_name">
                                   @foreach($packs as $pack)
                                    <option value="{{$pack->id}}" @if($pack->id==$service->pack_name) selected @endif>{{$pack->pack_name}}</option>
                                   @endforeach
                              </select>
                              <span class="help-block"></span>
                        </div>
                    </div>
    
                   <div class="col-xs-12">
                          <div class="form-group">
                                <label>Pack Upload</label>
                                <input type="file" value="{{$service->pack_file}}" id="id" class="custom-form-control" name="pack_file">
                          </div>
                   </div>
                    <div class="col-xs-12 text-right">
                        <button type="submit" class="btn btn-default custom-btn">Update</button>
                    </div>
       </div>
    </div>
</div>
{!!Form::close() !!}    
@stop          