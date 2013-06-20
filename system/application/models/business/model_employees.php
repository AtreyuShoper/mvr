<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_employees
 *
 * @author alps
 */
class model_employees extends CI_Model {
    //put your code here
    public $id;
    public $business_order_id;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $state;
    public $license_number;
    public $date_of_birth;
    public $status;
    public $remarks;
    
    function __construct() {
        parent::__construct();
    }
    function getAll(){
        return $this->db->get('business_employees')->result();
    }
    function getByBusinessAccount($account_id){
    $this->db->select('business_employees.*, business_employees.status as estatus,business_orders.*');
    $this->db->from('business_employees');
    $this->db->join('business_orders', 'business_orders.id = business_employees.business_order_id');
    $this->db->where('business_orders.business_account_id', $account_id);
    $query = $this->db->get();
    return $query->result();
    }
    function getByOrderID($order_id){
    $query = $this->db->get_where('business_employees',array('business_order_id' => $order_id));
    return $query->result();
    }
    private function insert(){
    return $this->db->insert('business_employees', $this);
     return $this->db->insert_id();
    }
    public function selectUpdate($id, $data){
        $this->db->where('id', $id);
        return $this->db->update('business_employees', $data);
    }
    private function update(){
    $this->db->set('business_account_id', $this->business_account_id);
    $this->db->set('first_name', $this->first_name);
    $this->db->set('middle_name', $this->middle_name);
    $this->db->set('last_name', $this->last_name);
    $this->db->set('state', $this->state);
    $this->db->set('license_number', $this->license_number);
    $this->db->set('date_of_birth', $this->date_of_birth);
    $this->db->set('status', $this->status);
    $this->db->set('remarks', $this->remarks);
    $this->db->where('id', $this->id);
    return $this->db->update('business_employees');
    }
    public function delete(){
    $this->db->where('id', $this->id);
    return $this->db->delete('business_employees');
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
