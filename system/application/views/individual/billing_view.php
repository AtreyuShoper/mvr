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
    <label for="ccard_type">Credit Card <span class="required">*</span></label>
        <?php echo form_error('ccard_type'); ?>        
        <?php // Change the values in this array to populate your dropdown as required ?>
        <?php $options = array(
			''  				=> 'Please Select',
			'American Express'  => 'American Express',
			'Discover'  		=> 'Discover',
			'MasterCard'  		=> 'MasterCard',
			'Visa'  			=> 'Visa'                                                 
		); ?>
        
        <br /><?php echo form_dropdown('ccard_type', $options, set_value('ccard_type'))?>

        <label for="ccard_number">Credit Card Number <span class="required">*</span></label>
        <?php echo form_error('cccard_number'); ?>
        <input id="ccard_number" type="text" name="ccard_number" maxlength="255" value="<?php echo set_value('ccard_number'); ?>"  />

        <label for="exp_date">Expiration Date <span class="required">*</span></label>
        <?php echo form_error('exp_date'); ?>
        <input id="exp_date" type="text" name="exp_date" maxlength="10" placeholder="MM/YYYY" value="<?php echo set_value('exp_date'); ?>"  />

        <label for="ccfname">First Name <span class="required">*</span></label>
        <?php echo form_error('ccfname'); ?>
        <input id="ccfname" type="text" name="ccfname" maxlength="50" value="<?php echo set_value('ccfname'); ?>"  />

        <label for="cclname">Last Name <span class="required">*</span></label>
        <?php echo form_error('cclname'); ?>
        <input id="cclname" type="text" name="cclname" maxlength="50" value="<?php echo set_value('cclname'); ?>"  />        
        <?php echo form_submit( 'submit', 'Continue'); ?>
		
<?php echo form_close(); ?>