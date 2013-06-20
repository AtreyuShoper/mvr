<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class model_admin_orders extends CI_Model{
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
          $_tmp_res['order_id'] = $io->order_id;
          $_tmp_res['transaction_id'] = $io->transaction_id;
          $_return_orders[$io->id] = $_tmp_res;
      }
      foreach($_business_orders as $bo){
          $_tmp_res = array();
          $_tmp_res['id'] = $bo->id;
          $_tmp_res['order_type'] = 'Business';
          $_tmp_res['first_name'] = $bo->first_name;
          $_tmp_res['middle_name'] = '---N/A---';
          $_tmp_res['last_name'] = $bo->last_name;
          $_tmp_res['date_of_birth'] = '---N/A---';
          $_tmp_res['state'] = $bo->state;
          $_tmp_res['email'] = $bo->email;
          $_tmp_res['delivery_type'] = $bo->delivery_method;
          $_tmp_res['status'] = $bo->status;
          $_tmp_res['order_id'] = $bo->order_id;
          $_tmp_res['transaction_id'] = $bo->transaction_id;
          $_return_orders[$bo->id] = $_tmp_res;
      }
   return $_return_orders;
    }
    function getOrder($order_id, $order_type){
        $_return_orders = array();
        if(strtolower($order_type)=='individual'){
            $_order_type = $this->individual_orders($order_id);
        }
        if(strtolower($order_type)=='business'){
            $_order_type = $this->business_orders($order_id);
        }
        
            foreach($_order_type as $order){
              $_tmp_res = array();
              $_tmp_res['id'] = $order->id;
              $_tmp_res['order_type'] = $order_type;
              $_tmp_res['first_name'] = $order->first_name;
              $_tmp_res['middle_name'] = $order->middle_name;
              $_tmp_res['last_name'] = $order->last_name;
              $_tmp_res['date_of_birth'] = $order->date_of_birth;
              $_tmp_res['state'] = $order->state_id;
              $_tmp_res['email'] = $order->email;
              $_tmp_res['delivery_type'] = $order->delivery_method;
              $_tmp_res['status'] = $order->status;
              $_tmp_res['order_id'] = $order->order_id;
              $_return_orders = $_tmp_res;
          }
        return $_return_orders;
    }
    private function individual_orders($id=""){
    $this->db->select('individual_records.*, individual_orders.*, individual_orders.id as order_id');
    $this->db->from('individual_orders');
    $this->db->join('individual_records', 'individual_records.id = individual_orders.individual_record_id');
    $this->db->where('individual_orders.individual_record_id !=','NULL');
    $this->db->order_by('individual_orders.entry_date', 'desc');
    if($id !== ""){
        $this->db->where('individual_orders.id',$id);
    }
    $query = $this->db->get();
    return $query->result();
    }
    
    private function business_orders($id=""){
    $this->db->select('business_account.*, business_orders.*, business_orders.id as order_id');
    $this->db->from('business_account');
    $this->db->join('business_orders', 'business_account.id = business_orders.business_account_id');
    $this->db->where('business_orders.business_account_id !=','NULL');
    $this->db->order_by('business_orders.entry_date', 'desc');
    if($id !== ""){
        $this->db->where('business_account.id',$id);
    }
    $query = $this->db->get();
    return $query->result();
    }
} 

?>