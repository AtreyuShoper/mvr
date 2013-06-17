<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

    <h1 class="pagetitle">Billing Information</h1>                                                                

       <?php // Change the css classes to suit your needs   
       $attributes = array('class' => '', 'id' => '', 'name' => 'billingform');
       echo form_open('individual/billing', $attributes); ?>      
    <input type="hidden" name="isbilling" value="1" />      
    <label for="credit_card">Credit Card <span class="required">*</span></label>
        <?php echo form_error('credit_card'); ?>        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
			''  				=> 'Please Select',
			'American Express'  => 'American Express',
			'Discover'  		=> 'Discover',
			'MasterCard'  		=> 'MasterCard',
			'Visa'  			=> 'Visa'                                                 
		); ?>
        
        <br /><?php echo form_dropdown('credit_card', $options, set_value('credit_card'))?>

        <label for="credit_card_number">Credit Card Number <span class="required">*</span></label>
        <?php echo form_error('credit_card_number'); ?>
        <input id="credit_card_number" type="text" name="credit_card_number" maxlength="255" value="<?php echo set_value('credit_card_number'); ?>"  />

        <label for="expiration_date">Expiration Date <span class="required">*</span></label>
        <?php echo form_error('expiration_date'); ?>
        <input id="expiration_date" type="text" name="expiration_date" maxlength="10" placeholder="MM/YYYY" value="<?php echo set_value('expiration_date'); ?>"  />

        <label for="first_name">First Name <span class="required">*</span></label>
        <?php echo form_error('first_name'); ?>
        <input id="first_name" type="text" name="first_name" maxlength="50" value="<?php echo set_value('first_name'); ?>"  />

        <label for="middle_name">Middle Name</label>
        <?php echo form_error('middle_name'); ?>
        <input id="middle_name" type="text" name="middle_name" maxlength="50" value="<?php echo set_value('middle_name'); ?>"  />

        <label for="last_name">Last Name <span class="required">*</span></label>
        <?php echo form_error('last_name'); ?>
        <input id="last_name" type="text" name="last_name" maxlength="50" value="<?php echo set_value('last_name'); ?>"  />

        <label for="suffix">Suffix</label>
        <?php echo form_error('suffix'); ?>
        <input id="suffix" type="text" name="suffix" maxlength="10" value="<?php echo set_value('suffix'); ?>"  />
        
            
        <?php echo form_submit( 'submit', 'Continue'); ?>
		
<?php echo form_close(); ?>