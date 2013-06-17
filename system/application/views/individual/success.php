<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h1>Transaction<span>Successfull</span></h1>
<label>Transaction Id</label>
<input type="text" name="trans_id" value="<?php echo $trans_id; ?>" disabled />

<label>Approval Code</label>
<input type="text" name="app_code" value="<?php echo $app_code; ?>" disabled />

<a class="button ordernow" href="<?php echo base_url('index.php/individual');?>">Order Now!</a>

						