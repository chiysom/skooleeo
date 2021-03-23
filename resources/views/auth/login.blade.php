
<html lang="en">
  <!-- Mirrored from dashkit.goodthemes.co/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Jun 2020 16:28:34 GMT --><!-- Added by HTTrack -->
  <head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <!-- /Added by HTTrack -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Libs CSS -->
    <link rel="stylesheet" href="assets/fonts/feather/feather.css" />
    <link rel="stylesheet" href="assets/libs/flatpickr/dist/flatpickr.min.css" />
    <link rel="stylesheet" href="assets/libs/quill/dist/quill.core.css" />
    <link rel="stylesheet" href="assets/libs/highlightjs/styles/vs2015.css" />
    <!-- Theme CSS -->
    <link rel="stylesheet" href="assets/css/theme.min.css" id="stylesheetLight" />
    <link rel="stylesheet" href="assets/css/theme-dark.min.css" id="stylesheetDark" disabled="" />
    <!-- Title -->
    <title>Login</title>
  </head>
  <body class="d-flex align-items-center bg-auth border-top border-top-2 border-primary" style="display: block;">
    <!-- CONTENT
    ================================================== -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-5 col-xl-4 my-5">
          <!-- Heading -->
          <h1 class="display-4 text-center mb-3">
            Sign in
          </h1>
          <!-- Form -->
          <form method="POST" action="{{ route('login') }}">
            @csrf
            <!-- Email address -->
            <div class="form-group">
              <!-- Label -->
              <label>Email Address</label>
              <!-- Input -->
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="admin@admin.com" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- Password -->
            <div class="form-group">
              <div class="row">
                <div class="col">
                  <!-- Label -->
                  <label>Password</label>
                </div>
              </div>
              <!-- / .row -->
              <!-- Input group -->
              <div class="input-group input-group-merge">
                <!-- Input -->
                <input id="password" type="password" class="form-control form-control-appended @error('password') is-invalid @enderror" placeholder="password" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fe fe-eye"></i>
                  </span>
                </div>
              </div>
            </div>
            <!-- Submit -->
            <button type="submit" class="btn btn-lg btn-block btn-primary mb-3">
                {{ __('Login') }}
            </button>
          </form>
        </div>
      </div>
      <!-- / .row -->
    </div>
    <!-- / .container -->

    <!-- JAVASCRIPT
    ================================================== -->
    <!-- Libs JS -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/%40shopify/draggable/lib/es5/draggable.bundle.legacy.js"></script>
    <script src="assets/libs/autosize/dist/autosize.min.js"></script>
    <script src="assets/libs/chart.js/dist/Chart.min.js"></script>
    <script src="assets/libs/dropzone/dist/min/dropzone.min.js"></script>
    <script src="assets/libs/flatpickr/dist/flatpickr.min.js"></script>
    <script src="assets/libs/highlightjs/highlight.pack.min.js"></script>
    <script src="assets/libs/jquery-mask-plugin/dist/jquery.mask.min.js"></script>
    <script src="assets/libs/list.js/dist/list.min.js"></script>
    <script src="assets/libs/quill/dist/quill.min.js"></script>
    <script src="assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="assets/libs/chart.js/Chart.extension.js"></script>

    <!-- Map -->
    <script src="../api.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.js"></script>

    <!-- Theme JS -->
    <script src="assets/js/theme.min.js"></script>
    <script src="assets/js/dashkit.min.js"></script>
  </body>
</html>
