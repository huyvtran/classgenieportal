<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $env = array( 'env' => env('APP_ENV'));?>

<title>Classgenie</title>
<link rel="icon" type="image/png" href="images/favicon.ico">
<?php echo Html::style('bootstrap/css/bootstrap.min.css');; ?>

<?php echo Html::style('dist/css/font-awesome.min.css');; ?>

<?php echo Html::style('dist/css/AdminLTE.min.css');; ?>

<?php echo Html::style('dist/css/skins/_all-skins.min.css');; ?>

<?php echo Html::style('dist/css/comman.css');; ?>


<?php echo $__env->yieldContent('header'); ?>
<script type="text/javascript">
	var environment = '<?php echo app()->environment();?>';
</script>
</head>
<body class="skin-blue sidebar-mini">	
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('home', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="content-wrapper">
  <?php echo $__env->yieldContent('content'); ?>
</div>
<input type="hidden" id="env" value=''></input>
<script type="text/javascript">
var env = '<?php echo $env['env']; ?>';
document.getElementById('env').value = env;
</script>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
