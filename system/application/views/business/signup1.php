<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open(base_url('business/signup'),array('class' => 'form_signup well span6 form-horizontal','id' => 'form_signup1')); ?>
<div id="step1" class="step1 row">
    <div class="span6">
        <fieldset>
             <legend>Step 1 of 3</legend>
             <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
            <div class="control-group"> 
            <label class="control-label" for="business_account">Choose a username: </label>
                <div class="controls"> 
                    <input type="text" class="input" id="business_account" name="business_account" size="25" maxlength="10" value="<?php echo set_value('business_account'); ?>">
                    <span class="help-block">(up to 10 digits)</span>
                </div>
            </div>
            <div class="control-group">
               <label class="control-label" for="business_password">Choose a password: </label>
               <div class="controls">
                    <input type="password" name="business_password" id="business_password" size="25" maxlength="15">
                    <span class="help-block">(up to 8 digits)</span>
               </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="business_password_v">Re-type your password: </label>
                <div class="controls">
                    <input type="password" class="input" name="business_password_v" id="business_password_v" maxlength="15">
                    <span class="help-block">(for verification)</span><br>
                </div>
            </div> 
            <div class="form-actions">
                <?php echo form_hidden('step','2'); ?>
                <button type="submit" class="btn btn-primary">Continue</button>
                <button class="btn" onclick="window.location='<?php echo base_url('business'); ?>';return false;" >Cancel</button>  
            </div>
        </fieldset>
    </div>
</div>
<?php echo form_close(); ?>
