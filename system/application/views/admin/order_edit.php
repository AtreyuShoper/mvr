<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<div class='row'>
    <div style='margin:0 auto;display:block;width:500px;'>
<?php echo form_open(base_url('admin/update/individual/order'),array('class' => 'well form-horizontal','id' => 'order_edit')); ?>
<fieldset>
    <legend>Edit <?php echo $order['order_type']; ?> transaction</legend>
    <?php 
    echo form_hidden('order_id',$order['order_id']);
    echo form_hidden('id',$order['id']);
    echo form_hidden('order_type',$order['order_type']);
    ?>
    <?php echo validation_errors('<div class="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>
    <div class="control-group">
        <label class="control-label" for="first_name">First Name</label>
        <div class="controls">
            <?php echo form_input('first_name',$order['first_name'],array('id' => 'first_name')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="middle_name">Middle Name</label>
        <div class="controls">
            <?php echo form_input('middle_name',$order['middle_name'],array('id' => 'middle_name')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="last_name">Last Name</label>
        <div class="controls">
            <?php echo form_input('last_name',$order['last_name'],array('id' => 'last_name')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="date_of_birth">Date of Birth</label>
        <div class="controls">
            <?php echo form_input('date_of_birth',$order['date_of_birth'],array('id' => 'date_of_birth')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="state">State</label>
        <div class="controls">
            <?php echo form_dropdown('state',stateDropdown(), $order['state'], array('id' => 'state')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
            <?php echo form_input('email',$order['email'],array('id' => 'email')); ?>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="status">Status</label>
        <div class="controls">
            <?php
                $_option_status = array(
                    ''              => 'Select Status',
                    'Processing'    => 'Prcessing',
                    'Ordered'       => 'Ordered',
                    'Completed'     => 'Completed',
                    'Error'         => 'Error'
                )
            ?>
            <?php echo form_dropdown('status',$_option_status, $order['status'],array('id' => 'status')); ?>
        </div>
    </div>
     <div class="control-group">
        <label class="control-label" for="action">Action</label>
        <div class="controls">
            <?php
                $_option_action = array(
                    ''              => 'Select Action',
                    'Release'    => 'Release',
                    'Reprocess'       => 'Reprocess',
                    'Resend'     => 'Resend'
                )
            ?>
            <?php echo form_dropdown('action',$_option_action, getAction($order['order_id']),array('id' => 'action')); ?>
        </div>
    </div>
    <div class="form-actions">
        <button type="submit" class="btn btn-primary">Update</button>
        <button onclick="window.location='<?php echo base_url('admin'); ?>';return false;" class="btn">Cancel</button>
    </div>
</fieldset>
<?php echo form_close(); ?>
    </div>
</div>