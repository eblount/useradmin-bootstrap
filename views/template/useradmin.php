<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
   <title><?php echo $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <style>
      body {
        padding-top: 60px;
      }
    </style>
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<?php foreach ($styles as $file => $type) echo HTML::style($file, array('media' => $type)), PHP_EOL ?>
<?php foreach ($scripts as $file) echo HTML::script($file), PHP_EOL ?>
  </head>
  <body>
    <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#"></a>
          <div class="nav-collapse">
            <ul class="nav">
             <?php
             $session = Session::instance();
             if (Auth::instance()->logged_in()){
                echo '<li>'.HTML::anchor('/', 'Home').'</li>';
				if(Auth::instance()->logged_in('admin'))
                	echo '<li>'.HTML::anchor('admin_user', 'User Management').'</li>';
                echo '<li>'.HTML::anchor('user/profile', 'My Profile').'</li>';
                echo '<li>'.HTML::anchor('user/logout', 'Log Out').'</li>';
             } else {
                //echo '<li>'.HTML::anchor('user/register', 'Register').'</li>';
                echo '<li>'.HTML::anchor('user/login', 'Log In').'</li>';
             }
             ?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div class="container">
    <?php
     // output messages
     if(Message::count() > 0) {
       echo '<div class="alert"><a class="close" data-dismiss="alert" href="#">×</a>';
       echo Message::output();
       echo '</div>';
     }
     echo $content ?>
    </div>
<?php echo $profile; ?>
  </body>
</html>
