<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $title; ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
        <style>
            body {
                padding-top: 10px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-responsive.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css'); ?>">

        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
   </head>
 
   <body>
       <div class="container">
       <div class="wrapper row">
           <div class="row">
            <div class="span12 well-small">
                <div class="row">
                    <div class="span9">
                        <img src="<?php echo base_url('assets/img/logo.png'); ?>" />
                        <h3>Business Type Account</h3>
                    </div>
                </div>
            </div>
           </div>
           <div class="row">
               <div class="span12">
                   <?php echo form_open(base_url('business/signin'),array('class' => 'well form-horizontal','id' => 'login_form')); ?>
                   <fieldset>
                       <legend>Login</legend>
                       <?php if($this->session->userdata('login_message')): ?>
                        <div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $this->session->userdata('login_message'); ?></div>
                       <?php endif; ?>
                        <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
                       <div class='control-group'>
                        <label class='control-label' for='login'>Account Name or Email:</label>
                            <div class='controls'>
                                <input type="text" name="login" id='login'/>
                            </div>
                       </div>
                        <div class='control-group'>
                            <label class='control-label' for='pass'>Password:</label>
                            <div class='controls'>
                                <input type="password" name="pass" id='pass'/>
                            </div>
                        </div>
                       <div class='form-actions'>
                           <button type="submit" class="btn btn-primary">Login</button> <?php echo anchor(base_url('business/signup'),'Click here to signup',array('class' => 'text-info')); ?>
                       </div>
                   </fieldset>
                       <?php echo form_close(); ?>
               </div>
           </div>
      </div>
       </div><!--end main-container-->
     <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="<?php echo base_url('assets/js/vendor/bootstrap.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/js/plugins.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>    
   </body>
    
</html>
