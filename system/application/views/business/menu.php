<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<ul id="main_navigation" class='nav nav-pills nav-header'>
    <li class="<?php echo $active=='home'?'active':''; ?>"><a href="<?php echo base_url('business'); ?>">Home</a></li>
    <li class="<?php echo $active=='order'?'active':''; ?>"><a href="<?php echo base_url('business/order'); ?>">Order Driving Records</a></li>
    <li class="<?php echo $active=='employees'?'active':''; ?>"><a href="<?php echo base_url('business/employees'); ?>">Employees</a></li>
    <li class="<?php echo $active=='history'?'active':''; ?>"><a href="<?php echo base_url('business/history'); ?>">Order History</a></li>
    <li class="<?php echo $active=='account'?'active':''; ?>"><a href="<?php echo base_url('business/account'); ?>">Edit Account</a></li>
    <li class="<?php echo $active=='cart'?'active':''; ?>"><a href="<?php echo base_url('business/cart'); ?>">Shopping Cart</a></li>
    <li class="<?php echo $active=='support'?'active':''; ?>"><a href="<?php echo base_url('business/support'); ?>">Support</a></li>
</ul>
