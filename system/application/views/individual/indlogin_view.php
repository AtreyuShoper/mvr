<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<?php 
if($this->session->userdata('errormessage')){
echo '<p>'. $this->session->userdata('errormessage'). '</p>';
}
?>
<h1 class="pagetitle">Login</h1>

<?php // Change the css classes to suit your needs    
  $attributes = array('class' => '', 'id' => '');
  echo form_open('individual/login', $attributes); ?>
  <label>Email <span class="required">*</span></label>
      <?php echo form_error('email'); ?>
  <input id="email" type="text" name="email" value="<?php echo set_value('email'); ?>"  />

  <label>Driver License Number <span class="required">*</span></label>
      <?php echo form_error('drivers_license'); ?>                            
  <input id="drivers_license" type="text" name="drivers_license" value="<?php echo set_value('drivers_license'); ?>"  />

   <label>Date of Birth<span class="required">*</span></label>
      <?php echo form_error('date_of_birth'); ?> 
  <input id="date_of_birth" type="text" name="date_of_birth"  placeholder="YYYY - MM - DD" value="<?php echo set_value('date_of_birth'); ?>"  />

  <ul>
      <li class="log"><?php echo form_submit( 'submit', 'login'); ?></li>
  </ul>    
<?php echo form_close(); ?>
