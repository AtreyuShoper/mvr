<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open(base_url('business/signup'),array('class' => 'form_signup well span6 form-horizontal','id' => 'form_signup2')); ?>
<div id="step2" class="step2 row">
    <div class="span6">
    <fieldset>
        <legend>Step 2 of 3</legend>
        <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
        <div class="control-group">
            <label class="control-label" for="bus_contact_first">Contact First Name:</label>
            <div class="controls">
                <input type="text" name="bus_contact_first" id="bus_contact_first" size="30" maxlength="50" value="<?php set_value('bus_contact_first'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_contact_last">Contact Last Name:</label>
            <div class="controls">
                <input type="text" name="bus_contact_last" id="bus_contact_last" size="30" maxlength="50" value="<?php set_value('bus_contact_last'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_name">Business Name:</label>
            <div class="controls">
                <input type="text" name="bus_name" id="bus_name" size="30" maxlength="50" value="<?php set_value('bus_name'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_address1">Address 1:</label>
            <div class="controls">
                <input type="text" name="bus_address1" id="bus_address1" size="30" maxlength="50" value="<?php set_value('bus_address1'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_address2">Address 2:</label>
            <div class="controls">
            <input type="text" name="bus_address2" id="bus_address2" size="30" maxlength="50" value="<?php set_value('bus_address2'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_city">City:</label>
            <div class="controls">
                <input type="text" name="bus_city" id="bus_city" maxlength="50" value="<?php set_value('bus_city'); ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_state">State:</label>
            <div class="controls">
                <select name="bus_state" id="bus_state" size="1"> <option selected="selected" value="">Select State--&gt;</option> 
                          <option value="AL">Alabama</option> <option value="AK">Alaska</option> <option value="AZ">Arizona</option> <option value="AR">Arkansas</option> <option value="CA">California</option> <option value="CO">Colorado</option> <option value="CT">Connecticut</option> <option value="DE">Delaware</option> <option value="FL">Florida</option> <option value="GA">Georgia</option> <option value="HI">Hawaii</option> <option value="ID">Idaho</option> <option value="IL">Illinois</option> <option value="IN">Indiana</option> <option value="IA">Iowa</option> <option value="KS">Kansas</option> <option value="KY">Kentucky</option> <option value="LA">Louisiana</option> <option value="ME">Maine</option> <option value="MD">Maryland</option> <option value="MA">Massachusetts</option> <option value="MI">Michigan</option> <option value="MN">Minnesota</option> <option value="MS">Mississippi</option> <option value="MO">Missouri</option> <option value="MT">Montana</option> <option value="NE">Nebraska</option> <option value="NV">Nevada</option> <option value="NH">New 
                          Hampshire</option> <option value="NJ">New 
                          Jersey</option> <option value="NM">New Mexico</option> 
                          <option value="NY">New York</option> <option value="NC">North Carolina</option> <option value="ND">North Dakota</option> <option value="OH">Ohio</option> <option value="OK">Oklahoma</option> <option value="OR">Oregon</option> <option value="PA">Pennsylvania</option> <option value="RI">Rhode 
                          Island</option> <option value="SC">South 
                          Carolina</option> <option value="SD">South 
                          Dakota</option> <option value="TN">Tennessee</option> 
                          <option value="TX">Texas</option> <option value="UT">Utah</option> <option value="VT">Vermont</option> <option value="VA">Virginia</option> <option value="DC">Washington 
                          D.C.</option> <option value="WA">Washington</option> 
                          <option value="WV">West Virginia</option> <option value="WI">Wisconsin</option> <option value="WY">Wyoming</option></select>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="bus_zip">Zip Code</label>
            <div class="controls">
                <input type="text" name="bus_zip" id="bus_zip" maxlength="10" value="<?php set_value('bus_zip'); ?>">
            </div>
        </div>
        <div class="form-actions">
            <?php echo form_hidden('step','3'); ?>
            <button type="submit" class="btn btn-primary">Continue</button>
            <button class="btn" onclick="window.location='<?php echo base_url('business'); ?>';return false;" >Cancel</button>  
        </div>
    </fieldset>
    </div>
</div>
<?php echo form_close(); ?>