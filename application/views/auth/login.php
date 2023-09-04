<!DOCTYPE html>
<html>
  <head>
    <title>Contract Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="<?php echo base_url()?>css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
    <div class="header">
       <div class="container">
          <div class="row">
             <div class="col-md-12">
                <!-- Logo -->
                <div class="logo">
                   <h1><a href="#"><img height="50px" src="<?php echo base_url();?>images/logo.png" />&nbsp;&nbsp;&nbsp;&nbsp;CONTRACTS MANAGEMENT SYSTEM</a></h1>
                </div>
             </div>
          </div>
       </div>
  </div>


<div class="page-content container">
    <div class="row">
      <div class="col-md-4 col-md-offset-4">
        <div class="login-wrapper">
              <div class="box">
                  <div class="content-wrap">
                      <h6><h1><?php echo lang('login_heading');?></h1>
                      <p><?php echo lang('login_subheading');?></p></h6>
                      <div id="infoMessage"><?php echo $message;?></div>
                    <!--  <div class="social">
                              <a class="face_login" href="#">
                                  <span class="face_icon">
                                      <img src="images/facebook.png" alt="fb">
                                  </span>
                                  <span class="text">Sign in with Facebook</span>
                              </a>
                              <div class="division">
                                  <hr class="left">
                                  <span>or</span>
                                  <hr class="right">
                              </div>
                          </div>-->
                      <?php echo form_open("auth/login");?>

                      <?php /*echo lang('login_identity_label', 'identity');*/?>

                      <?php 
                        $data = array(
                          'name'          => 'identity',
                          'id'            => 'identity',
                          'value'         => '',
                          'maxlength'     => '',
                          'size'          => '',
                          'style'         => '',
                          'placeholder'   => 'E-mail address',
                          'class'         => 'form-control'
                        );

                      echo form_input($data);?>

                      <?php /*echo lang('login_password_label', 'password');*/?>
                      <?php

                          $data = array(
                          'name'          => 'password',
                          'id'            => 'password',
                          'value'         => '',
                          'maxlength'     => '',
                          'size'          => '',
                          'style'         => '',
                          'placeholder'   => 'Password',
                          'class'         => 'form-control'
                        );
                             echo form_password($data);?>

                      <?php echo lang('login_remember_label', 'remember');?>
                      <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?><br/>

                      <?php echo form_submit('submit', lang('login_submit_btn'),array('class' =>'btn btn-primary signup'  ));?>
                      <?php echo form_close();?>

                      

                     <!-- <input class="form-control" type="text" placeholder="E-mail address">
                      <input class="form-control" type="password" placeholder="Password">
                      <div class="action">
                          <a class="btn btn-primary signup" href="index.html">Login</a>
                      </div> -->               
                  </div>
              </div>

              <div class="already">
                  <p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>
                  
              </div>
          </div>
      </div>
    </div>
  </div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url()?>bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url()?>js/custom.js"></script>
  </body>
</html>