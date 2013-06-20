<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Model_Orders extends CI_Model{
    public $id;
    public $order_type; /*Individual or Business */
    public $first_name;
    public $middle_name;
    public $last_name;
    public $date_of_birth;
    public $state;
    public $email;
    public $delivery_type;
    public $status;
    
    function __construct() {
        parent::__construct();
    }
    function orders(){
      $_return_orders = array();  
      $_individual_orders = $this->individual_orders();
      $_business_orders = $this->business_orders();
     foreach($_individual_orders as $io){
          $_tmp_res = array();
          $_tmp_res['id'] = $io->id;
          $_tmp_res['order_type'] = 'Individual';
          $_tmp_res['first_name'] = $io->first_name;
          $_tmp_res['middle_name'] = $io->middle_name;
          $_tmp_res['last_name'] = $io->last_name;
          $_tmp_res['date_of_birth'] = $io->date_of_birth;
          $_tmp_res['state'] = $io->state_id;
          $_tmp_res['email'] = $io->email;
          $_tmp_res['delivery_type'] = $io->delivery_method;
          $_tmp_res['status'] = $io->status;
          $_return_orders[$io->id] = $_tmp_res;
      }
      foreach($_business_orders as $bo){
          $_tmp_res = array();
          $_tmp_res['id'] = $bo->id;
          $_tmp_res['order_type'] = 'Individual';
          $_tmp_res['first_name'] = $bo->first_name;
          $_tmp_res['middle_name'] = $bo->middle_name;
          $_tmp_res['last_name'] = $bo->last_name;
          $_tmp_res['date_of_birth'] = $bo->date_of_birth;
          $_tmp_res['state'] = $bo->state_id;
          $_tmp_res['email'] = $bo->email;
          $_tmp_res['delivery_type'] = $bo->delivery_method;
          $_tmp_res['status'] = $bo->status;
          $_return_orders[$bo->id] = $_tmp_res;
      }
   return $_return_orders;
    }
    private function individual_orders(){
    $this->db->select('individual_records.*, individual_orders.*');
    $this->db->from('individual_records');
    $this->db->join('individual_orders', 'individual_records.id = individual_orders.individual_records_id');
    $this->db->order_by('individual_orders.entry_date', 'desc');
    $query = $this->db->get();
    return $query->result();
    }
    
    private function business_orders(){
    $this->db->select('business_account.*, business_orders.*');
    $this->db->from('business_account');
    $this->db->join('business_orders', 'business_account.id = business_orders.business_account_id');
    $this->db->order_by('business_orders.entry_date', 'desc');
    $query = $this->db->get();
    return $query->result();
    }
} 

?>