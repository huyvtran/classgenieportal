<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $env = array( 'env' => env('APP_ENV'));?>

<title>Classgenie</title>
<link rel="icon" type="image/png" href="images/favicon.ico">
{!!Html::style('bootstrap/css/bootstrap.min.css');!!}
{!!Html::style('dist/css/font-awesome.min.css');!!}
{!!Html::style('dist/css/AdminLTE.min.css');!!}
{!!Html::style('dist/css/skins/_all-skins.min.css');!!}
{!!Html::style('dist/css/comman.css');!!}

@yield('header')
<script type="text/javascript">
	var environment = '<?php echo app()->environment();?>';
</script>
</head>
<body class="skin-blue sidebar-mini">	
@include('layouts.header')
@include('layouts.sidebar')
@include('home')
<div class="content-wrapper">
  @yield('content')
</div>
<input type="hidden" id="env" value=''></input>
<script type="text/javascript">
var env = '<?php echo $env['env']; ?>';
document.getElementById('env').value = env;
</script>
@include('layouts.footer')
@yield('footer')
</body>
</html>
