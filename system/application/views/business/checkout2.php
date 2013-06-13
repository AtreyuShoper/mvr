<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Secure Checkout - Step 2 of 2 </h2>
<h4>Please verify your information before placing your order.</h4>
<div class='credit_verify well'>
    <table class='table-condensed'>
        <tr>
            <td>Card Holder</td><td>:</td><td class='value'><?php echo $cc_info['card_holder']; ?></td>
        </tr>
        <tr>
            <td><?php echo strtoupper($cc_info['card_type']); ?></td><td>:</td><td class='value'><?php echo $cc_info['card_number']; ?></td>
        </tr>
        <tr>
            <td>CVV Code</td><td>:</td><td class='value'><?php echo $cc_info['cvv']; ?></td>
        </tr>
        <tr>
            <td>Expiration Date</td><td>:</td><td class='value'><?php echo $cc_info['cc_exp_date']; ?></td>
        </tr>
    </table>
    <?php echo form_open(base_url('business/order/cart/checkout'), array('class' => 'well')); ?>
    <?php echo form_hidden('checkout','2'); ?>
    <?php echo form_submit('submit','Place Order'); ?>
    <?php echo form_close(); ?>
</div>
<h2 class='well'>Order Summary</h2>
<?php echo $cart; ?>