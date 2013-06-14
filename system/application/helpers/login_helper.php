<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
function logged_in_check() {
    // Get current CodeIgniter instance
    $CI =& get_instance();
    // We need to use $CI->session instead of $this->session
    $user = $CI->session->userdata('user_data');
    if (!isset($user['logged']) || $user['logged'] != TRUE)
    {
        redirect(base_url('business/signin'));
    }
}
?>