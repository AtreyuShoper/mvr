<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of business_model
 *
 * @author alps
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model_Business extends CI_Model {
    //put your code here
public $id;
public $account_name;
public $password;
public $first_name;
public $last_name;
public $business_name;
public $address1;
public $address2;
public $city;
public $state;
public $zip_code;
public $phone;
public $fax;
public $email;
public $business_type;
public $delivery_method;
function __construct(){
    // Call the Model constructor
    parent::__construct();
}

function getAll(){
     $query = $this->db->get('business_account');
     return $query->result();
}
function getCurrent($id){
    $query = $this->db->get_where('business_account', array('id' => $id));
    return $query->result();
}
private function insert(){
    $this->db->insert('business_account', $this);
    return $this->db->insert_id();
}
private function update(){
    $this->db->set('account_name', $this->account_name);
    $this->db->set('password', md5($this->password));
    $this->db->set('first_name', $this->first_name);
    $this->db->set('last_name', $this->last_name);
    $this->db->set('business_name', $this->business_name);
    $this->db->set('address1', $this->address1);
    $this->db->set('address2', $this->address2);
    $this->db->set('city', $this->city);
    $this->db->set('state', $this->state);
    $this->db->set('zip_code', $this->zip_code);
    $this->db->set('phone', $this->phone);
    $this->db->set('fax', $this->fax);
    $this->db->set('email', $this->email);
    $this->db->set('business_type', $this->business_type);
    $this->db->set('delivery_method', $this->delivery_method);
    $this->db->where('id', $this->id);
    return $this->db->update('business_account');
}
public function delete(){
    $this->db->where('id', $this->id);
    return $this->db->delete('business_account');
}
public function save(){
    if (isset($this->id)) {  
        return $this->update();
    } else {
        return $this->insert();
    }
}
 public function verify_account($_account_name, $_password)
   {
      $query = $this
            ->db
            ->where('account_name', $_account_name)
            ->where('password', md5($_password))
            ->limit(1)
            ->get('business_account');

      if ( $query->num_rows > 0 ) {
         // person has account with us
         return $query->row();
      }
      return false;
   }
}
?>
