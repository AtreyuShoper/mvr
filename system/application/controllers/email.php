<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
class Email extends CI_Controller {

    function __construct()
	{
 		parent::__construct();
	}
    function index()
    {
				
                $getinfo = $this->session->userdata('step1');
                $email = $getinfo['email'];
                $name = $getinfo['firstname'];
                 $this->email->set_newline("\r\n");
                 $this->email->from($email, $name);
                 $this->email->to('jovelmilan.web@gmail.com');
                 $this->email->subject('Confirmation For Secure Payment');
                 $this->email->message('Confirmation Send Successfully!');
                 
                 //$path = $this->config->item('server_root');
                 //$file = $path. '/instantMVR/system/attachments/ian_records.php'; 
                 
                 //$this->email->attach($file);      
                    if($this->email->send())
                        { 
                        $success = '<div class="mess_success"> Confirmation Send Successfully!</div>';
                        $this->session->set_userdata('mailmessage', $success);; 
                        $data['title'] = 'InstantMVR - Virification';
                        $this->template->load('individual', 'individual/verification_view', $data);
                        
                        }
                        else
                            {
                            show_error($this->email->print_debugger());
                            }
                }
                
   }
