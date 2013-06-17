<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
class Contacts extends CI_Controller {

    function __construct()
	{
 		parent::__construct();
		$this->session->unset_userdata('mailmessage');
	}
        
    function index(){
        $this->form_validation->set_rules('name', 'Name', 'required|trim|xss_clean|max_length[40]');
        $this->form_validation->set_rules('email', 'Email Address', 'required|trim|xcc_clean|valid_email');
        $this->form_validation->set_rules('subject', 'Subject', 'trim|xcc_clean|max_length[255]');
        $this->form_validation->set_rules('message', 'Message', 'trim|xcc_clean|max_length[255]');
        
        $this->form_validation->set_error_delimiters('<br /><span class="error">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
                   $data['title'] = 'InstantMVR - Contact Us';
                   $this->template->load('individual', 'contacts_view', $data);
		}
		else
		{
                 
                    $name = $this->input->post('name');
                    $email = $this->input->post('email');
                    $subject = $this->input->post('subject');
                    $message = $this->input->post('message');
                    
                 $this->email->set_newline("\r\n");
                 
                 $this->email->from($email, $name);
                 $this->email->to('jovelmilan.web@gmail.com');
                 $this->email->subject($subject);
                 $this->email->message($message);
                 
                // $path = $this->config->item('server_root');
               //  $file = $path. '/instantMVR/system/attachments/ian_records.php'; 
                 
                // $this->email->attach($file);      
                    if($this->email->send())
                        {
						$success = '<div class="mess_success"> Send Successfully!</div>';
						$this->session->set_userdata('mailmessage', $success);; 
                        $this->load->view('contacts_view');
                         $data['title'] = 'InstantMVR - Contact Us - Error';
                         $this->template->load('individual', 'contacts_view', $data);
                        }
                        else
                            {
                            show_error($this->email->print_debugger());
                            }
                }
                
   }
}