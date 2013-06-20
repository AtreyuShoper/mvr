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
    echo $state_id;
    $ret_state = "";
    $CI =& get_instance();
    $CI->db->select('state');
    $CI->db->from('individual_states');
    $CI->db->where('id', $state_id);
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
        
?>