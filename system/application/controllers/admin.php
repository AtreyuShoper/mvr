<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admin
 *
 * @author alps
 */
class Admin extends CI_Controller {
    //put your code here
    function __construct() {
        parent::__construct();
        $_data = array(
            'admin_user'    => 'admin',
            'admin_name'    => 'Administrator',
            'is_logged'     => true
        );
        $this->session->set_userdata('admin_data',$_data);
        $this->load->model('admin/model_admin_orders');
    }
    function index(){
        /*echo "<pre>";
        print_r($this->model_orders->orders());
        echo "</pre>";
        die;*/
        $_admin_data = $this->session->userdata('admin_data');
        if(!empty($_admin_data)){
         $data['admin_data'] = $_admin_data;   
        }
        $data['orders'] = $this->model_admin_orders->orders();
        $data['title'] = 'Administration Panel';
        $this->template->load('admin', 'admin/main', $data);
    }
    
    function edit(){
        $_order_id = $this->uri->segment(4);
        $_order_type = $this->uri->segment(3);
        $_admin_data = $this->session->userdata('admin_data');
        if(!empty($_admin_data)){
         $data['admin_data'] = $_admin_data;   
        } 
        if( $_order_type=='individual'){
        $data['order'] = $this->model_admin_orders->getOrder($_order_id,$_order_type);
        $data['title'] = 'Administration Panel Edit Order';
        $this->template->load('admin', 'admin/order_edit', $data);
        }
        if( $_order_type=='business'){
        $this->load->model('business/model_employees');
        //print_r(getBusinessAccountInfo(getBusinessAccountId($_order_id))); die;
        $data['acct'] = getBusinessAccountInfo(getBusinessAccountId($_order_id),$_order_id);
        $data['employees'] = $this->model_employees->getByOrderID($_order_id);
        $data['title'] = 'Administration Panel Edit Order';
        $this->template->load('admin', 'admin/business_order_edit', $data);
        }
    }
    
    function update(){
        $_update_type = $this->uri->segment(3);
        echo $_update_type;
        switch ($_update_type) {
        case 'individual':
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_rules('first_name', 'First Name', 'required');
        $this->form_validation->set_rules('last_name', 'Last Name', 'required');
        $this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required');
        $this->form_validation->set_rules('state', 'State', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if($this->form_validation->run()==FALSE){
            echo 'error';
        }else{
            $this->load->model('admin/model_admin');
            $_at = new Model_Admin();
            $_at->order_type = $this->input->post('order_type');
            $_at->order_id = $this->input->post('order_id');
            $_at->action = $this->input->post('action');
            $_at->remarks = $this->input->post('remarks');
            $_at->save();
                $_form_data = array();
                $_form_data['first_name'] = $this->input->post('first_name');
                $_form_data['middle_name'] = $this->input->post('middle_name');
                $_form_data['last_name'] = $this->input->post('last_name');
                $_form_data['date_of_birth'] = $this->input->post('date_of_birth');
                $_form_data['state_id'] = $this->input->post('state');
                $_form_data['email'] = $this->input->post('email');
                $this->load->model('individual/model_individual');
                $this->model_individual->update($this->input->post('id'),$_form_data);
                
                $_form_data = array();
                $_form_data['status'] = $this->input->post('status');
                $_form_data['remarks'] = $this->input->post('action');
                $this->model_individual->updateOrder($this->input->post('order_id'),$_form_data);
                redirect(base_url('admin'));
        }
        break;
        case 'business':
                $_tr = $this->uri->segment(4);
                if($_tr=='action'){
                    $this->load->model('admin/model_admin');
                    $_at = new Model_Admin();
                    $_at->order_type = 'Business';
                    $_at->order_id = $this->input->post('action_business_order_id');
                    $_at->action = $this->input->post('action');
                    //$_at->remarks = $this->input->post('remarks');
                    $_at->save();
                    $this->session->set_flashdata('msg', 'Order Action Updated!');
                    redirect(base_url('admin/edit/business/'.$this->input->post('action_business_order_id')));
                }
                if($_tr=='all'){
                    $this->load->model('business/model_orders');
                    $_order_id = $this->input->post('business_order_id');
                    $_order_data=array('status' => $this->input->post('status'));
                     $this->model_orders->selectUpdate($_order_id,$_order_data);
                     $this->session->set_flashdata('msg', 'Order Status Updated!');
                     redirect(base_url('admin/edit/business/'.$this->input->post('business_order_id')));
                }
                $this->load->model('business/model_employees');
                $_emp_id = $this->input->post('id');
                $_emp_data=array('status' => $this->input->post('status'));
                $this->model_employees->selectUpdate($_emp_id,$_emp_data);
                 $this->session->set_flashdata('msg', 'Employee Order Status Updated!');
                redirect(base_url('admin/edit/business/'.$this->input->post('business_order_id')));
            break;
        }
        }


}

?>
