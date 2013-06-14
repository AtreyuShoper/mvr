<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
echo $this->session->userdata('word');
?>
<?php echo form_open(base_url('business/signup'),array('class' => 'form_signup well span6 form-horizontal','id' => 'form_signup3')); ?>
<div id="step3" class="step3 row">
    <div class="span6">
        <fieldset>
            <legend>Step 3 of 3</legend>
            <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
            <div class="control-group">
                <label class="control-label" for="bus_phone">Phone</label>
                <div class="controls">
                    <input type="text" name="bus_phone" id="bus_phone" size="12" maxlength="12" value="<?php echo set_value('bus_phone'); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="bus_fax">Fax:</label>
                <div class="controls">
                    <input type="text" name="bus_fax" id="bus_fax" size="12" maxlength="12" value="<?php echo set_value('bus_fax'); ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="bus_email">E-mail:</label>
                <div class="controls">
                    <input type="text" name="bus_email" id="bus_email" size="30" maxlength="100" value="<?php echo set_value('bus_email'); ?>">
                </div>
            </div>
            <div class="control-group">
             <label class="control-label" for="bus_type">Type of Business:</label>
                <div class="controls">
                   <select name="bus_type" id="bus_type" size="1"> <option selected="selected" value="Select">Select</option><option value="Sole Proprietor/Individual">Sole 
                             Proprietor/Individual</option> <option value="Partnership">Partnership</option> <option value="Limited Liability Corporation/ L.L.C.">Limited 
                             Liability Corporation/ L.L.C.</option> <option value="Corporation">Corporation</option> <option value="Other">Other</option></select>
                </div>
            </div>
            <div class="control-group">
            <label class="control-label" for="bus_delivery">Delivery Method for your Records:</label>
                <div class="controls">
                        <select name="bus_delivery" id="bus_delivery" size="1"> 
                          <option value="US Mail">US Mail</option> 
                          <option value="FAX">FAX</option>
                          <option selected="selected" value="EMAIL">EMAIL</option></select>
                </div>
            </div>	  	 
            <div id="imgco"><?php echo $captcha; ?>&nbsp;<a onclick="getCaptchaImage()" href="javascript: void(0)"><img width="16" height="16" border="0" align="absmiddle" alt="Click To refresh the image" src="<?php echo base_url('assets/img/refresh.gif'); ?>"></a>&nbsp;
            <input type="text" onfocus="showdiv('captcha')" class="input" size="10" name="security_code" placeholder="Enter Code...">
            <div class="form-actions">
                <?php echo form_hidden('step','4'); ?>
                <button type="submit" class="btn btn-primary">Continue</button>
                <button class="btn" onclick="window.location='<?php echo base_url('business'); ?>';return false;" >Cancel</button>  
            </div>
        </fieldset>
    </div>
</div>
<?php echo form_close(); ?>