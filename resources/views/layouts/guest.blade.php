<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>{{ config('app.name', 'Laravel') }}</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('')}}dashboard_assets/assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('')}}dashboard_assets/assets/css/style.css">
  <link rel="stylesheet" href="{{asset('')}}dashboard_assets/assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="{{asset('')}}dashboard_assets/assets/css/custom.css">
  <link rel='shortcut icon' type='image/x-icon' href="{{asset('')}}dashboard_assets/assets/img/favicon.ico" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>
</head>

<body>
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
            {{ $slot }}           
        </div>
      </div>
    </section>
  </div>
  <!-- General JS Scripts -->
  <script src="{{asset('')}}dashboard_assets/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="{{asset('')}}dashboard_assets/assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
  <script src="{{asset('')}}dashboard_assets/assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="{{asset('')}}dashboard_assets/assets/js/page/auth-register.js"></script>
  <!-- Template JS File -->
  <script src="{{asset('')}}dashboard_assets/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="{{asset('')}}dashboard_assets/assets/js/custom.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
</body>

</html>