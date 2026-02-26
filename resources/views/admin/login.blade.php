<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>Login | K R Doshi</title>
  <!-- [Meta] -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
    content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
  <meta name="keywords"
    content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
  <meta name="author" content="codedthemes" />

 
  <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    id="main-font-link" />
  
  <link rel="stylesheet" href="assets/fonts/fontawesome.css" />
 
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="assets/css/style.css" id="main-style-link" />
  <link rel="stylesheet" href="assets/css/style-preset.css" />

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body>
  <!-- [ Pre-loader ] start -->
  <div class="loader-bg">
    <div class="loader-track">
      <div class="loader-fill"></div>
    </div>
  </div>
  <!-- [ Pre-loader ] End -->

  <div class="auth-main">
    <div class="auth-wrapper v3">
      <div class="auth-form">
        <div class="card my-5">
          <div class="card-body">
            <div class="row">
              <div class="d-flex justify-content-center">
                <div class="auth-header">
                  <h2 class="text-secondary mt-5"><b>Hi, Welcome Back</b></h2>
                </div>
              </div>
            </div>
             @error('name')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
            <form action="{{ route('login.post') }}" method="post" class="mt-4">
              @csrf
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" />
                <label for="floatingInput">Enter Email</label>
                @error('email')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" />
                <label for="floatingInput1">Password</label>
                @error('password')
                <div class="text-danger">
                    {{$message}}
                </div>
                @enderror
              </div>
              <div class="d-grid mt-4">
                <button type="submit" class="btn btn-secondary">Log In</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
  <!-- Required Js -->
  <script src="assets/js/plugins/popper.min.js"></script>
  <script src="assets/js/plugins/simplebar.min.js"></script>
  <script src="assets/js/plugins/bootstrap.min.js"></script>
  <script src="{{ asset('assets/js/fonts/custom-font.js') }}"></script>
  <script src="assets/js/script.js"></script>
  <script src="assets/js/theme.js"></script>
 

</body>
<!-- [Body] end -->

</html>