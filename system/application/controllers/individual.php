<?php

class Individual extends CI_Controller {   
    public $data;
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
                            'delivery_method'           => set_value('delivery_method'),
                            'firstname' 		=> set_value('firstname'),
                            'middlename' 		=> set_value('middlename'),
                            'lastname' 			=> set_value('lastname'),
                            'address1' 			=> set_value('address1'),
                            'address2' 			=> set_value('address2'),
                            'city' 			=> set_value('city'),
                            'states_id' 		=> set_value('states_id'),
                            'zip_code' 			=> set_value('zip_code'),
                            'phone' 			=> set_value('phone'),
                            'email' 			=> set_value('email'),
                            'drivers_license'           => set_value('drivers_license'),
                            'date_of_birth'             => set_value('date_of_birth')
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
                                            'address1'      => set_value('address1'),
                                            'address2'      => set_value('address2'),
                                            'city'          => set_value('city'),
                                            'states_id'     => set_value('states_id'),
                                            'zip_code'      => set_value('zip_code')
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
            $this->form_validation->set_rules('ccard_type', 'Credit Card', 'required|trim|xss_clean|max_length[40]');			
            $this->form_validation->set_rules('ccard_number', 'Credit Card Number', 'required|trim|xss_clean|min_length[16]|max_length[255]|is_numeric');			
            $this->form_validation->set_rules('exp_date', 'Expiration Date', 'required|trim|xss_clean|max_length[10]');			
            $this->form_validation->set_rules('ccfname', 'First Name', 'required|trim|xss_clean|max_length[255]');		
            $this->form_validation->set_rules('cclname', 'Last Name', 'required|trim|xss_clean|max_length[255]');			
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
                    $form_data = array(
                                            'ccard_type' 	=> set_value('ccard_type'),
                                            'ccard_number'      => set_value('ccard_number'),
                                            'exp_date'          => set_value('exp_date'),
                                            'ccfname' 		=> set_value('ccfname'),
                                            'cclname' 		=> set_value('cclname')          
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
                $id = $this->session->userdata('step1');
                $query = $this->model_individual->price($id['states_id']);
                $data['price'] = $query[0]->price;
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
            $query2 = $this->model_individual->price($id['states_id']);
            $info = $this->session->userdata('step1');
            $billing = $this->session->userdata('step3');

            $auth_net = array(
                    'x_card_num'			=> $billing['ccard_number'], // Visa
                    'x_exp_date'			=> $billing['exp_date'],
                    'x_card_code'			=> '123',
                    'x_description'			=> 'MVR transaction',
                    'x_amount'				=> $query2[0]->price,
                    'x_first_name'			=> $billing['ccfname'],
                    'x_last_name'			=> $billing['cclname'],
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
            
            $form_data = array_merge(
                    $this->session->userdata('step1'),
                    $this->session->userdata('step3')
                
            );
            
            $this->session->set_userdata('payment', $form_data);
            
            // Try to AUTH_CAPTURE
            if( $this->authorize_net->authorizeAndCapture() )
            {
                //Save to database    
                $this->model_individual->SaveForm($form_data);
                
                 $id = $this->session->userdata('step1'); 
            
                 $query2 = $this->model_individual->price($id['states_id']);
                 
                 $date = date("Y-m-d\TH:i:s");
                 
                 $query = $this->model_individual->getId($id['firstname']);
                 
                    $formdata = array(
                        'individual_records_id' => $query[0]->id,
                        'amount' => $query2[0]->price,  
                        'transaction_id'    => $this->authorize_net->getTransactionId(),
                        'approval_code'     => $this->authorize_net->getApprovalCode(), 
                        'status' => 'Processing',
                        'remarks' => 'OK',
                        'entry_date' =>$date
                        
                    );
                    
                    $data['order_status'] = 'Success';
                    $data['order_message'] = 'Thank you! Your order has been placed.';
                    $data['order_response'] = 'We will email you soon!';
                    
                    $this->model_individual->SaveOrder($formdata);
                    
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
    function edit($id) {
            
            $record = $this->model_individual->edit($id);
            
		//validate form input
		$this->form_validation->set_rules('firstname', 'Firstname', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('middlename', 'Middlename', 'trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('lastname', 'Lastname', 'required|trim|xss_clean|max_length[30]');				
		$this->form_validation->set_rules('address1', 'Address1', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('address2', 'Address2', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('city', 'City', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('states_id', 'State', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('zip_code', 'Zip Code', 'trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[12]');			
		$this->form_validation->set_rules('email', 'Email', 'required|trim|xss_clean|valid_email|max_length[255]');			
		$this->form_validation->set_rules('drivers_license', 'Drivers License', 'required|trim|xss_clean|max_length[30]');			
		$this->form_validation->set_rules('date_of_birth', 'Date of Birth', 'required|trim|xss_clean');
	
		if (isset($_POST) && !empty($_POST))
		{		
			$data = array(
					       	'firstname'         =>  $this->input->post('firstname'),
					       	'middlename'        =>  $this->input->post('middlename'),
					       	'lastname'          =>  $this->input->post('lastname'),
					       	'address1'          =>  $this->input->post('address1'),
					       	'address2'          =>  $this->input->post('address2'),
					       	'city'              =>  $this->input->post('city'),
					       	'states_id'         =>  $this->input->post('states_id'),
					       	'zip_code'          =>  $this->input->post('zip_code'),
					       	'phone'             =>  $this->input->post('phone'),
					       	'email'             =>  $this->input->post('email'),
					       	'drivers_license'   =>  $this->input->post('drivers_license'),
					       	'date_of_birth'     =>  $this->input->post('date_of_birth')
						);
                        
                        $this->session->set_userdata('isloggedin', $data);
                        
			if ($this->form_validation->run() === true)
			{
				$this->model_individual->update($id, $data);

				$this->session->set_flashdata('message', "<div class='mess_success'>Employee Driving Record successfully updated.</div>");
				
				redirect('individual/profile/'.$id);
			}			
		}

		$this->data['message'] = (validation_errors() ? validation_errors() : $this->session->flashdata('message'));
                    
                $this->data['record'] = $record;
              
		//display the edit product form
		$this->data['firstname'] = array(
			'name'  	=> 'firstname',
			'value' 	=> $this->form_validation->set_value('firstname', $record['firstname']),
		);
                $this->data['middlename'] = array(
			'name'  	=> 'middlename',
			'value' 	=> $this->form_validation->set_value('middlename', $record['middlename']),
		);
		
		$this->data['lastname'] = array(
			'name'  	=> 'lastname',
			'value' 	=> $this->form_validation->set_value('lastname', $record['lastname']),
		);
	
		$this->data['address1'] = array(
			'name'  => 'address1',
			'value' => $this->form_validation->set_value('address1', $record['address1']),
		);
                $this->data['address2'] = array(
			'name'  => 'address2',
			'value' => $this    ->form_validation->set_value('address2', $record['address2']),
		);
                $this->data['city'] = array(
			'name'  => 'city',
			'value' => $this->form_validation->set_value('city', $record['city']),
		);
                $this->data['states_id'] = array(
			'name'  => 'states_id',
			'value' => $this->form_validation->set_value('states_id', $record['states_id']),
		);
                $this->data['zip_code'] = array(
			'name'  => 'zip_code',
			'value' => $this->form_validation->set_value('zip_code', $record['zip_code']),
		);
                $this->data['phone'] = array(
			'name'  => 'phone',
			'value' => $this->form_validation->set_value('phone', $record['phone']),
		);
                $this->data['email'] = array(
			'name'  => 'email',
			'value' => $this->form_validation->set_value('email', $record['email']),
		);
                $this->data['drivers_license'] = array(
			'name'  => 'drivers_license',
			'value' => $this->form_validation->set_value('drivers_license', $record['drivers_license']),
		);
                $this->data['date_of_birth'] = array(
			'name'  => 'date_of_birth',
			'value' => $this->form_validation->set_value('date_of_birth', $record['date_of_birth']),
		);
                $this->data['title'] = 'Individual Records Edit';
		$this->template->load('individual', 'individual/admin_edit', $this->data);
	}
        function profile()
        {
         $id = $this->session->userdata('login');

        $result = $this->model_individual->getRecord($id['id']);
        $data['info'] = $result; 
        $data['title'] = 'InstantMVR - Individual Profile';
        $this->template->load('individual', 'individual/profile', $data);
        }
}

?>