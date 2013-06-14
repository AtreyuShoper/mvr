<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Edit Cart Form</h2>
<?php echo form_open(base_url('business/order/cart/insert'), array('class' => 'well form-horizontal', 'id' => 'business_order_form')); ?>
<fieldset>
<?php echo form_hidden('rowid', $cart_edit['rowid']); ?>
    <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
    <div class="control-group">
    <label class="control-label" for="driver_first">Driver's First Name:</label>
        <div class="controls">
            <input type="text" name="driver_first" id="driver_first" value="<?php echo $cart_edit['first_name']; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_middle">Middle Name:</label>
        <div class="controls">
            <input type="text" name="driver_middle" id="driver_middle" value="<?php echo $cart_edit['middle_name']; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_last">Last Name:</label>
        <div class="controls">
            <input type="text" name="driver_last" id="driver_last" value="<?php echo $cart_edit['last_name']; ?>">&nbsp;<?php echo form_error('driver_last'); ?><br/>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_state">State:</label>
        <div class="controls">
            <?php echo form_dropdown('driver_state',$this->model_state->getDropDown(),$cart_edit['state'],array('id' => 'driver_state' )); ?>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="driver_license_no">License no.:</label>
        <div class="controls">
            <input type="text" name="driver_license_no" id="driver_license_no" value="<?php echo $cart_edit['license_no']; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="">Date of Birth:</label>
        <div class="controls">
            <input type="text" name="driver_dob" id="driver_dob" value="<?php echo $cart_edit['date_of_birth']; ?>">&nbsp;(01/28/1974)
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button><button class='btn' onclick="window.location='<?php echo base_url('business/cart'); ?>';return false;">Cancel</button>
    </div>
</fieldset>
<?php echo form_close(); ?>