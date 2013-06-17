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

        <link rel="stylesheet" href="<?php echo base_url('assets/business/css/bootstrap.min.css');?>">
        <style>
            body {
                padding-top: 10px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="<?php echo base_url('assets/business/css/bootstrap-responsive.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/business/css/main.css'); ?>">

        <script src="<?php echo base_url('assets/business/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js'); ?>"></script>
   </head>
 
   <body>
       <div class="container">
       <div class="wrapper row">
           <div class="row">
            <div class="span12 well-small">
                <div class="row">
                    <div class="span9">
                        <img src="<?php echo base_url('assets/business/img/logo.png'); ?>" />
                        <h3>Signup Business Type Account</h3>
                    </div>
                </div>
            </div>
           </div>
           <div class="row">
               <div class="span12">
                  <?php echo $body; ?>
               </div>
           </div>
      </div>
       </div><!--end main-container-->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/business/js/vendor/jquery-1.9.1.min.js'); ?>"><\/script>')</script>

        <script src="<?php echo base_url('assets/business/js/vendor/bootstrap.min.js'); ?>"></script>

        <script src="<?php echo base_url('assets/business/js/plugins.js'); ?>"></script>
        <script src="<?php echo base_url('assets/business/js/main.js'); ?>"></script>

    <script>
        var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
        (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
        g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
        s.parentNode.insertBefore(g,s)}(document,'script'));
    </script>    
   </body>
    
</html>
