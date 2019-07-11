<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php $env = array( 'env' => env('APP_ENV'));?>

<title>Edutechapp-Dashboard</title>
<?php echo Html::style('/css/screen.css');; ?>

<?php echo Html::style('/css/font.css');; ?>

<?php echo Html::style('css/bootstrap.min.css');; ?>

<?php echo Html::style('/css/styles.css');; ?>

<?php echo Html::style('/css/common.css');; ?>

<?php echo $__env->yieldContent('header'); ?>
<script type="text/javascript">
	var environment = '<?php echo app()->environment();?>';
</script>
</head>
<body>	
<?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
  <?php echo $__env->yieldContent('content'); ?>
</div>
<input type="hidden" id="env" value=''></input>
<script type="text/javascript">
var env = '<?php echo $env['env'];//die();?>';
document.getElementById('env').value = env;
</script>
<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('footer'); ?>
</body>
</html>
