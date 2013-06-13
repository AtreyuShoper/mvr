<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Order Driving Records</h2>
<p>At instant-mvr.com, we make it easy for you to obtain information on prospective job candidates and current employees. Driving records can tell you a lot about a person, including if they're trustworthy and responsible. Don't put your business in the hands of an unsafe driver -- place an order for a driving record today.</p>
<p>To use this simple form, simple input the driver's information as it appears on their driver's license. Once you've detailed this information, simply click the "Submit" button. This person's driving record will be put into your shopping cart.</p>
<p>After ordering the driving record, you will be sent a employee signature form, which needs to be signed in order to give you permission to access the employee's driving record. Learn more by visiting your Order History tab.</p>
<h2 class='well'>Order Driving Record Form</h2>
<?php echo form_open(base_url('business/order/cart/insert'), array('class' => 'well', 'id' => 'business_order_form')); ?>
<label>Driver's First Name:</label>
<input type="text" name="driver_first" class="text">&nbsp;<?php echo form_error('driver_first'); ?><br/>
<label>Middle Name:</label>
<input type="text" name="driver_middle" class="text">&nbsp;<?php echo form_error('driver_middle'); ?><br/>
<label>Last Name:</label>
<input type="text" name="driver_last" class="text">&nbsp;<?php echo form_error('driver_last'); ?><br/>
<label>State:</label>
    <?php echo form_dropdown('driver_state',$this->model_state->getDropDown(),''); ?>
    <?php echo form_error('driver_state'); ?><br/>
<label>License no.:</label>
<input type="text" name="driver_license_no" class="text">&nbsp;<?php echo form_error('driver_license_no'); ?><br/>
<label>Date of Birth:</label>
<input type="text" name="driver_dob" class="text">&nbsp;(01/28/1974)&nbsp;<?php echo form_error('driver_dob'); ?><br/>
<hr/>
<?php echo form_submit('submit','Submit'); ?>
<?php echo form_close(); ?>
<h2 class='well'>Shopping Cart</h2>
<?php echo $cart; ?>
