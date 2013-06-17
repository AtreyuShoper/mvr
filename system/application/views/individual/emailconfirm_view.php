<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
                
<?php // Change the css classes to suit your needs   
$attributes = array('class' => '', 'id' => '');
echo form_open('individual/emailconfirm', $attributes); ?>                            
<p>You have chosen to receive your driving records via email.<br />
    If this is the correct email address please click continue <br />
    <i>
    <?php $email = $this->session->userdata('step1');
    echo $email['email'];?>
    </i>
</p>
<p>if not,  please type carefully the correct email address here:</p>
<label for="email">Email</label>
<?php echo form_error('email'); ?>
<input id="email" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>"  />

<?php echo form_submit( 'submit', 'Submit'); ?>
<?php echo form_close(); ?>

                                             