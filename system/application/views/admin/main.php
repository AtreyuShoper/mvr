<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="table table-striped table-hover well">
    <thead>
        <tr>
            <th></th>
            <th>Order Type</th>
            <th>First Name</th>
            <th>Middle Name</th>
            <th>Last Name</th>
            <th>Date of Birth</th>
            <th>State</th>
            <th>Email</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($orders as $order): ?>
        <tr>
            <td><?php echo anchor(base_url('admin/edit/'.$order['id']),'Edit',array('class'=>'link edit-link')); ?></td>
            <td>
                <?php if(strtolower($order['order_type']) !== 'individual'): ?>
                <?php echo anchor(base_url('admin/business/'.$order['id']),'Business',array('class'=>'link')); ?>
                <?php else: ?>
                <?php echo $order['order_type']; ?>
                <?php endif; ?>
            </td>
            <td><?php echo $order['first_name']; ?></td>
            <td><?php echo $order['middle_name']; ?></td>
            <td><?php echo $order['last_name']; ?></td>
            <td><?php echo $order['date_of_birth']; ?></td>
            <td><?php echo statename($order['state']); ?></td>
            <td><?php echo mailto($order['email']); ?></td>
            <td><?php echo $order['status']; ?></td>
            <td><?php echo ''; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>