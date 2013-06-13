<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'><?php echo $order_status_message; ?></h2>
<p><?php echo $order_response_details; ?></p>

<?php if(isset($order_status) && $order_status=='error'): ?>
<h2 class='well'>Shopping Cart</h2>
<p><strong>Cart Records:</strong><?php echo $this->mvr_cart->total_items(); ?></p>
<?php echo anchor(base_url('business/cart'),'View Cart',array('class' => 'button well-small')); ?>
<?php echo anchor(base_url('business/order/cart/checkout'),'Checkout',array('class' => 'button well-small')); ?>
<?php else: ?>
<?php $this->mvr_cart->destroy(); ?>
<?php echo anchor(base_url('business/order'),'Order More',array('class' => 'button')); ?>
<?php endif; ?>
