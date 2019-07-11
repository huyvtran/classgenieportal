<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Classgenie</title>
    <link rel="icon" type="image/png" href="images/favicon.ico">
     <!-- <?php echo Html::style('/css/font-awesome.min.css');; ?>-->
    <?php echo Html::style('/css/screen.css');; ?>

    <?php echo Html::style('/css/font.css');; ?>

    <?php echo Html::style('/css/bootstrap.min.css');; ?>

    <?php /* <link href="<?php echo e(elixir('css/app.css')); ?>" rel="stylesheet"> */ ?>
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
    

    <?php echo $__env->yieldContent('content'); ?>
    <!-- JavaScripts -->
    <?php echo Html::script('/js/jquery.min.js');; ?>

    <?php echo Html::script('/js/bootstrap.min.js');; ?>

    <?php echo Html::script('/js/jquery.validate.min.js');; ?>

    <?php echo Html::script('/js/validation.js');; ?>

    <?php /* <script src="<?php echo e(elixir('js/app.js')); ?>"></script> */ ?>
</body>
</html>
