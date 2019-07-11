<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classgenie</title>
    <link rel="icon" type="image/png" href="images/favicon.ico">
     <!-- {!!Html::style('/css/font-awesome.min.css');!!}-->
    {!!Html::style('/css/screen.css');!!}
    {!!Html::style('/css/font.css');!!}
    {!!Html::style('/css/bootstrap.min.css');!!}
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style type="text/css">
         #loginForm label.error {
            margin-left: 10px;
            width: auto;
            display: inline;
            font-weight: 100;
        }  
    </style>
</head>
<body id="app-layout" class="login_back color_bg wrapper">
    

    @yield('content')
    <!-- JavaScripts -->
    {!!Html::script('/js/jquery.min.js');!!}
    {!!Html::script('/js/bootstrap.min.js');!!}
    {!!Html::script('/js/jquery.validate.min.js');!!}
    {!!Html::script('/js/validation.js');!!}
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
