<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Clean Blog - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" />


  <!-- Custom fonts for this template -->
  <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free/css/all.min.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/familyLora.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/familyOpenSans.css'); ?>" />





<!-- Custom styles for this template -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/clean-blog.min.css'); ?>" />
  <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
  <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
  <script type="text/javascript">var site_url = "<?php echo site_url();?>";</script>

    <style>
        .disabled {
            pointer-events: none;
            cursor: default;
        }
    </style>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?=site_url('/')?>">Blog</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <?php if (!isset($name)) {?>
            <li class="nav-item">
              <a href="#" class="alogin" role="button" data-toggle="modal" data-form="login" data-target="#login-modal">Login</a>
            </li>
          <?php } else {?>
            <li class="nav-item">
              <a class="nav-link" href="<?=site_url('/')?>">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= route_to('postList') ?>">Post List</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?= route_to('postnew')?>">Create Post</a>
            </li>
            <li class="nav-item">
            <!-- <a class="nav-link" id="change_btn" href="#">Change Password</a> -->

              <a href="#" id="change_btn" class="alogin nav-link" role="button" data-toggle="modal" data-form="change" data-target="#login-modal">Change Password</a>
            </li>
            <?php if (isset($role) && $role === 'Admin') {?>
              <li class="nav-item">
              <a href="<?= route_to('users') ?>" class="nav-link acreg" >Check Register</a>
              </li>
            <?php } ?>
            <li class="nav-item">
              <a href="<?=site_url('Register/logout')?>" class="nav-link alogout">Logout</a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
<!-- BEGIN # MODAL LOGIN -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" align="center">
                <center><img class="img-circle" id="img_logo" src="<?php echo base_url('assets/img/logo.jpg'); ?>"></center>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </button>
            </div>
            
            <!-- Begin # DIV Form -->
            <div id="div-forms">
            
                <!-- Begin # Login Form -->
                <form id="login-form" action="<?=route_to('user') ?>">
                    <div class="modal-body">
                        <div id="div-login-msg">
                            <div id="icon-login-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-login-msg">Type your username and password.</span>
                        </div>
                        <input id="login_username" class="form-control" type="text" placeholder="Username" required>
                        <input id="login_password" class="form-control" type="password" placeholder="Password" required>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember me
                            </label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Login</button>
                        </div>
                        <div>
                            <button id="login_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                            <button id="login_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End # Login Form -->
                
                <!-- Begin | Change Password Form -->
                <form id="change-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-change-msg">
                            <div id="icon-change-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-change-msg">Type your passwords.</span>
                        </div>
                        <input id="change_id" class="form-control" type="hidden" value="<?=$userID?>">
                        <input id="change_npassword" class="form-control" type="password" placeholder="New Password" required>
                        <input id="change_cpassword" class="form-control" type="password" placeholder="Confirm Password" required>

                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                    </div>
                </form>
                <!-- End | Change Password Form -->

                <!-- Begin | Lost Password Form -->
                <form id="lost-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-lost-msg">
                            <div id="icon-lost-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-lost-msg">Type your e-mail.</span>
                        </div>
                        <input id="lost_email" class="form-control" type="text" placeholder="E-Mail" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
                        </div>
                        <div>
                            <button id="lost_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="lost_register_btn" type="button" class="btn btn-link">Register</button>
                        </div>
                    </div>
                </form>
                <!-- End | Lost Password Form -->
                
                <!-- Begin | Register Form -->
                <form id="register-form" style="display:none;">
                    <div class="modal-body">
                        <div id="div-register-msg">
                            <div id="icon-register-msg" class="glyphicon glyphicon-chevron-right"></div>
                            <span id="text-register-msg">Register an account.</span>
                        </div>
                        <input id="register_fullname" class="form-control" type="text" placeholder="Full Name" required>
                        <input id="register_age" class="form-control" type="text" placeholder="Age" required>
                        <input id="register_username" class="form-control" type="text" placeholder="Username" required>
                        <input id="register_email" class="form-control" type="text" placeholder="E-Mail" required>
                        <input id="register_password" class="form-control" type="password" placeholder="Password" required>
                    </div>
                    <div class="modal-footer">
                        <div>
                            <button type="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                        </div>
                        <div>
                            <button id="register_login_btn" type="button" class="btn btn-link">Log In</button>
                            <button id="register_lost_btn" type="button" class="btn btn-link">Lost Password?</button>
                        </div>
                    </div>
                </form>
                <!-- End | Register Form -->
                
            </div>
            <!-- End # DIV Form -->
            
        </div>
    </div>
</div>
<!-- END # MODAL LOGIN -->
  