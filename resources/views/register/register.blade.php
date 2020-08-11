<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Jund</b>Pak</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>

      <form action="/register-post" method="post">
      @csrf
        <div class="input-group mb-3">
          <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" placeholder="Full Name" name="name" value="{{old('name')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if($errors->has('name'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('name')}}</strong>
          </span>
          @endif
          
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control {{$errors->has('username') ? 'is-invalid' : ''}}" placeholder="Username" name="username" value="{{old('username')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if($errors->has('username'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('username')}}</strong>
          </span>
          @endif
          
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" placeholder="Email" name="email" value="{{old('email')}}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @if($errors->has('email'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('email')}}</strong>
          </span>
          @endif
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control  {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @if($errors->has('password'))
          <span class="invalid-feedback" role="alert">
            <strong>{{$errors->first('password')}}</strong>
          </span>
          @endif
        </div>
        <div class="row">
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/dist/js/adminlte.min.js"></script>
</body>
</html>