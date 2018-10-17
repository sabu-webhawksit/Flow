
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login</title>

    <!-- Bootstrap -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/public/css/font-awesome.css" rel="stylesheet">
    <link href="/public/css/login.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 col-xs-12">
                <div class="login-logo">
                    <img src="/public/images/logo.png" class="img-responsive" alt="logo">
                </div>
            
                <div class="login-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                       <li> {!! $error !!}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif 
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
                        <form role="form" action="{{ action('AuthController@postAccessRequest') }}" method="post">
                        {{ csrf_field() }}
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Name</span>
                                {!!Form::text('name', null, ['class'=>'form-control custom-input-field', 'placeholder'=>'Enter your full name'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Email</span>
                                {!!Form::email('email',null,['class'=>'form-control custom-input-field','placeholder'=>'Enter your work Email'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Password</span>
                                {!!Form::password('access_password',['class'=>'form-control custom-input-field','password'=>'Enter a strong Password for secured login'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Designation</span>
                                {!!Form::text('designation', null, ['class'=>'form-control custom-input-field', 'placeholder'=>'Enter your designation'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Department</span>
                                {!!Form::text('department', null, ['class'=>'form-control custom-input-field', 'placeholder'=>'Department you are working at'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right" data-toggle="tooltip" data-placement="top"  title="country managers select the country you will be working for">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Country</span>
                                {!!Form::select('country', ['Bangladesh', 'Japan', 'United States', 'Cambodia', 'Hong Kong', 'Laos', 'Canada', 'Germany', 'Australia'], null, ['class'=>'form-control custom-input-field'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group">
                                <span class="input-group-addon custom-input-group-addon login_span_color">Role/User Group</span>
                                {!!Form::select('role_id', [3=> 'Country Manager', 8=> 'Infra-Structure', 9=> 'Network', 10=> 'Admin-HR', 11=> 'Core Team', 12=> 'Accounts' ], null, ['class'=>'form-control custom-input-field'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group custom-margin-left custom-margin-right">
                            <div class="input-group login-input-group">
                                <button class="btn btn-info btn-lg custom-info-btn login-btn"><i class="fa fa-unlock-alt"></i> Request Access</button>
                            </div>
                       </div>
                       
                    </form>
                </div>
                <div class="login-footer">
                    <center>
                        <a href="{{ action('AuthController@getForget') }}" class="mb-control" data-box="#forgot_password">Forgot password</a>&nbsp;
                        |&nbsp;<a href="#">About</a>&nbsp;|&nbsp;
                        <a href="#">Privacy</a>
                    </center>
                    <center>
                        <a href="#">Contact Us</a> | <a href="{{route('login')}}">Login</a>
                    </center>
                </div> 
                <footer>
                    <div class="login-footer-info">
                        <center><img src="/public/images/webhawksit.png" class="img-responsive footer-logo" alt=""></center>
                        <center>    
                            <p>All Rights Recived WebHawks IT</p>
                        </center>
                    </div>
                </footer>
            </div>       
        </div>
    </div>  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/public/js/bootstrap.min.js"></script>
    <script>$(document).ready(function(){ $('[data-toggle="tooltip"]').tooltip(); });</script>
  </body>
</html>
