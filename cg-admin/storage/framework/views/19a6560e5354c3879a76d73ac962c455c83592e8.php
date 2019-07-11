<script>
var Siteurl = "<?php echo url('/');?>";
</script>
<?php 
$data = Session::get('data');
$url = url('/');

if(!isset($data)){
	  if(Session::get('username') == ""){
       	header('Location:'.$url.'/login');
       die();
    }
  }else
  {
	$id = $data->id;  
  }
?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo $url;?>/home" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><img src="<?php echo url('/')?>/images/logo-white.png"></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="<?php echo url('/')?>/images/logo-white.png"><strong>Classgenie</strong></span>
    </a>
   
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
         
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo url('/')?>/dist/img/images.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo Session::get('username')?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo url('/')?>/dist/img/images.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo Session::get('username')?>
                 
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="<?php echo $url;?>/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
         
        </ul>
      </div>
    </nav>
  </header>