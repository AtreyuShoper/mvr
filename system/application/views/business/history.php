<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Order On File History</h2>
<?php if(isset($orders_history) && is_array($orders_history)): ?>
    <?php if(count($orders_history)>0): ?>
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>Transaction ID</th>
                    <th>Amount</th>
                    <th>Approval Code</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($orders_history as $order_history): ?>
                <tr>
                    <td><?php echo $order_history->transaction_id; ?></td>
                    <td><?php echo $order_history->amount; ?></td>
                    <td><?php echo $order_history->approval_code; ?></td>
                    <td><?php echo $order_history->entry_date; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>
            You currently do not have any history on file.  Please add them using the <?php echo anchor(base_url('business/order'),'Order Records',array('class' => 'button')); ?><br><br>As a busy business owner, you need to quickly access your employees' driving records on file.  At instant-mvr.com, we've created a simple dashboard that lists
each employee driving record, as well as allow you to continue with your order of any employee's DMV report.  In addition to these options, you can also delete a
driver's record, which is a great feature for business owners who don't want to keep the DMV reports of unsuccessful job candidates.<br><br>

Choose to delete a driver or add an employee driving record to your shopping cart on this page.</p>
    <?php endif; ?>
<?php endif; ?>