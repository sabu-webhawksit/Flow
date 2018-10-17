<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>

    <!-- Bootstrap -->
    <link href="/public/css/bootstrap.min.css" rel="stylesheet"  type="text/css">
    <link href="http://code.jquery.com/ui/1.10.0/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>
    <link href="/public/css/bootstrap-select.min.css" rel="stylesheet"  type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/public/css/datepicker.css" rel="stylesheet" type="text/css" />
    <link href="/public/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
    <link href="/public/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/public/css/tokenize.css" rel="stylesheet" type="text/css" />
    <link href="/public/css/icon_mon.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet"  type="text/css" />
    <link href="/public/css/custom.css" rel="stylesheet"  type="text/css" />
    <link href="/public/css/style.css" rel="stylesheet"  type="text/css" />
    

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="logo">
        <div class="col-xs-11 col-xs-offset-1">
          <img src="/public/images/logo.png" alt="logo">
         </div>
    </header>
    <main>
        <div class="row no-margin-left-right">
          <div class="col-sm-1 no-padding-left-right">
              <ul class="menubar">
                 <li class="menu_item"><a href="{{url('sales-lead')}}"><i class="icon-icon-1"></i></a></li>
                 @can('interview')
                 <li class="menu_item"><a href="{{url('interview')}}"><i class="icon-icon-3"></i></a></li>
                 @endcan
                 @can('team-interview')
                 <li class="menu_item"><a href="{{url('team-interview')}}"><i class="icon-icon-4"></i></a></li> 
                 @endcan
                 @can('work-station-list')
                 <li class="menu_item"><a href="{{url('work-station-list')}}"><i class="icon-icon-6"></i></a></li>
                 @endcan
                 @can('team-interview')
                 <li class="menu_item"><a href="{{url('new-team-viewer')}}"><i class="fa fa-users"></i></a></li>
                 @endcan
                 @can('service-pack')
                 <li class="menu_item"><a href="{{url('service-pack')}}"><i class="icon-icon-7"></i></a></li>
                 @endcan
                 @can('others-meeting')
                 <li class="menu_item"><a href="{{url('others-meeting')}}"><i class="glyphicon glyphicon-envelope"></i></a></li>
                 @endcan
                 @can('roles')
                 <li class="menu_item"><a href="{{url('roles')}}"><i class="fa fa-lock" aria-hidden="true"></i></a></li>
                 @endcan
                 @can('users')
                 <li class="menu_item"><a href="{{action('UserController@index')}}"><i class="fa fa-user-plus" aria-hidden="true"></i></a></li>
                 @endcan
                 @can('access')
                 <li class="menu_item"><a href="{{action('AuthController@getEditAccessRequest')}}"><i class="fa fa-user-secret" aria-hidden="true"></i></a></li>
                 @endcan
                 <li class="menu_item"><a href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
              </ul>
          </div>
          <div class="col-sm-11 no-padding-left-right">
            <div class="row no-margin-left-right padding-top-main">
              @yield('main_content')
            </div>
            </div>
          </div>
          </div>
        </div>
    </main>
    <footer class="footer text-center navbar-bottom">
      <img src="{{url('public/images/hawkslogo.png')}}" class="footer-logo">
      <h5 class="foooter-heading">All Right reserved WebHwks IT &copy; 2015 </h5>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="/public/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
    <script type="text/javascript" src="/public/js/custom.js"></script>
    <script type="text/javascript" src="/public/js/editajax.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="/public/js/bootstrap-timepicker.js"></script>
    <script type="text/javascript" src="/public/js/tokenize.js"></script>
    <script type="text/javascript" src="/public/js/select2.min.js"></script>
    <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.9/jquery-ui.min.js"></script>-->

    <script>
      @yield('footer_script')
    </script>
  </body>
  <meta name="author" content="WebHawks IT- Core Team. Contact- Team Manager - Md Ashiqul Islam; Email: ashique19@gmail.com; Phone: +880-178-563-6359">
</html>