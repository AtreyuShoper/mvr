<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Edit Cart Form</h2>
<?php echo form_open(base_url('business/order/cart/insert'), array('class' => 'well', 'id' => 'business_order_form')); ?>
<?php echo form_hidden('rowid', $cart_edit['rowid']); ?>
<label>Driver's First Name:</label>
<input type="text" name="driver_first" class="text" value="<?php echo $cart_edit['first_name']; ?>">&nbsp;<?php echo form_error('driver_first'); ?><br/>
<label>Middle Name:</label>
<input type="text" name="driver_middle" class="text" value="<?php echo $cart_edit['middle_name']; ?>">&nbsp;<?php echo form_error('driver_middle'); ?><br/>
<label>Last Name:</label>
<input type="text" name="driver_last" class="text" value="<?php echo $cart_edit['last_name']; ?>">&nbsp;<?php echo form_error('driver_last'); ?><br/>
<label>State:</label>
    <?php echo form_dropdown('driver_state',$this->model_state->getDropDown(),$cart_edit['state']); ?>
    <?php echo form_error('driver_state'); ?><br/>
<label>License no.:</label>
<input type="text" name="driver_license_no" class="text" value="<?php echo $cart_edit['license_no']; ?>">&nbsp;<?php echo form_error('driver_license_no'); ?><br/>
<label>Date of Birth:</label>
<input type="text" name="driver_dob" class="text" value="<?php echo $cart_edit['date_of_birth']; ?>">&nbsp;(01/28/1974)&nbsp;<?php echo form_error('driver_dob'); ?><br/>
<hr/>
    <?php echo form_submit('submit','Submit'); ?><button class='button' onclick="window.location='<?php echo base_url('business/cart'); ?>';return false;">Cancel</button>
<?php echo form_close(); ?>