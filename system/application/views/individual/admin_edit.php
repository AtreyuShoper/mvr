<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $id = $record['id']; ?>
    <?php echo form_open("individual/edit/$id");?>
<label>First Name</label>
<?php echo form_error('first_name'); ?>
        <?php echo form_input($first_name); ?>

<label>Middle Name</label>
<?php echo form_error('middle_name'); ?>
        <?php echo form_input($middle_name); ?>

<label>Last Name</label>
 <?php echo form_error('last_name'); ?>
        <?php echo form_input($last_name); ?>

<label>Address1</label>
<?php echo form_error('address1'); ?>
        <?php echo form_input($address1); ?>

<label>Address2</label>
<?php echo form_error('address2'); ?>
        <?php echo form_input($address2); ?>

<label>City</label>
<?php echo form_error('city'); ?> 
        <?php echo form_input($city); ?>

<label>State</label>
 <?php echo form_error('state_id'); ?>
        <?php echo form_input($state_id);?>
        <?php 
             $selected_state = $this->input->post('state_id');
             echo form_dropdown('state_id', $states, $selected_state);
        ?>

<label>Zip Code</label>
<?php echo form_error('zip_code'); ?>
        <?php echo form_input($zip_code); ?>

<label>Phone</label>
<?php echo form_error('phone'); ?>
        <?php echo form_input($phone); ?>

<label>Email</label>
<?php echo form_error('email'); ?>
        <?php echo form_input($email); ?>

<label>Drivers License Number</label>
<?php echo form_error('drivers_license'); ?>
        <?php echo form_input($drivers_license); ?>

<label>Date of Birth</label>
<?php echo form_error('date_of_birth'); ?>
        <?php echo form_input($date_of_birth); ?>

	<?php echo form_submit('submit', 'Submit');?>
<?php echo form_close(); ?>