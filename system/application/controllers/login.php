<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
                  
	function __construct()
	{
 		parent::__construct();
	}
	function index()
	{
		$this->load->view('index');
	}
        function individual()
        {
            $this->load->view('individual/indlogin_view');   
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */