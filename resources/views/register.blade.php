<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; Now</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{url('assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{url('assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{url('assets/modules/jquery-selectric/selectric.css')}}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
  <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
  <style type="text/css">
    .btn-primary,.bg-primary,.navbar-bg{
      background: #024270 !important;
    }
  </style>
<!-- Start GA -->
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
<img src="{{url('assets/logo/logo-edduby1.png')}}" alt="logo" width="150" class="">


            </div>

            <div class="card card-primary">
              <div class="card-header">
                  <h3 class="text-center mx-auto">Register Your Account </h3><br>

            </div>

              <div class="card-body">
              <form method="POST" action="{{route('register.user')}}" >
                @csrf
                  <div class="row">

                    <div class="form-group col-12">
                      <label for="name">name</label>
                      <input id="name" type="text" class="form-control  @error('name') is-invalid @enderror" name="name" autofocus>
                      @error('name')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror

                    </div>
                  </div>



                  <div class="row mt-2">
                    <div class="form-group col-6">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control  @error('email') is-invalid @enderror" name="email">
                     @error('email')
                      <div class="invalid-feedback">{{$message}}</div>
                      @enderror
                  </div>
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Password</label>

                      <div class="input-group">
                      <input type="password" class="form-control" id="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div class="input-group-append">
                        <span class="input-group-text">
                          <i class="fa fa-eye" id="togglePassword"></i>
                        </span>
                      </div>
                    </div>
                       @error('password')
                      <div class="invalid-feedback text-danger">{{$message}}</div>
                      @enderror
                    </div>

                  </div>

                  </div>


                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; 2023
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <x-footer/>
  <script>
  $(document).ready(function(){
    $('#togglePassword').on('click', function(){
      const passwordField = $('#password');
      const passwordFieldType = passwordField.attr('type');
      if(passwordFieldType === 'password'){
        passwordField.attr('type', 'text');
      } else {
        passwordField.attr('type', 'password');
      }
    });
  });

 
</script>
</body>
</html>
