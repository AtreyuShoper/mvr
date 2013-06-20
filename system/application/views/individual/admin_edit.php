<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php $id = $record['id']; ?>
    <?php echo form_open("individual/edit/$id");?>
<label>Firstname</label>
<?php echo form_error('firstname'); ?>
        <?php echo form_input($firstname); ?>

<label>Middlename</label>
<?php echo form_error('middlename'); ?>
        <?php echo form_input($middlename); ?>

<label>Lastname</label>
 <?php echo form_error('lastname'); ?>
        <?php echo form_input($lastname); ?>

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
 <?php echo form_error('states_id'); ?>
        <?php echo form_input($states_id);?>
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