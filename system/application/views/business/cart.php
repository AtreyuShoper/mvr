<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
if(isset($cart_header1)){
    echo '<h2 class="well">'.$cart_header1.'</h2>';
    echo '<p>'.$cart_header1_content.'</p>';
}
if(!$this->cart->contents()):
	echo 'You don\'t have any items yet.';
else:
?>
<?php if(isset($cart_header2)): ?>
<h2 class='well'><?php echo $cart_header2; ?></h2>
<?php endif; ?>
<?php echo form_open(base_url($target), array('class' => 'well')); ?>
<table width="100%" cellpadding="0" cellspacing="0" class='table table-striped table-condensed'>
	<thead>
		<tr>
			<td>First Name</td>
			<td>Middle Name</td>
			<td>Last Name</td>
			<td>State</td>
			<td>License #</td>
			<td>Date of Birth</td>
			<td>Cost</td>
                        <td colspan="2">Action</td>
		</tr>
	</thead>
        <tbody>
		<?php $i = 1; ?>
                <?php foreach($this->mvr_cart->contents() as $items): ?>
                <?php echo form_hidden('rowid[]', $items['rowid']); ?>
                <?php echo form_hidden('qty[]',   $items['qty']); ?>
                <?php echo form_hidden('name',   $items['name']); ?>
                    <tr <?php if($i&1){ echo 'class="alt"'; }?>>
                        <td><?php echo $items['first_name']; ?></td>
	  		<td><?php echo $items['middle_name']; ?></td>
	  		<td><?php echo $items['last_name']; ?></td>
	  		<td><?php echo $items['state']; ?></td>
                        <td><?php echo $items['license_no']; ?></td>
                        <td><?php echo $items['date_of_birth']; ?></td>
	  		<td>&euro;<?php echo $this->cart->format_number($items['price']); ?></td>
                        <td><?php echo anchor('/business/order/cart/edit/'.$items['rowid'],'Edit'); ?></td>
                        <td><?php echo anchor('/business/order/cart/delete/'.$items['rowid'],'Delete'); ?></td>
                    </tr>
                 <?php $i++; ?>
		<?php endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><strong>Total</strong></td>
                <td>&euro;<?php echo $this->mvr_cart->format_number($this->cart->total()); ?></td>
                <td colspan="2"></td>
            </tr>
        </tfoot>
</table>
<hr />
<?php echo form_hidden('checkout',$step); ?>
<?php echo form_submit('submit',$submit_label); ?>
<?php echo form_close(); ?>
<?php endif; ?>
