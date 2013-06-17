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
                        <h3>Business Type Account</h3>
                    </div>
                    <div class="span3">
                            <strong class="text-info">Shopping Cart</strong><br/>
                            <?php echo anchor(base_url('business/cart'),'View Cart',array('class' =>'text-left')); ?> | <?php echo count($this->mvr_cart->contents())>0?anchor(base_url('business/cart/checkout'),'Checkout',array('class' =>'text-right')):'Checkout'; ?><br/>
                            <?php echo anchor(base_url('business/logout'),'Logout',array('class' => 'text-info')); ?><br/>
                            <span class="text-info alert-info">Record(s) in cart: <?php echo count($this->mvr_cart->contents()); ?></span>
                    </div>
                </div>
            </div>
           </div>
           <div class="row">
            <div class="span12">
                <?php echo $menu; ?>
            </div>
           </div>
           <div class="row">
            <div class="left-container well span3">
                <h2 class='well'>Account Information</h2>
              <?php $account_info = $account_info[0];  ?>
                <table id="account_information" class='well'>
                    <tr>
                        <td>Welcome</td><td>:</td><td><?php echo $account_info->first_name.' '.$account_info->last_name; ?></td>
                    </tr>
                    <tr>
                        <td>Account no.</td><td>:</td><td><?php echo $account_info->id; ?></td>
                    </tr>
                    <tr>
                        <td>Business Account</td><td>:</td><td><?php echo $account_info->account_name; ?></td>
                    </tr>
                    <tr>
                        <td>Business Name</td><td>:</td><td><?php echo $account_info->business_name; ?></td>
                    </tr>
                    <tr>
                        <td>Business Type</td><td>:</td><td><?php echo $account_info->business_type; ?></td>
                    </tr>
                    <tr>
                        <td>Contact</td><td>:</td><td><?php echo $account_info->first_name.' '.$account_info->last_name; ?></td>
                    </tr>
                    <tr>
                        <td>Address</td><td>:</td><td><?php echo $account_info->address1.', '.$account_info->address2.' '.$account_info->city.', '.$account_info->state.' '.$account_info->zip_code; ?></td>
                    </tr>
                    <tr>
                        <td>Tel no.</td><td>:</td><td><?php echo $account_info->phone; ?></td>
                    </tr>
                    <tr>
                        <td>Email</td><td>:</td><td><?php echo $account_info->email; ?></td>
                    </tr>
                    <tr>
                        <td>Delivery Type</td><td>:</td><td><?php echo $account_info->delivery_method; ?></td>
                    </tr>
                </table>
            </div>
            <div class="right-container well span8">
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
