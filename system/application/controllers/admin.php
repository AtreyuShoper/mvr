<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author alps
 */
class Admin extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $_data = array(
            'admin_user'    => 'admin',
            'admin_name'    => 'Administrator',
            'is_logged'     => true
        );
        $this->session->set_userdata('admin_data',$_data);
    }
    function index(){
        $_admin_data = $this->session->userdata('admin_data');
        if(!empty($_admin_data)){
         $data['admin_data'] = $_admin_data;   
        }
        $data['title'] = 'Administration Panel';
        $this->template->load('admin', 'admin/main', $data);
    }
}

?>
