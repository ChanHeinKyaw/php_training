<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>@yield('title')</title>

  <!-- Fonts -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet'
    type='text/css'>
  <link href="{{ asset('font/googleapics.css') }}" rel='stylesheet' type='text/css'>

  <!-- Styles -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
</head>

<style>
  body {
    margin-top: 20px;
    font-size: 14px;
  }

</style>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        @yield('content')
      </div>
    </div>
  </div>
  <!-- JavaScripts -->
  <script src="{{ asset('js/jquery.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>

</html>
