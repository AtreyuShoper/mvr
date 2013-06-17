<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<p>Would you like your driving record mailed to a different address?<br />
    If so, please fill in the details below.
    If not, click this box <input type="checkbox">
</p>
<p>if not,  please type carefully the correct address here:</p>
<?php // Change the css classes to suit your needs    

$attributes = array('class' => '', 'id' => '');
echo form_open('individual/usmailconfirm', $attributes); ?>
<p>
        <label for="address1">Address1</label>
        <?php echo form_error('address1'); ?>
        <br /><input id="address1" type="text" name="address1" maxlength="255" value="<?php echo set_value('address1'); ?>"  />
</p>
<p>
        <label for="address2">Address2</label>
        <?php echo form_error('address2'); ?>
        <br /><input id="address2" type="text" name="address2" maxlength="255" value="<?php echo set_value('address2'); ?>"  />
</p>
<p>
        <label for="city">City</label>
        <?php echo form_error('city'); ?>
        <br /><input id="city" type="text" name="city" maxlength="30" value="<?php echo set_value('city'); ?>"  />
</p>
<p>
        <label for="state">State</label>
        <?php echo form_error('state'); ?>
        <br /><input id="state" type="text" name="state" maxlength="50" value="<?php echo set_value('state'); ?>"  />
</p>
<p>
        <label for="zip_code">Zip Code</label>
        <?php echo form_error('zip_code'); ?>
        <br /><input id="zip_code" type="text" name="zip_code" maxlength="30" value="<?php echo set_value('zip_code'); ?>"  />
</p>
<p>
        <?php echo form_submit( 'submit', 'Submit'); ?>
</p>
<?php echo form_close(); ?>