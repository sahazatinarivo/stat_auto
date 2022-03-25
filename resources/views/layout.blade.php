<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Stat Auto | Mask</title>
  <!-- Custom fonts for this template-->

  <!-- Custom styles for this template-->
  <link href="{{ asset('asset/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('asset/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('template/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
</head>
    <body id="page-top">
        <div class="row" id="block-page-front">
            @include('header')
        </div>

        <div id="body-projet-front">
            @include('content/stock_url')
            @yield('content')
        </div>

        <div class="alert alert-info">
            <div class="copyright text-center my-auto">
              <span>Copyright &copy; sahazatinarivo@gmail.com 2020</span>
            </div>
        </div>
    </body>
</html>

<script type="text/javascript" src="{{ asset('asset/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('asset/js/recup_mask.js') }}"></script>
