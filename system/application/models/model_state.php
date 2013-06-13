<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_state
 *
 * @author alps
 */
class model_state extends CI_Model {
    //put your code here
    public $id;
    public $state;
    public $price;
    function __construct() {
        parent::__construct();
    }
    function getAll(){
    return $this->db->get('business_states')->result();
    }
    function getDropDown(){
    $this->db->select('short_name,state');
    $this->db->order_by('state', 'ASC');
    $query=$this->db->get('business_states');
    $result = $query->result();
    $options = array();
    $options[''] = 'Select State';
    foreach($result as $item){
        $options[$item->short_name] = $item->state;
    }
    return $options;
    }
    function getPriceState($short_name){
        $this->db->select('price');
        return $this->db->get_where('business_states',array('short_name' => $short_name))->result();;
    }
    function getById($id){
        return $this->db->get_where('business_states',array('id' => $id))->result();
    }
    private function insert(){
        return $this->db->insert('business_states', $this);
    }
    private function update(){
    $this->db->set('state', $this->state);
    $this->db->set('price', $this->price);
    $this->db->where('id', $this->id);
    return $this->db->update('business_states');
    }
    public function delete(){
    $this->db->where('id', $this->id);
    return $this->db->delete('business_states');
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
