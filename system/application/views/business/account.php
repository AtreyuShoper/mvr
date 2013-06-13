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
<?php echo form_open(base_url('business/account'), array('class' => 'well', 'id' => 'account_info')); ?>
 <?php $account_info = $account_info[0];  ?>
<?php echo form_hidden('account_name', $account_info->account_name); ?>
<label>Account Login:</label><div class="inputs"><?php echo $account_info->account_name; ?></div><br/>
<label>Choose a New Password:</label><input type="password" name="new_password" class="text">&nbsp;<?php echo form_error('new_password'); ?><br/>
<label>Re-type your New Password:</label><input type="password" name="new_password_v" class="text">&nbsp;<?php echo form_error('new_password_v'); ?><br/>
<label>Contact First Name:</label><input type="text" name="bus_contact_first" value="<?php echo $account_info->first_name; ?>" class="text">&nbsp;<?php echo form_error('bus_contact_first'); ?><br/>
<label>Contact Last Name:</label><input type="text" name="bus_contact_last" value="<?php echo $account_info->last_name; ?>" class="text">&nbsp;<?php echo form_error('bus_contact_last'); ?><br/>
<label>Business Name:</label><input type="text" name="bus_name" value="<?php echo $account_info->business_name; ?>" class="text">&nbsp;<?php echo form_error('bus_name'); ?><br/>
<label>Address 1:</label><input type="text" name="bus_address1" value="<?php echo $account_info->address1; ?>" class="text">&nbsp;<?php echo form_error('bus_address1'); ?><br/>
<label>Address 2:</label><input type="text" name="bus_address2" value="<?php echo $account_info->address1; ?>" class="text">&nbsp;<?php echo form_error('bus_address2'); ?><br/>
<label>City:</label><input type="text" name="bus_city" value="<?php echo $account_info->city; ?>" class="text">&nbsp;<?php echo form_error('bus_city'); ?><br/>
<label>State:</label><select name="bus_state">
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
</select>&nbsp;<?php echo form_error('bus_state'); ?><br/>
<label>Zip Code:</label><input type="text" name="bus_zip" value="<?php echo $account_info->zip_code; ?>" class="text">&nbsp;<?php echo form_error('bus_zip'); ?><br/>
<label>Phone:</label><input type="text" name="bus_phone" value="<?php echo $account_info->phone; ?>" class="text">&nbsp;<?php echo form_error('bus_phone'); ?><br/>
<label>Fax:</label><input type="text"  name="bus_fax" value="<?php echo $account_info->fax; ?>" class="text">&nbsp;<?php echo form_error('bus_fax'); ?><br/>
<label>Email:</label><input type="text" name="bus_email" value="<?php echo $account_info->email; ?>" class="text">&nbsp;<?php echo form_error('bus_email'); ?><br/>
<label>Type of Business:</label><select name="bus_type">
    <option value="Corporation">Corporation</option>
    <option value="Sole Proprietor/Individual">Sole Proprietor/Individual</option>
    <option value="Partnership">Partnership</option>
    <option value="Limited Liability Corporation/ L.L.C.">Limited Liability Corporation/ L.L.C.</option>
    <option value="Corporation">Corporation</option>
    <option value="Other">Other</option>
</select>&nbsp;<?php echo form_error('bus_type'); ?><br/>
<label>Type of Delivery:</label><select name="bus_delivery">
    <option value="EMAIL">EMAIL</option>
    <option value="EMAIL">EMAIL</option>
    <option value="USMAIL">US Mail</option>
    <option value="FAX">FAX</option>
</select>&nbsp;<?php echo form_error('bus_delivery'); ?>
<hr/>
<?php echo form_submit('submit','Submit'); ?><button class='button' onclick="window.location='<?php echo base_url('business'); ?>';return false;">Cancel</button>
<?php echo form_close(); ?>