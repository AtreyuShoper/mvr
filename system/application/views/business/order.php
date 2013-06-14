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
<?php echo form_open(base_url('business/order/cart/insert'), array('class' => 'well form-horizontal', 'id' => 'business_order_form')); ?>
<fieldset>
    <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
    <div class="control-group">
    <label class="control-label" for="driver_first">Driver's First Name:</label>
        <div class="controls">
            <input type="text" name="driver_first" id="driver_first" value="<?php echo set_value('driver_first'); ?>">
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="driver_middle">Middle Name:</label>
        <div class="controls">
            <input type="text" name="driver_middle" id="driver_middle" value="<?php echo set_value('driver_first'); ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_last">Last Name:</label>
        <div class="controls">
            <input type="text" name="driver_last" id="driver_last" value="<?php echo set_value('driver_first'); ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_state">State:</label>
        <div class="controls">
            <?php echo form_dropdown('driver_state',$this->model_state->getDropDown(),  set_select('driver_state', set_value('driver_state') ),array('id' => 'driver_state')); ?>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_license_no">License no.:</label>
        <div class="controls">
            <input type="text" name="driver_license_no" id="driver_license_no" value="<?php echo set_value('driver_license_no'); ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_dob">Date of Birth:</label>
        <div class="controls">
            <input type="text" name="driver_dob" id="driver_dob" value="<?php echo set_value('driver_dob'); ?>">&nbsp;(01/28/1974)
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
    <?php echo form_close(); ?>
</fieldset>
<h2 class='well'>Shopping Cart</h2>
<?php echo $cart; ?>
