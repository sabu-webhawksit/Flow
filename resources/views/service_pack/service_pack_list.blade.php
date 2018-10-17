@extends('layouts.master')
@section('title', 'Service Pack List')
@section('main_content')

<div class="col-xs-12 no-padding-left-right">
  <div class="top_hr top_hr_supervisor">
      <div class="supervisor">
          <h1>Service Pack</h1>
          <p>for the Sales Lead</p>
      </div>
  </div>
   <div class="container">
     <div class="row">
      <div class="container">
        <div class="user_header" style="margin-top:8%"> 
            <h3 class="vat-tax-heading">Service Pack List</h3>
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
              <table class="table table-bordered">
                <thead>
                  <tr center>
                    <th class='text-center'>Pack Type</th>
                    <th class='text-center'>Country Name</th>
                    <th class='text-center'>Created Date</th>
                    <th class='text-center'>Action</th>
                  </tr>
                </thead>
                
                <tbody>
                  @foreach($services as $service)
                  <tr>
                    <td class='text-center'>{{$service->pack->pack_name}}</td>
                    <td class='text-center'>{{$service->country_name}}</td>
                    <td class='text-center'>
                    <?php 
                    $date = explode(" ",$service->created_at);
                    ?>
                    {{$date[0]}}</td>
                    
                    <td class='text-center'>
                      <center>
                      {!!Form::open(['url'=>url('service-pack',$service->id),'class'=>'form-inline','method'=>'delete'])!!}
                      
                            <fieldset>
                              <div class="form-group">
                                    <a href="{{url('download-pack',$service->id)}}" class="btn btn-info custom-info-btn custom-btn-icon"><i class="glyphicon glyphicon-download-alt"></i></a>
                                </div>
                                <div class="form-group">
                                    <a href="{{action('ServicePackController@edit',$service->id)}}" class="btn btn-info custom-info-btn custom-btn-icon"><i class="fa fa-pencil-square-o"></i></a>
                                </div>
                                
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger custom-danger-btn custom-btn-icon"><i class="fa fa-trash"></i></button>
                                </div>
                            </fieldset>  
                        {!! Form::close() !!}
                        </center>
                    </td>
                  </tr>
                  @endforeach 
                </tbody>
                 
              </table>
              <div class="pull-right">
                {!! $services->render() !!}
              </div>
        </div>
      </div>
    </div>
</div>
</div>
@stop