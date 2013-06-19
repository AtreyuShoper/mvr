<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_admin
 *
 * @author alps
 */
class model_admin extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/model_admin_orders');
    }
    
    public function orders($type=array()){
        $_orders[] = new Model_Admin_Orders();
        $_orders[1]->id = 1;
        $_orders[1]->order_type = 'Business';
        return $_orders;
    }
    
    public function setOrderStatus($status='processing'){
        
    }
}

?>
