<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function stateDropdown(){
    $CI =& get_instance();
    $CI->db->from('individual_states');
    $CI->db->order_by('id');
    $result = $CI->db->get();
    $return = array();
    if($result->num_rows() > 0){
    $return[''] = 'Select State';
     foreach($result->result_array() as $row){
    $return[$row['id']] = ucwords($row['state']);
    }
}
    return $return;
}
function statename($state_id){
    $ret_state = "";
    $CI =& get_instance();
    $CI->db->select('state');
    $CI->db->from('individual_states');
    $CI->db->where('id', $state_id);
    $CI->db->or_where('short_name', $state_id);
    $query = $CI->db->get();
     if($query->num_rows() >0){ 
        $ret_state = $query->result();
        $ret_state = $ret_state[0]->state;
    }
    return $ret_state;
}
function price($id){
    $ret_price = 0;
    $CI =& get_instance();
    $CI->db->select('price');
    $CI->db->from('individual_states');
    $CI->db->where('id', $id);
    $query = $CI->db->get();
    if($query->num_rows() >0){
        $ret_price = $query->result();
        $ret_price = $ret_price[0]->price;
    }
    return $ret_price;
}
function getAction($order_id){
    $ret_action = "";
    $CI =& get_instance();
    $CI->db->select('action');
    $CI->db->from('admin_transaction');
    $CI->db->where(array('order_id' => $order_id));
    $query = $CI->db->get();
    if($query->num_rows() >0){
        $ret_action = $query->result();
        $ret_action = $ret_action[0]->action;
    }
    return $ret_action;
}
function getBusinessAccountId($order_id){
    $ret_business_id = "";
    $CI =& get_instance();
     $CI->db->select('business_account_id');
    $CI->db->from('business_orders');
    $CI->db->where(array('id' => $order_id));
    $query = $CI->db->get();
    if($query->num_rows() >0){
        $ret_business_id = $query->result();
        $ret_business_id = $ret_business_id[0]->business_account_id;
    }
    return $ret_business_id;
}
function getBusinessAccountInfo($business_id, $order_id){
     $CI =& get_instance();
     $CI->db->select('business_account.*, business_orders.id as business_order_id, business_orders.status as status');
     $CI->db->from('business_account');
     $CI->db->join('business_orders','business_orders.business_account_id=business_account.id');
     $CI->db->where('business_account.id',$business_id);
     $CI->db->where('business_orders.id',$order_id);
     $query = $CI->db->get()->result();
     return $query[0];
}
        
?>