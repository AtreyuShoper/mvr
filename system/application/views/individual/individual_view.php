<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>          
    <?php // Change the css classes to suit your needs  
    $attributes = array('class' => '', 'id' => '');
    echo form_open('individual', $attributes); ?>     
    <label for="delivery_method">Delivery Method <span class="required">*</span></label>
        <?php echo form_error('delivery_method'); ?>
                       
        <?php $options = array(
            'E-mail'  => 'E-mail',
            'US Mail '  => 'US Mail'
            ); ?>
                        <?php echo form_dropdown('delivery_method', $options, set_value('delivery_method'))?>
                        
                        <label for="firstname">Firstname <span class="required">*</span></label>
        <?php echo form_error('firstname'); ?>
                        <input id="firstname" type="text" name="firstname" maxlength="50" value="<?php echo set_value('firstname'); ?>"  />
                        
                        <label for="middlename">Middlename </label>
        <?php echo form_error('middlename'); ?>
                        <input id="middlename" type="text" name="middlename" maxlength="50" value="<?php echo set_value('middlename'); ?>"  />
                        
                        <label for="lastname">Lastname <span class="required">*</span></label>
        <?php echo form_error('lastname'); ?>
                        <input id="lastname" type="text" name="lastname" maxlength="50" value="<?php echo set_value('lastname'); ?>"  />
                        
                        <label for="address1">Address1 <span class="required">*</span></label>
        <?php echo form_error('address1'); ?>
                        <input id="address1" type="text" name="address1" maxlength="255" value="<?php echo set_value('address1'); ?>"  />
                        
                        <label for="address2">Address2</label>
        <?php echo form_error('address2'); ?>
                        <input id="address2" type="text" name="address2" maxlength="255" value="<?php echo set_value('address2'); ?>"  />
                        
                        <label for="city">City <span class="required">*</span></label>
        <?php echo form_error('city'); ?>                    
                        <input id="city" type="text" name="city" maxlength="255" value="<?php echo set_value('city'); ?>"  />
                        
                        <label for="state_id">State<span class="required">*</span></label>
        <?php echo form_error('state_id'); ?>
                        
                        <?php 
                        $selected_state = $this->input->post('state_id');
                        echo form_dropdown('state_id', $states, $selected_state);  ?>
                        
                        <label for="zip_code">Zip Code<span class="required">*</span></label>
        <?php echo form_error('zip_code'); ?>
                        <input id="zip_code" type="text" name="zip_code" maxlength="30" value="<?php echo set_value('zip_code'); ?>"  />
                        
                        <label for="phone">Phone <span class="required">*</span></label>
        <?php echo form_error('phone'); ?>
                        <input id="phone" type="text" name="phone" maxlength="12" placeholder="555-555-5555" value="<?php echo set_value('phone'); ?>"  />
                        
                        <label for="email">Email <span class="required">*</span></label>
        <?php echo form_error('email'); ?>
                        <input id="email" type="text" name="email" maxlength="255" value="<?php echo set_value('email'); ?>"  />           
                        
                        <label for="drivers_license">Drivers License <span class="required">*</span></label>
        <?php echo form_error('drivers_license'); ?>
                        <input id="drivers_license" type="text" name="drivers_license" maxlength="255" value="<?php echo set_value('drivers_license'); ?>"  />
                        
                        <label for="date_of_birth">Date of Birth <span class="required">*</span></label>
        <?php echo form_error('date_of_birth'); ?>
                        <input id="date_of_birth" type="text" name="date_of_birth" maxlength="10" placeholder="YYYY - MM - DD" value="<?php echo set_value('date_of_birth'); ?>"  />

        <?php echo form_submit( 'submit', 'Continue'); ?>
                       
                        
<?php echo form_close(); ?>
