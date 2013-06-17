<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php 
if($this->session->userdata('mailmessage')){
        echo '<p>'. $this->session->userdata('mailmessage'). '</p>';
}
?>
 <p>Your request is going to come to a total cost of &#36; 
      <?php
      $price = $this->session->userdata('step3');
      //$price['price'];
      echo $price['price'];
      ?>
 </p>
 <?php echo form_open('individual/payment'); ?>
 <?php echo form_submit( 'submit', 'Click For Secure Payment'); ?>
 <?php echo form_close() ;?>
<div class="mess_info">Please click the " Click For Secure Payment " button above<br /> and wait for the next receipt screen to load entirely.</div>
<div class="mess_warning">DO NOT click on the " BACK " button on your browser, or you will be double charged.</div> 
