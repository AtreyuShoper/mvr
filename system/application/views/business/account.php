<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Edit Your Account Information Here</h2>
<p>
If you need to edit any of your account information, you can do so here.  Change your account password, address, email, stored credit card details, or even update your preferred delivery method for when you order driving records.<br><br>

Please note that if you change your email address and delivery information, all correspondence will be sent to the updated contact information.<br><br>

Once you've made changes to your account, click the <b> Update </b> button to save your changes.</p>
<h2 class='well'>Edit Account Information Form</h2>
<?php echo form_open(base_url('business/account'), array('class' => 'well form-horizontal', 'id' => 'account_info')); ?>
 <?php $account_info = $account_info[0];  ?>
<?php echo form_hidden('account_name', $account_info->account_name); ?>
<fieldset>
    <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
    <div class="control-group">
    <label class="control-label" for="">Account Login:</label>
        <div class="controls">
            <input type="text" disabled value="<?php echo $account_info->account_name; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="">Choose a New Password:</label>
        <div class="controls">
            <input type="password" name="new_password" id="new_password" >
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for=""new_password_v">Re-type your New Password:</label>
        <div class="controls">
            <input type="password" name="new_password_v" id="new_password_v">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_contact_first">Contact First Name:</label>
        <div class="controls">
            <input type="text" name="bus_contact_first" id="bus_contact_first" value="<?php echo $account_info->first_name; ?>">
        </div>
    </div>
    <div class="control-group">
    <label  class="control-label" for="bus_contact_last">Contact Last Name:</label>
        <div class="controls">
            <input type="text" name="bus_contact_last" id="bus_contact_las" value="<?php echo $account_info->last_name; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_name">Business Name:</label>
        <div class="controls">
            <input type="text" name="bus_name" id="bus_name" value="<?php echo $account_info->business_name; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_address1">Address 1:</label>
        <div class="controls">
            <input type="text" name="bus_address1" id="bus_address1" value="<?php echo $account_info->address1; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_address2">Address 2:</label>
        <div class="controls">
            <input type="text" name="bus_address2" id="bus_address2" value="<?php echo $account_info->address1; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_city">City:</label>
        <div class="controls">
            <input type="text" name="bus_city" id="bus_city" value="<?php echo $account_info->city; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_state">State:</label>
        <div class="controls">
            <select name="bus_state" id="bus_state">
                <option value="AL">AL</option>
                <option value="AL">Alabama </option>
                <option value="AK">Alaska </option> 
                <option value="AZ">Arizona </option>
                <option value="AR">Arkansas </option>
                <option value="CA">California</option>  
                <option value="CO">Colorado </option>
                <option value="CT">Connecticut </option>
                <option value="DE">Delaware </option>
                <option value="FL">Florida </option>
                <option value="GA">Georgia </option>
                <option value="HI">Hawaii</option>
                <option value="ID">Idaho </option>
                <option value="IL">Illinois </option>
                <option value="IN">Indiana </option>
                <option value="IA">Iowa</option>
                <option value="KS">Kansas </option>
                <option value="KY">Kentucky </option>
                <option value="LA">Louisiana </option>
                <option value="ME">Maine</option>
                <option value="MD">Maryland </option>
                <option value="MA">Massachusetts</option>
                <option value="MI">Michigan </option>
                <option value="MN">Minnesota </option>
                <option value="MS">Mississippi </option>
                <option value="MO">Missouri</option>
                <option value="MT">Montana </option>
                <option value="NE">Nebraska </option>
                <option value="NV">Nevada </option>
                <option value="NH">New Hampshire </option> 
                <option value="NJ">New Jersey </option>
                <option value="NM">New Mexico </option>
                <option value="NY">New York </option>
                <option value="NC">North Carolina </option>
                <option value="ND">North Dakota</option>
                <option value="OH">Ohio </option>
                <option value="OK">Oklahoma </option>
                <option value="OR">Oregon </option>
                <option value="PA">Pennsylvania</option> 
                <option value="PR">Puerto Rico</option>
                <option value="RI">Rhode Island</option>
                <option value="SC">South Carolina </option>
                <option value="SD">South Dakota</option>
                <option value="TN">Tennessee </option>
                <option value="TX">Texas </option>
                <option value="UT">Utah </option>
                <option value="VT">Vermont </option>
                <option value="VA">Virginia </option>
                <option value="DC">Washington D.C.</option>
                <option value="WA">Washington</option>
                <option value="WV">West Virginia </option>
                <option value="WI">Wisconsin </option>
                <option value="WY">Wyoming </option>
            </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_zip">Zip Code:</label>
        <div class="controls">
            <input type="text" name="bus_zip" id="bus_zip" value="<?php echo $account_info->zip_code; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_phone">Phone:</label>
        <div class="controls">
            <input type="text" name="bus_phone" id="bus_phone" value="<?php echo $account_info->phone; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_fax">Fax:</label>
        <div class="controls">
            <input type="text"  name="bus_fax" id="bus_fax" value="<?php echo $account_info->fax; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_email">Email:</label>
        <div class="controls">
            <input type="text" name="bus_email" id="bus_email" value="<?php echo $account_info->email; ?>">
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="bus_type">Type of Business:</label>
        <div class="controls">
            <select name="bus_type" id="bus_type">
                <option value="Corporation">Corporation</option>
                <option value="Sole Proprietor/Individual">Sole Proprietor/Individual</option>
                <option value="Partnership">Partnership</option>
                <option value="Limited Liability Corporation/ L.L.C.">Limited Liability Corporation/ L.L.C.</option>
                <option value="Corporation">Corporation</option>
                <option value="Other">Other</option>
            </select>
        </div>
    </div>
    <div class="control-group">
    <label class="control-label" for="">Type of Delivery:</label>
        <div class="controls">
            <select name="bus_delivery" id="bus_delivery">
                <option value="EMAIL">EMAIL</option>
                <option value="EMAIL">EMAIL</option>
                <option value="USMAIL">US Mail</option>
                <option value="FAX">FAX</option>
            </select>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class='btn' onclick="window.location='<?php echo base_url('business'); ?>';return false;">Cancel</button>
    </div>
</fieldset>
<?php echo form_close(); ?>