<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php echo form_open(base_url('admin/order/update'),array('class' => 'well form-horizontal','id' => 'order_edit')); ?>
<fieldset>
    <legend><?php echo $order[order_type]; ?></legend>
    <?php 
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
            <?php echo form_dropdown('state_id',stateDropdown(), $order['state_id'], array('id' => 'state')); ?>
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
        <label class="control-label" for="status">Status</label>
        <div class="controls">
            <?php
                $_option_status = array(
                    ''              => 'Select Action',
                    'Processing'    => 'Prcessing',
                    'Ordered'       => 'Ordered',
                    'Completed'     => 'Completed',
                    'Error'         => 'Error'
                )
            ?>
            <?php echo form_dropdown('status',$_option_status, $order['status'],array('id' => 'status')); ?>
        </div>
    </div>
</fieldset>