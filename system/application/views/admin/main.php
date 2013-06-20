<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<table class="table table-striped table-hover well">
    <thead>
        <tr>
            <td colspan="10" class=""><strong>Recent Orders</strong></td>
        </tr>
        <tr style="background: #0064cd">
            <th>Transaction ID</th>
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
        <?php $error_orders = array(); ?>
        <?php foreach ($orders as $order): ?>
        <?php
            if(strtolower($order['status'])=='error'){
              $error_orders[] = $order;
              continue;
            }
        ?>
        <tr>
            <td>
                <?php echo anchor(base_url('admin/edit/'.strtolower($order['order_type']).'/'.$order['order_id']),$order['transaction_id'],array('class'=>'link edit-link')); ?>
            </td>
            <td>
                <?php echo $order['order_type']; ?>
            </td>
            <td><?php echo $order['first_name']; ?></td>
            <td><?php echo $order['middle_name']; ?></td>
            <td><?php echo $order['last_name']; ?></td>
            <td><?php echo $order['date_of_birth']; ?></td>
            <td><?php echo statename($order['state']); ?></td>
            <td><?php echo mailto($order['email']); ?></td>
            <td><?php echo $order['status']; ?></td>
            <td><?php echo getAction($order['order_id']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php if(count($error_orders)>0): ?>

<table class="table table-striped table-hover well">
    <thead>
        <tr>
            <td colspan="10" class="text-center"><strong>Recent Error Orders</strong></td>
        </tr>
        <tr style="background:orangered">
            <th>Transaction ID</th>
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
        <?php foreach ($error_orders as $order): ?>
        <tr>
            <td>
                <?php echo anchor(base_url('admin/edit/'.strtolower($order['order_type']).'/'.$order['order_id']),$order['transaction_id'],array('class'=>'link edit-link')); ?>
            </td>
            <td>
                <?php echo $order['order_type']; ?>
            </td>
            <td><?php echo $order['first_name']; ?></td>
            <td><?php echo $order['middle_name']; ?></td>
            <td><?php echo $order['last_name']; ?></td>
            <td><?php echo $order['date_of_birth']; ?></td>
            <td><?php echo statename($order['state']); ?></td>
            <td><?php echo mailto($order['email']); ?></td>
            <td><?php echo $order['status']; ?></td>
            <td><?php echo getAction($order['order_id']); ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?php endif; ?>
