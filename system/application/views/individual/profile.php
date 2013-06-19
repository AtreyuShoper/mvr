<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php foreach ($info as $row): ?>
<table width="411" border="1">
  <tr>
    <td width="112">First Name</td>
    <td width="7">&nbsp;</td>
    <td width="170"><?php echo ucwords($row->firstname); ?></td>
  </tr>
  <tr>
    <td>Middle Name</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->middlename); ?></td>
  </tr>
  <tr>
    <td>Last Name</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->lastname); ?></td>
  </tr>
  <tr>
    <td>Address1</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->address1); ?></td>
  </tr>
  <tr>
    <td>Address2</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->address2); ?></td>
  </tr>
  <tr>
    <td>City</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->city); ?></td>
  </tr>
  <tr>
    <td>State</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->state); ?></td>
  </tr>
  <tr>
    <td>Phone</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->phone); ?></td>
  </tr>
  <tr>
    <td>Email</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->email); ?></td>
  </tr>
  <tr>
    <td>Drivers License</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->drivers_license); ?></td>
  </tr>
  <tr>
    <td>Date of Birth</td>
    <td>&nbsp;</td>
    <td><?php echo ucwords($row->date_of_birth); ?></td>
  </tr>
</table>
 <?php echo anchor('/individual/edit/'.$row->id,'Edit'); ?>
<?php endforeach; ?>