<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
    <div class='row'>
            <div class='well' style='margin:0 auto;display: block;width: 960px'>
                <?php if($this->session->flashdata('msg')): ?>
               <div class="alert info"><button type="button" class="close" data-dismiss="alert">&times;</button><?php echo $this->session->flashdata('msg'); ?></div>
               <?php endif; ?> 
               <h2>Business Account Details</h2>
                <table class='table-condensed'>
                    <tr>
                        <td>Account Name</td><td>:</td><td><?php echo $acct->account_name; ?></td>
                    </tr>
                    <tr>
                        <td>First Name</td><td>:</td><td><?php echo $acct->first_name; ?></td>
                    </tr>
                    <tr>
                        <td>Last Name</td><td>:</td><td><?php echo $acct->last_name; ?></td>
                    </tr>
                     <tr>
                        <td>Over All Status</td><td>:</td>
                        <td>
                            <?php echo form_open(base_url('admin/update/business/all/'.$acct->business_order_id),array('class' => 'form-inline','style' => 'margin:0')); ?> 
                            <?php
                                 echo form_hidden('id',$acct->id);
                                 echo form_hidden('business_order_id',$acct->business_order_id);
                                 $_status_data = array();
                                 $_status_data[''] = 'Select Status';
                                 $_status_data['Processing'] = 'Processing';
                                 $_status_data['Ordered'] = 'Ordered';
                                 $_status_data['completed'] = 'Completed';
                                 $_status_data['Error'] = 'Error';
                             ?>
                             <?php echo form_dropdown('status',$_status_data,$acct->status); ?> 
                                 <button type="submit" class="btn">Update</button>  
                             <?php echo form_close(); ?>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>Action</td><td>:</td>
                        <td>
                            <?php echo form_open(base_url('admin/update/business/action/'.$acct->business_order_id),array('class' => 'form-inline','style' => 'margin:0')); ?> 
                            <?php
                            $_option_action = array(
                                ''              => 'Select Action',
                                'Release'    => 'Release',
                                'Reprocess'       => 'Reprocess',
                                'Resend'     => 'Resend'
                            )
                        ?>
                        <?php  echo form_hidden('action_id',$acct->id); ?>
                        <?php echo form_hidden('action_business_order_id',$acct->business_order_id); ?>
                        <?php echo form_dropdown('action',$_option_action, getAction($acct->business_order_id),array('id' => 'action')); ?>
                        <button type="submit" class="btn">Update</button>  
                         <?php echo form_close(); ?>
                        </td>
                    </tr>
                </table>
        <h2>Order List</h2>
<table class='table table-striped table-hover well'>
    <thead>
        <tr>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>License no.</th>
            <th>State</th>
             <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($employees as $emp): ?>
        <tr>
            <td><?php echo $emp->first_name; ?></td>
            <td><?php echo $emp->middle_name; ?></td>
            <td><?php echo $emp->last_name; ?></td>
            <td><?php echo $emp->date_of_birth; ?></td>
            <td><?php echo $emp->license_number; ?></td>
            <td><?php echo statename($emp->state); ?></td>
            <td>
               <?php echo form_open(base_url('admin/update/business/emp/'.$emp->id),array('class' => 'form-inline','style' => 'margin:0')); ?> 
               <?php
                    echo form_hidden('id',$emp->id);
                    echo form_hidden('business_order_id', $emp->business_order_id);
                    $_status_data = array();
                    $_status_data[''] = 'Select Status';
                    $_status_data['Processing'] = 'Processing';
                    $_status_data['Ordered'] = 'Ordered';
                    $_status_data['completed'] = 'Completed';
                    $_status_data['Error'] = 'Error';
                ?>
                <?php echo form_dropdown('status',$_status_data,$emp->status); ?> 
                    <button type="submit" class="btn">Update</button>  
                <?php echo form_close(); ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
        <?php echo anchor(base_url('admin'),'Back'); ?>
        </div>
    </div>