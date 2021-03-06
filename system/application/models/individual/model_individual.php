<?php

class Model_Individual extends CI_Model {

	function __construct()
	{
		parent::__construct();
	}
	//SAVE INDIVIDUAL RECORD
	function SaveForm($form_data)
	{
		$this->db->insert('individual_records', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return$this->db->insert_id();
		}
		
		return FALSE;
	}
           function get_state_dropdown()
        {
            $this->db->from('individual_states');
            $this->db->order_by('id');
            $result = $this->db->get();
            $return = array();
            if($result->num_rows() > 0){
            $return[''] = 'State and Price';
             foreach($result->result_array() as $row){
            $return[$row['id']] = ucwords($row['state']). ' - ' .$row['price'];
            }
        }
            return $return;
        }
        function getprice($states_id){
           $this->db->select('price');
           $this->db->from('individual_states');
           $this->db->where('id', $states_id);
           return $this->db->get()->result();
        }
        function displayprice($id) 
	{
		$this->db->select('id, price');
		$this->db->where('id', $id);
		$query = $this->db->get('individual_billing');

		return $query->row_array();
	
	}
        
        function indlogin($email, $drivers_license, $date_of_birth)
	{
		//$this->load->database();
		$query = $this->db->where('email', $email)->where('drivers_license', $drivers_license)->where('date_of_birth', $date_of_birth)->limit(1)->get('individual_records');
		
		if ($query->num_rows()>0)
		{
			//$query = $qry->row_array();
			return $query->row_array();
		}
		else{
		return FALSE;
		}
	}
        function information($id)
        {        
            //$this->db->order_by('individual_records.firstname', 'ASC');
            $this->db->select('individual_records.id,
                                individual_records.first_name,
                                individual_records.last_name,
                                individual_records.date_of_birth,
                                individual_records.drivers_license,
                                individual_records.state_id,
                                individual_records.email,
                                individual_orders.`status`,
                                individual_orders.remarks');    
            $this->db->from('individual_orders');
            $this->db->where('individual_orders.id', $id);
            $join = 'left';
            $this->db->join('individual_records', 'individual_records.id = individual_orders.individual_record_id', $join);
            $query = $this->db->get();
            return $query->result();
        }
        function getstate($id)
        {
            $this->db->select('id, state_id');
              $this->db->where('id', $id);
		$query = $this->db->get('individual_records');

		return $query->row_array();
        }
        function search()
        {
            $this->db->query("SELECT * FROM individual_records WHERE first_name,last_name LIKE %search%");
        }
        function state($id){
                $this->db->select('state');
                $this->db->from('individual_states');
                $this->db->where('id', $id);
                $query = $this->db->get();
                return $query->result();
        }
        function price($id){
                $this->db->select('price');
                $this->db->from('individual_states');
                $this->db->where('id', $id);
                $query = $this->db->get();
                return $query->result();
        }
        function getId($id){
                $this->db->select('individual_records.id, first_name');
                $this->db->from('individual_records');
                $this->db->where('id');
                $query = $this->db->get();
                return $query->result();
        }
        function SaveOrder($formdata)
	{
		$this->db->insert('individual_orders', $formdata);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
        function edit($id) {
		$this->db->select('individual_records.id,
                                    individual_records.first_name,
                                    individual_records.middle_name,
                                    individual_records.last_name,
                                    individual_records.address1,
                                    individual_records.address2,
                                    individual_records.city,
                                    individual_records.state_id,
                                    individual_records.zip_code,
                                    individual_records.phone,
                                    individual_records.email,
                                    individual_records.drivers_license,
                                    individual_records.date_of_birth');
		$this->db->where('id', $id);
		$query = $this->db->get('individual_records');

		return $query->row_array();
	}
        function update($id, $data)
	{
            
		$this->db->where('id', $id);
		$this->db->update('individual_records', $data);
	}
        function updateOrder($id, $data)
	{
            
		$this->db->where('id', $id);
		$this->db->update('individual_orders', $data);
	}
        function getRecord($id)
        {
            //$this->db->order_by('individual_records.firstname', 'ASC');
            $this->db->select(' individual_records.id,
                                individual_records.first_name,
                                individual_records.middle_name,
                                individual_records.last_name,
                                individual_records.address1,
                                individual_records.address2,
                                individual_records.city,
                                individual_records.state_id,
                                individual_records.zip_code,
                                individual_records.phone,
                                individual_records.email,
                                individual_records.drivers_license,
                                individual_records.date_of_birth');    
            $this->db->from('individual_records');
            $this->db->where('individual_records.id', $id);
            $query = $this->db->get();
            return $query->result();
        }
function statedropdown($id, $statename)
        {
            $this->db->from('individual_states');
            $this->db->order_by('id');
            $result = $this->db->get();
            $return = array();
            if($result->num_rows() > 0){
            $return[$id] = $statename;
             foreach($result->result_array() as $row){
            $return[$row['id']] = ucwords($row['state']);
            }
        }
            return $return;
        }
       
}
?>