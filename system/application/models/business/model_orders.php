<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_orders
 *
 * @author alps
 */
class model_orders extends CI_Model{
    //put your code here
    public $id;
    public $business_account_id;
    public $amount;
    public $transaction_id;
    public $approval_code;
    public $status;
    public $remarks;
    function __construct() {
        parent::__construct();
    }
    function getAll(){
        return $this->db->get('business_orders')->result();
    }
    function getByBusinessAccount($account_id){
    $query = $this->db->get_where('business_orders', array('business_account_id' => $account_id));
    return $query->result();
    }
    private function insert(){
    $this->db->insert('business_orders', $this);
    return $this->db->insert_id();
    }
    private function update(){
    $this->db->set('business_account_id', $this->business_account_id);
    $this->db->set('amount', $this->amount);
    $this->db->set('transaction_id', $this->transaction_id);
    $this->db->set('approval_code', $this->approval_code);
    $this->db->set('status', 'Processing');
    $this->db->where('id', $this->id);
    return $this->db->update('business_orders');
    }
    public function delete(){
    $this->db->where('id', $this->id);
    return $this->db->delete('business_orders');
    }
    public function save(){
        if (isset($this->id)) {  
            return $this->update();
        } else {
            return $this->insert();
        }
    }
}

?>
