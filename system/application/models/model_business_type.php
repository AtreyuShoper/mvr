<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_business_type
 *
 * @author alps
 */
class model_business_type extends CI_Model{
    //put your code here
    public $id;
    public $type;
    function __construct() {
        parent::__construct();
    }
    function getAll(){
        return $this->db->get('business_type')->result();
    }
    function getById($id){
        return $this->db->get_where('business_type',array('id' => $id))->result();
    }
    private function insert(){
        return $this->db->insert('business_type', $this);
    }
    private function update(){
    $this->db->set('type', $this->type);
    $this->db->where('id', $this->id);
    return $this->db->update('business_type');
    }
    public function delete(){
    $this->db->where('id', $this->id);
    return $this->db->delete('business_type');
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
