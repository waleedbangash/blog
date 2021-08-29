<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>AdminLTE 2 | Registration Page</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{asset('public/asset/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{asset('/public/asset/css/AdminLTE.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{{asset('public/asset/plugins/iCheck/square/blue.css')}}" rel="stylesheet" type="text/css" />
          <style>
               .error
               {
                   color: red;
               }
          </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="register-page">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Punjab</b>School</a>
      </div>
          {{session('msg')}}
      <div class="register-box-body">
        <p class="login-box-msg">Register a new membership</p>
        <form action="{{url('user/submit')}}" method="post">
            @csrf
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="username" placeholder="Full name"/>
                 <span class="error">@error('username')
                     {{$message}}
                 @enderror</span>
            <span class="glyphicon glyphicon-user form-control-feedback"></span>

          </div>
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="useremail" placeholder="Email"/>
            <span class="error">@error('useremail')
                {{$message}}
            @enderror</span>
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="userpassword" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            <span class="error">@error('userpassword')
                {{$message}}
            @enderror</span>
        </div>
          <div class="row">
            <div class="col-xs-8">

            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">SignUp</button>

            </div><!-- /.col -->
          </div>
        </form>



        <a href="{{url('user/login')}}" class="text-center">signIn</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.3 -->
    <script src="{{asset('public/asset/plugins/jQuery/jQuery-2.1.3.min.js')}}"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{{asset('public/asset/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{{asset('public/asset/plugins/iCheck/icheck.min.js')}}" type="text/javascript"></script>

  </body>
</html>
