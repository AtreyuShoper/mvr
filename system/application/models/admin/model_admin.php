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
class Model_Admin extends CI_Model{
    //put your code here
    public $order_type;
    public $order_id;
    public $action;
    public $remarks;
            
    function __construct() {
        parent::__construct();
    }
    private function insert(){
        return $this->db->insert('admin_transaction', $this);
    }
    private function update(){
        $this->db->set('order_type', $this->order_type);
        $this->db->set('order_id', $this->order_id);
        $this->db->set('action', $this->action);
        $this->db->set('remarks', $this->remarks);
        $this->db->where('order_id', $this->order_id);
        return $this->db->update('admin_transaction');
    }
    public function delete(){
        $this->db->where('order_id', $this->order_id);
        return $this->db->delete('admin_transaction');
    }
    public function save(){
        if (isset($this->order_id) && $this->transactionExists()==TRUE) {  
            return $this->update();
        } else {
            return $this->insert();
        }
    }
    private function transactionExists(){
        $_ret_val = FALSE;
        $query = $this->db->get_where('admin_transaction',array('order_id' => $this->order_id));
        if($query->num_rows()>0){
           $_ret_val = TRUE;
        }
        return $_ret_val;
    }
    public function orders($type=array()){
        
    }
    
    public function setOrderStatus($status='processing'){
        
    }
}

?>
