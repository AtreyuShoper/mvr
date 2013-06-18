<?php

class Individual extends CI_Controller {          
    function __construct()
    {
            parent::__construct();
            $this->load->model('individual/model_individual');
            $this->load->database();
            $this->session->unset_userdata('mailmessage');
            $this->load->library('authorize_net');
    }	
    function index()
    {			
            $this->form_validation->set_rules('delivery_method', 'Delivery Method', 'required|trim|xss_clean|max_length[10]');			
            $this->form_validation->set_rules('firstname', 'Firstname', 'required|trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('middlename', 'Middlename', 'trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('lastname', 'Lastname', 'required|trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('address1', 'Address1', 'required|trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('address2', 'Address2', 'trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('city', 'City', 'required|trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('states_id', 'State', 'required|trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'required|trim|xss_clean|max_length[30]');			
            $this->form_validation->set_rules('phone', 'Phone', 'required|trim|xss_clean|max_length[12]');			
            $this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[255]');			
            $this->form_validation->set_rules('drivers_license', 'Drivers License', 'required|trim|xss_clean|min_length[13]|max_length[255]');			
            $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim|xss_clean');

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                    $data['states'] = $this->model_individual->get_state_dropdown();
                    $data['title'] = 'InstantMVR - Individual';
                    $this->template->load('individual', 'individual/individual_view', $data);
            } 
            else // passed validation proceed to post success logic
            {
                    // build array for the model
                    $form_data = array(
                            'delivery_method' 	=> set_value('delivery_method'),
                            'firstname' 		=> set_value('firstname'),
                            'middlename' 		=> set_value('middlename'),
                            'lastname' 			=> set_value('lastname'),
                            'address1' 			=> set_value('address1'),
                            'address2' 			=> set_value('address2'),
                            'city' 				=> set_value('city'),
                            'states_id' 		=> set_value('states_id'),
                            'zip_code' 			=> set_value('zip_code'),
                            'phone' 			=> set_value('phone'),
                            'email' 			=> set_value('email'),
                            'drivers_license' 	=> set_value('drivers_license'),
                            'date_of_birth' 	=> set_value('date_of_birth')
                            );	

                            $this->session->set_userdata('step1', $form_data);

                            if($form_data['delivery_method'] == 'E-mail'){
                            redirect('individual/emailconfirm/');
                            }
                            else{
                            redirect('individual/usmailconfirm/');
                            }

            }
    }
    function emailconfirm()
    {	

            $this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|max_length[255]');

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                    $data['title'] = 'InstantMVR - Individual Email Confirm ';
                    $this->template->load('individual', 'individual/emailconfirm_view', $data);
            }
            else // passed validation proceed to post success logic
            {
                    // build array for the model

                    $form_data = array(
                                            'email' => set_value('email')
                                            );

                    $this->session->set_userdata('step2', $form_data);

                    if ($this->session->userdata('step2') == TRUE ) // the information has therefore been successfully saved in the db
                    {
                        redirect('individual/billing');  
                    }
                    else
                    {
                        redirect('individual/emailconfirm');
                    }
            }
    }
    function usmailconfirm()
    {			
            $this->form_validation->set_rules('address1', 'Address1', 'trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('address2', 'Address2', 'trim|xss_clean|max_length[255]');			
            $this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[30]');			
            $this->form_validation->set_rules('states_id', 'States_id', 'trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|xss_clean|max_length[30]');

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $data['title'] = 'InstantMVR - Individual US-mail Confirm ';
                $this->template->load('individual', 'individual/usmailconfirm_view', $data);
            }
            else // passed validation proceed to post success logic
            {
                    // build array for the model

                    $form_data = array(
                                            'address1' => set_value('address1'),
                                            'address2' => set_value('address2'),
                                            'city' => set_value('city'),
                                            'states_id' => set_value('states_id'),
                                            'zip_code' => set_value('zip_code')
                                            );

                    $this->session->set_userdata('usmstep2', $form_data);

                    if ($this->session->userdata('usmstep2') == TRUE ) // the information has therefore been successfully saved in the db
                    {
                        redirect('individual/billing');  
                    }
                    else
                    {
                        redirect('individual/usmailconfirm');
                    }	

            }
    }
    function billing()
    {	
        //print_r($_POST);
            if (isset($_POST["isbilling"])) {
            $this->form_validation->set_rules('credit_card', 'Credit Card', 'required|trim|xss_clean|max_length[40]');			
            $this->form_validation->set_rules('credit_card_number', 'Credit Card Number', 'required|trim|xss_clean|min_length[16]|max_length[255]|is_numeric');			
            $this->form_validation->set_rules('expiration_date', 'Expiration Date', 'required|trim|xss_clean|max_length[10]');			
            $this->form_validation->set_rules('first_name', 'First Name', 'required|trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('middle_name', 'Middle Name', 'trim|xss_clean|max_length[50]');			
            $this->form_validation->set_rules('last_name', 'Last Name', 'required|trim|xss_clean|max_length[50]');			
            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
            }
            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {	
                $data['title'] = 'InstantMVR - Individual Billing';
                $this->template->load('individual', 'individual/billing_view', $data);

            }

            else // passed validation proceed to post success logic
            {
                    // build array for the model
                    $state_id = $this->session->userdata('step1');
                    $_price = $this->model_individual->getprice($state_id['states_id']);
                    $_price = (array)$_price[0]; 
                    $form_data = array(
                                            'credit_card' 			=> set_value('credit_card'),
                                            'credit_card_number'                => set_value('credit_card_number'),
                                            'expiration_date'                   => set_value('expiration_date'),
                                            'first_name' 			=> set_value('first_name'),
                                            'middle_name' 			=> set_value('middle_name'),
                                            'last_name' 			=> set_value('last_name'),
                                            'states_id' 			=> $state_id['states_id'],
                                            'price'                             => $_price['price']
                                            );		

                    $this->session->set_userdata('step3', $form_data);

                    // run insert model to write data to db

                    if ($this->session->userdata('step3') == true) // the information has therefore been successfully saved in the db
                    {
                    redirect('individual/verify');   // or whatever logic needs to occur
                    }
                    else
                    {
                            redirect('individual/billing');
                    }
            }
    }
            function verify()
            {
                $data['title'] = 'InstantMVR - Individual Billing Verify';
                $this->template->load('individual', 'individual/verification_view', $data);
            }
    function login()
    {
        $this->session->unset_userdata('errormessage');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|xss_clean');	
        $this->form_validation->set_rules('drivers_license', 'Driver License Number', 'required|trim|xss_clean');
        $this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim|xss_clean');			


            $email = $this->input->post('email');
            $lic_num = $this->input->post('drivers_license');
            $date_of_birth = $this->input->post('date_of_birth');
            $error = "";

            $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');

            if ($this->form_validation->run() == FALSE) // validation hasn't been passed
            {
                $data['title'] = 'InstantMVR - Individual Login';
                $this->template->load('individual', 'individual/indlogin_view', $data);
            }
            else // passed validation proceed to post success logic
            {

                    if ($this->model_individual->indlogin($email, $lic_num, $date_of_birth))
                    {

                            $email          = $this->input->post('email');
                            $lic_num        = $this->input->post('drivers_license');
                            $date_of_birth  = $this->input->post('date_of_birth');

                            $data['query'] = $this->model_individual->indlogin($email, $lic_num, $date_of_birth);
                            if($data['query'] != 0)
                            {
                            $form_data = array(
                                            'email'             => $data['query']['email'],
                                            'drivers_license'   => $data['query']['drivers_license'],
                                            'date_of_birth'     => $data['query']['date_of_birth'],
                                            'id'                => $data['query']['id']
                                            );


                                    //$ci = & get_instance();
                                    $this->session->set_userdata('login', $form_data);

                                    redirect('individual/admin');

                            }
                    }
                    else
                            {

                        redirect('individual/unsuccess');
                            }
            }
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect('individual/login');
    }
    function unsuccess()
    {
                    $error = '<div class="mess_error"> We try to loggedin you but the email or date of birth or driver license number  does not exists.</div>';
                    $this->session->set_userdata('errormessage', $error);
                    $data['title'] = 'InstantMVR - Individual Login Error';
                    $this->template->load('individual', 'individual/indlogin_view', $data);
    }
    function admin()
    {	
        $id = $this->session->userdata('login');

        $record = $this->model_individual->information($id['id']);
        $data['info'] = $record;
        $data['title'] = 'InstantMVR - Individual Admin';
        $this->template->load('individual', 'individual/admin_view', $data);
    }
    function payment()
    {
            $id = $this->session->userdata('step1'); 
            $query = $this->model_individual->state($id['states_id']);
            
            $info = $this->session->userdata('step1');
            $billing = $this->session->userdata('step3');

            $auth_net = array(
                    'x_card_num'			=> $billing['credit_card_number'], // Visa
                    'x_exp_date'			=> $billing['expiration_date'],
                    'x_card_code'			=> '123',
                    'x_description'			=> 'MVR transaction',
                    'x_amount'				=> $billing['price'],
                    'x_first_name'			=> $billing['first_name'],
                    'x_last_name'			=> $billing['last_name'],
                    'x_address'				=> $info['address1'],
                    'x_city'				=> $info['city'],
                    'x_state'				=> $query[0]->state,
                    'x_zip'                             => $info['zip_code'],
                    'x_country'				=> 'US',
                    'x_phone'				=> $info['phone'],
                    'x_email'				=> $info['email'],
                    'x_customer_ip'			=> $this->input->ip_address(),
                    );



            $this->session->set_userdata('payment', $auth_net);
            $this->authorize_net->setData($auth_net);

            // Try to AUTH_CAPTURE
            if( $this->authorize_net->authorizeAndCapture() )
            {
                    $this->model_individual->BillingForm($this->session->userdata('step3'));
                    $this->model_individual->SaveForm($this->session->userdata('step1'));
                    $data['trans_id'] = $this->authorize_net->getTransactionId();
                    $data['app_code'] = $this->authorize_net->getApprovalCode();
                    $data['title'] = 'InstantMVR - Individual Payment';
                    $this->template->load('individual', 'individual/success', $data);
            }
            else
            {

                    echo '<h2>Fail!</h2>';
                    // Get error
                    echo '<p>' . $this->authorize_net->getError() . '</p>';
                    // Show debug data
                    $this->authorize_net->debug();
            }
    }
}

?>