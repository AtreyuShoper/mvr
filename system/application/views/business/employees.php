<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2 class='well'>Employees on File</h2>
<?php if(isset($employees) && is_array($employees)): ?>
    <?php if(count($employees)>0): ?>
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>State</th>
                    <th>License no.</th>
                    <th>Date of Birth</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($employees as $employee): ?>
                <tr>
                    <td><?php echo $employee->first_name; ?></td>
                    <td><?php echo $employee->middle_name; ?></td>
                    <td><?php echo $employee->last_name; ?></td>
                    <td><?php echo $employee->state; ?></td>
                    <td><?php echo $employee->license_number; ?></td>
                    <td><?php echo $employee->date_of_birth; ?></td>
                    <td><?php echo $employee->status; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>
            You currently do not have any employees on file.  Please add them using the <?php echo anchor(base_url('business/order'),'Order Records',array('class' => 'button')); ?><br><br>As a busy business owner, you need to quickly access your employees' driving records on file.  At instant-mvr.com, we've created a simple dashboard that lists
each employee driving record, as well as allow you to continue with your order of any employee's DMV report.  In addition to these options, you can also delete a
driver's record, which is a great feature for business owners who don't want to keep the DMV reports of unsuccessful job candidates.<br><br>

Choose to delete a driver or add an employee driving record to your shopping cart on this page.</p>
    <?php endif; ?>
<?php endif; ?>
