<!doctype html>
<html lang="en">

<head>
  <title>Dashboard</title>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- CSS -->
  <!-- [Favicon] icon -->
  <link rel="icon" href="{{ asset('assets/images/favicon.svg')}}" type="image/x-icon" />
  <!-- [Google Font] Family -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
    id="main-font-link" />
  <!-- [phosphor Icons] https://phosphoricons.com/ -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/phosphor/duotone/style.css')}}" />
  <!-- [Tabler Icons] https://tablericons.com -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/tabler/tabler-icons.min.css')}}" />
  <!-- [Feather Icons] https://feathericons.com -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/feather.css')}}" />
  <!-- [Font Awesome Icons] https://fontawesome.com/icons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css')}}" />
  <!-- [Material Icons] https://fonts.google.com/icons -->
  <link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" />
  <!-- [Template CSS Files] -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}" id="main-style-link" />
  <link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" />

</head>

<body>

  @include('includes.sidebar')
  @include('includes.header')

  <div class="pc-container">
    <div class="pc-content">
      @yield('content')
    </div>
  </div>

  @include('includes.footer')

  <!-- JS -->
  <script src={{ asset('assets/js/plugins/popper.min.js') }}></script>
  <script src={{ asset('assets/js/plugins/simplebar.min.js') }}></script>
  <script src={{ asset('assets/js/plugins/bootstrap.min.js') }}></script>
  <script src={{ asset('assets/js/fonts/custom-font.js') }}></script>
  <script src={{ asset('assets/js/script.js') }}></script>
  <script src={{ asset('assets/js/theme.js') }}></script>
  <script src={{ asset('assets/js/plugins/feather.min.js') }}></script>
  <script>
    feather.replace();
  </script>
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

  @yield('scripts')

</body>

</html>