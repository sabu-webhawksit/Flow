
@extends('layouts.master')
@section('title', 'Create Service Pack')
@section('main_content')

<div class="top_hr top_hr_supervisor">
    <div class="supervisor">
        <h1>Service Pack</h1>
        <p>for the Sales Lead</p>
    </div>
</div>
<div class="col-lg-offset-3 col-lg-6">
    <div class="panel panel-primary" style="margin-top:8%">
       <div class="panel-heading">Create Service Pack</div>
         <div class="panel-body">
            <div class="col-xs-12">
              {!! Form::open(['url'=>url('service-pack'),'files'=>true])!!}
              {{ csrf_field() }}
               <div class="form-group no-margin-left-right ">
                  <label>Choice Pack </label>
                    <select class="form-control custom-form-control" name="pack_name">
                      <option selected="selected" value="">Select pack</option>
                       @foreach($packs as $pack)
                          <option value="{{$pack->id}}">{{$pack->pack_name}}</option>
                       @endforeach
                    </select>
                       @if ($errors->has('pack_name'))
                          <p class="text-right text-danger">{{$errors->first('pack_name')}}</p>
                       @endif
                </div>
                <div class="form-group no-margin-left-right ">
                    <label>Country</label>
                    <select class="form-control custom-form-control" name="country_name">
                        <option  value="">Select Country</option>
                        @foreach($country_list as $country) 
                            <option value="{{$country->name}}" @if (old('country_name') == $country->name) selected="selected" @endif>{{$country->name}}</option>
                        @endforeach
                    </select>
                        @if ($errors->has('country_name'))
                            <p class="text-right text-danger">{{$errors->first('country_name')}}</p>
                        @endif
                </div>
                <div class="form-group">
                    <label>Pack Upload</label>
                    <input type="file" class="custom-form-control" name="pack_file">
                </div>
                       @if ($errors->has('pack_file'))
                           <p class="text-right text-danger">{{$errors->first('pack_file')}}</p>
                       @endif
                <div class="text-right">
                    <button type="submit" class="btn btn-default custom-btn">Add New</button>
                </div>
             {!!Form::close()!!}  
        </div>
      </div>
    </div>
</div>
@stop          