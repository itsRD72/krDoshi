<!doctype html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>SignUp | Berry Dashboard Template</title>
  <!-- [Meta] -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description"
    content="Berry is trending dashboard template made using Bootstrap 5 design framework. Berry is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies." />
  <meta name="keywords"
    content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard" />
  <meta name="author" content="codedthemes" />

  <!-- [Favicon] icon -->
  <link rel="icon" href="../assets/images/favicon.svg" type="image/x-icon" />
  <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    id="main-font-link" />
  <!-- [phosphor Icons] https://phosphoricons.com/ -->
  <link rel="stylesheet" href="../assets/fonts/phosphor/duotone/style.css" />
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="../assets/fonts/tabler-icons.min.css" />
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="../assets/fonts/feather.css" />
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="../assets/fonts/fontawesome.css" />
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="../assets/fonts/material.css" />
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="../assets/css/style.css" id="main-style-link" />
  <link rel="stylesheet" href="../assets/css/style-preset.css" />

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
        <div class="card mt-5">
          <div class="card-body">
            <div class="row">
              <div class="d-flex justify-content-center">
                <div class="auth-header">
                  <h2 class="text-secondary mt-5"><b>Sign up</b></h2>
                  <p class="f-16 mt-2">Enter your credentials to continue</p>
                </div>
              </div>
            </div>
            @if(session('success'))
              <div class="alert alert-success">
                {{ session('success') }}
              </div>
            @endif

            <form action="{{ route('addStaff') }}" method="post" class="mt-4">
              @csrf
              <div class="row">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="name" id="staff-name" placeholder="Staff Name" />
                  <label for="staff-name">Staff Name</label>
                  @error('name')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" name="role" id="staff-role" placeholder="Staff Role" />
                  <label for="staff-role">Staff Role</label>
                  @error('role')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
                  <label for="password">Password</label>
                  @error('password')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="confirmPassword" name="password_confirmation"
                    placeholder="confirm Password" />
                  <label for="confirmPassword">confirm Password</label>
                  @error('confirmpassword')
                    <div class="text-danger">
                      {{$message}}
                    </div>
                  @enderror
                </div>
                <div class="d-grid mt-4">
                  <button type="submit" class="btn btn-secondary p-2">Sign Up</button>
                </div>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- [ Main Content ] end -->
    <!-- Required Js -->
    <script src="../assets/js/plugins/popper.min.js"></script>
    <script src="../assets/js/plugins/simplebar.min.js"></script>
    <script src="../assets/js/plugins/bootstrap.min.js"></script>
    <script src="../assets/js/icon/custom-font.js"></script>
    <script src="../assets/js/script.js"></script>
    <script src="../assets/js/theme.js"></script>
    <script src="../assets/js/plugins/feather.min.js"></script>


    <script>
      layout_change('light');
    </script>

    <script>
      font_change('Roboto');
    </script>

    <script>
      change_box_container('false');
    </script>

    <script>
      layout_caption_change('true');
    </script>

    <script>
      layout_rtl_change('false');
    </script>

    <script>
      preset_change('preset-1');
    </script>


</body>
<!-- [Body] end -->

</html>