<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Business
 *
 * @author alps
 */
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Business extends CI_Controller {
    private $data = array();
    private $menu = array('active' => 'home');
    private $cart_option = array('target' => 'business/order/cart/checkout','submit_label' => 'Checkout','step' => '1');
public function __construct(){
    parent::__construct();
    $this->load->library('session');
    $this->load->model('business/model_business','model_business');
    $this->data['account_info'] =  $this->model_business->getCurrent($this->session->userdata('userid'));
    
    $_active = $this->uri->segment(2);
    $this->menu['active'] = empty($_active)?'home':$_active;
    $this->data['menu'] = $this->load->view('business/menu',$this->menu,true);
    //echo $this->menu['active'];
   
}
function index(){
    $this->menu['active'] = 'home';
    $this->data['title'] = 'Administration Panel';
    $this->template->load('default', 'business/home', $this->data);
}

function order(){
    //print_r($_POST);
   // print_r($this->input->post());
    $this->menu['active'] = 'order';
    $this->data['title'] = 'Administration Panel';
    $_template = 'business/order';
    $_cart_action = $this->uri->segment(4);
    if(!empty($_cart_action)){
        
        switch ($_cart_action){
        case 'insert':
            $this->form_validation->set_message('required', '* Required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $this->form_validation->set_rules('driver_first', 'First Name', 'required');
            $this->form_validation->set_rules('driver_middle', 'Middle Name', 'required');
            $this->form_validation->set_rules('driver_last', 'Last Name', 'required');
            $this->form_validation->set_rules('driver_state', 'State', 'required','Please Select State');
            $this->form_validation->set_rules('driver_license_no', 'License Number', 'required');
            $this->form_validation->set_rules('driver_dob', 'Date of birth', 'required');
                if($this->form_validation->run()==FALSE){
                }else{
                $_price = $this->model_state->getPriceState($this->input->post('driver_state'));

                $item= array(
                           'id'             => mktime(),
                           'qty'            => 1,
                           'name'           => 'mvr',
                           'first_name'     =>  $this->input->post('driver_first'),
                           'middle_name'    => $this->input->post('driver_middle'),
                           'last_name'      => $this->input->post('driver_last'),
                           'state'          => $this->input->post('driver_state'),
                           'license_no'     => $this->input->post('driver_license_no'),
                           'date_of_birth'  => $this->input->post('driver_dob'),
                           'price'          => $_price[0]->price
                        );
                $_rowid = $this->input->post('rowid');
                if(!empty($_rowid) && $_rowid != ''){
                    $item['rowid'] = trim($this->input->post('rowid'));
                    $this->mvr_cart->update($item);
                    redirect(base_url('business/cart'));
                }else{
                    $this->mvr_cart->insert($item);
                    redirect(base_url('business/order'));
                }
                }
            break;
        case 'delete':
            $_id = $this->uri->segment(5);
            $item = array('rowid' => $_id,'qty' => 0);
            $this->mvr_cart->update($item);
            redirect(base_url('business/order'));
            break;
        case 'edit':
            $_id = $this->uri->segment(5);
            $_template = 'business/cart_edit';
            $_carts = $this->mvr_cart->contents();
            $this->data['cart_edit'] = $_carts[$_id];
            break;
        case 'checkout':
            //print_r($this->input->post());
            $_checkout = $this->input->post('checkout');
            //echo $_checkout;die;
            if($_checkout=='2'){
              $this->load->library('authorize_net');
              $autho_net = $this->session->userdata('autho_data');
              $this->authorize_net->setData($autho_net);
              if( $this->authorize_net->authorizeAndCapture() )
		{
                        $this->load->model('business/model_orders');
                        $order = new model_orders();
                        $order->business_account_id = $this->session->userdata('userid');
                        $order->amount = $autho_net['x_amount'];
                        $order->transaction_id = $this->authorize_net->getTransactionId();
                        $order->approval_code = $this->authorize_net->getApprovalCode();
                        $_order_id = $order->save();
                        $this->load->model('business/model_employees');
                        $employee = new model_employees();
                        $_items = $this->mvr_cart->contents();
                        foreach ($_items as $_item){
                        $employee->business_order_id = $_order_id;
                        $employee->first_name = $_item['first_name'];
                        $employee->middle_name = $_item['middle_name'];
                        $employee->last_name = $_item['last_name'];
                        $employee->state = $_item['state'];
                        $employee->license_number = $_item['license_no'];
                        $employee->date_of_birth = $_item['date_of_birth'];
                        $employee->remarks = 'OK';
                        $employee->status = 'Success';
                        $employee->save();
                        }
                        redirect(base_url('business/order/checkout/success'));
		}
		else
		{
			//echo '<h2>Fail!</h2>';
			// Get error
			//echo '<p>' . $this->authorize_net->getError() . '</p>';
			// Show debug data
			//$this->authorize_net->debug();
                        $this->data['order_status'] =   'error';
                        $this->data['order_status_message'] = 'Problem With Transaction';
                        $this->data['order_response_details'] = $this->authorize_net->getError();
                        $_template = 'business/success_order';
		}
            }else{
                    $_continue1 = $this->input->post('continue1');
                    $_template = 'business/checkout1';
                    if(!empty($_continue1) && $_continue1 != ''){
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    $this->form_validation->set_message('required', '* Required');
                    $this->form_validation->set_rules('card_type', 'Card Type', 'required');
                    $this->form_validation->set_rules('card_holder', 'Card Holder Name', 'required');
                    $this->form_validation->set_rules('card_number', 'Card Number', 'callback_ccnovalid');
                    $this->form_validation->set_rules('cvv', 'CVN CardN umber', 'callback_cvnnovalid');
                    $this->form_validation->set_rules('cc_exp_month', 'Expiration Month', 'required');
                    $this->form_validation->set_rules('cc_exp_year', 'Expiration Year', 'required');
                    $this->form_validation->set_rules('store', 'Store Credit Card', 'required');
                    $this->form_validation->set_rules('agreement', 'Agreement', 'required');
                    }
                    $_curent_user = $this->model_business->getCurrent($this->session->userdata('userid'));
                    $fcc_ex_mo = $this->input->post('cc_exp_month');
                    $fcc_ex_yr = $this->input->post('cc_exp_year');

                    $cc_exp_date =  date('m/y',mktime(0,0,0,$fcc_ex_mo,0,$fcc_ex_yr));

                    if($this->form_validation->run()==FALSE){
                        }else{
                            $autho_data = array(
                              'x_card_num'          =>   $this->input->post('card_number'),
                              'x_exp_date'          =>   $cc_exp_date,
                              'x_card_code'         =>   $this->input->post('cvv'),
                              'x_description'       =>   'MVR Transaction',
                              'x_amount'            =>   $this->mvr_cart->total(),
                              'x_first_name'        =>   $_curent_user[0]->first_name,
                              'x_last_name'         =>   $_curent_user[0]->last_name,
                              'x_address'           =>   $_curent_user[0]->address1. ', '.$_curent_user[0]->address2,
                              'x_city'              =>   $_curent_user[0]->city,
                              'x_state'             =>   $_curent_user[0]->state,
                              'x_zip'               =>   $_curent_user[0]->zip_code,
                              'x_country'           =>   'US',
                              'x_phone'             =>   $_curent_user[0]->phone,
                              'x_email'             =>   $_curent_user[0]->email,
                              'x_email'             =>   $_curent_user[0]->email,
                              'x_customer_ip'       =>   $this->input->ip_address(),
                            );
                            $this->session->set_userdata('autho_data',$autho_data);
                            $cc_info = $this->input->post();
                            unset($cc_info['submit']);
                            $cc_info['cc_exp_date'] = $cc_exp_date;
                            $this->data['cc_info'] = $cc_info;
                            $this->cart_option['submit_label'] = 'Place Order';
                            $this->cart_option['step'] = '2';
                            $_template = 'business/checkout2';
                        }
                    }
            break;
        case 'success':
            $this->data['order_status'] =   'success';
            $this->data['order_status_message'] =  'Thank you! Your order has been placed.';
            $this->data['order_response_details'] = 'We will email you soon!';
            $_template = 'business/success_order';
            break;
        case 'faild':
            
            break;
        default : 
        }
    }
    $this->data['cart'] = $this->load->view('business/cart',$this->cart_option,true);
    $this->template->load('default', $_template, $this->data);
 
}

function employees(){
    $this->menu['active'] = 'employees';
    $this->data['title'] = 'Administration Panel';
    $this->load->model('business/model_employees');
    $_employees = $this->model_employees->getByBusinessAccount($this->session->userdata('userid'));
    $this->data['employees'] = $_employees;
    $this->template->load('default', 'business/employees', $this->data);
}
 
function history(){
    $this->menu['active'] = 'history';
    $this->data['title'] = 'Administration Panel';
    $this->load->model('business/model_orders');
    $_orders = $this->model_orders->getByBusinessAccount($this->session->userdata('userid'));
    $this->data['orders_history'] = $_orders;
    $this->template->load('default', 'business/history', $this->data);
}
    
function account(){
    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
    $this->form_validation->set_message('required', '* Required');
    $this->form_validation->set_rules('new_password', 'Password', 'required|matches[new_password_v]');
    $this->form_validation->set_rules('new_password_v', 'Password Confirmation', 'required');
    $this->form_validation->set_rules('bus_contact_first', 'Contact First Name', 'required');
    $this->form_validation->set_rules('bus_contact_last', 'Contact Last Name', 'required');
    $this->form_validation->set_rules('bus_name', 'Business Name', 'required');
    $this->form_validation->set_rules('bus_state', 'State', 'required');
    $this->form_validation->set_rules('bus_zip', 'Zip Code', 'required');
    $this->form_validation->set_rules('bus_phone', 'Phone', 'required');
    $this->form_validation->set_rules('bus_email', 'Email', 'required');
    $this->form_validation->set_rules('bus_delivery', 'Type of Delivery', 'required');
     if($this->form_validation->run()==FALSE){
    }else{
       $this->load->model('business/model_business');
       $_acct = new Model_Business();
       $_acct->id = $this->session->userdata('userid');
       $_acct->account_name = $this->input->post('account_name');
       $_acct->password = $this->input->post('new_password');
       $_acct->first_name = $this->input->post('bus_contact_first');
       $_acct->last_name = $this->input->post('bus_contact_last');
       $_acct->business_name = $this->input->post('bus_name');
       $_acct->address1 = $this->input->post('bus_address1');
       $_acct->address2 = $this->input->post('bus_address2');
       $_acct->city = $this->input->post('bus_city');
       $_acct->state = $this->input->post('bus_state');
       $_acct->zip_code = $this->input->post('bus_zip');
       $_acct->phone = $this->input->post('bus_phone');
       $_acct->fax  = $this->input->post('bus_fax');
       $_acct->email = $this->input->post('bus_email');
       $_acct->business_type = $this->input->post('bus_type');
       $_acct->delivery_method = $this->input->post('bus_delivery');
       $_acct->save();
       redirect(base_url('business/account'));
    }
    $this->menu['active'] = 'account';
    $this->data['title'] = 'Administration Panel';
    $this->template->load('default', 'business/account', $this->data);
}
    
function cart(){
    $this->menu['active'] = 'cart';
    $this->data['title'] = 'Administration Panel';
    $this->data['submit_label'] = 'Checkout';
    $this->data['step'] = '1';
    $this->data['target'] = $this->cart_option['target'];
    $this->data['cart_header1'] = 'Account Home';
    $this->data['cart_header1_content'] = 'Your shopping cart contains information for your current order, including the employee.s name, license number, and the cost of the order. Your shopping cart will also provide you with action items to help guide you through the ordering process.';
    $this->data['cart_header2'] = 'Shopping Cart';
    $this->template->load('default', 'business/cart', $this->data);
}

function support(){
    $this->menu['active'] = 'support';
    $this->data['title'] = 'Administration Panel';
    $this->template->load('default', 'business/support', $this->data);
}
function logout(){
    $this->session->sess_destroy();
    redirect(base_url('business'));
}
function signin(){
    $this->template->load('login', null, null);
}    
function signup(){
    //$this->load->model('business/model_business');
    //$_acct = new Model_Business();
    $this->data['title'] = 'Signup Business Account';
    $step = $this->input->post('step');
    switch ($step){
      case '1':
          $this->template->load('signup', 'business/signup1', $this->data);
          break;
      case '2':
          //var_dump($this->input->post());
          $_template = 'business/signup2';
            $this->form_validation->set_error_delimiters('', '');
            $this->form_validation->set_rules('business_account', 'Business Account', 'required');
            $this->form_validation->set_rules('business_password', 'Password', 'required|matches[business_password_v]');
            $this->form_validation->set_rules('business_password_v', 'Password Confirmation', 'required');
            if($this->form_validation->run()==FALSE){
                    $_template = 'business/signup1';
                }else{
                    $_step1 = $this->input->post();
                    $this->session->set_userdata('data_step1', $_step1);
                }
            
            $this->template->load('signup', $_template, $this->data);
            break;
      case '3':
          //var_dump($this->input->post());
          $_template = 'business/signup3';
          $this->form_validation->set_error_delimiters('', '');
           $this->form_validation->set_rules('bus_contact_first', 'Contact First Name', 'required');
           $this->form_validation->set_rules('bus_contact_last', 'Contact Last Name', 'required');
           $this->form_validation->set_rules('bus_name', 'Business Name', 'required');
           $this->form_validation->set_rules('bus_state', 'State', 'callback_state_validate');
           $this->form_validation->set_rules('bus_zip', 'Zip Code', 'required');
           if($this->form_validation->run()==FALSE){
                $_template = 'business/signup2';
            }else{
                $_step2 = $this->input->post();
                $this->session->set_userdata('data_step2', $_step2);
            }
          $this->load->helper('captcha');
          $word = 'ABCDEF';
          $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $str = '';
          for ($i = 0; $i < 7; $i++)  {  $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);  } $word = $str;

          $vals = array(
            'word' => $word,
            'img_path'	 =>  $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/captcha/',
            'img_url'	 => base_url().'assets/captcha/',
            'font_path'	 => $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/fonts/Capture it 2.ttf',
            'img_width'	 => '150',
            'img_height' => 30,
            'expiration' => 7200
            );
          $cap = create_captcha($vals);
          $this->data['captcha'] =  $cap['image'];
          $this->session->set_userdata('word', $cap['word']);
          $this->template->load('signup', $_template, $this->data);
          break;
      case '4':
           $_template = 'business/signup4';
           $this->form_validation->set_error_delimiters('', '');
           $this->form_validation->set_rules('bus_phone', 'Phone number', 'trim|required');
           $this->form_validation->set_rules('bus_email', 'Email address', 'trim|required|valid_email');
           $this->form_validation->set_rules('bus_type', 'Business type', 'trim|required');
           $this->form_validation->set_rules('bus_delivery', 'Delivery Method', 'trim|required');
           $this->form_validation->set_rules('security_code', 'Captcha', 'callback_checkCaptcha');
           if($this->form_validation->run()==FALSE){
                $_template = 'business/signup3';
            }else{
                $_step3 = $this->input->post();
                //$this->session->set_userdata('data_step3', $_step3);
                
                $_data_step1 = $this->session->userdata('data_step1');
                $_data_step2 = $this->session->userdata('data_step2');
                
                $this->load->model('business/model_business');
                
                $_new_account = new Model_Business();
                $_new_account->account_name = $_data_step1['business_account'];
                $_new_account->password = $_data_step1['business_password'];
                $_new_account->first_name = $_data_step2['bus_contact_first'];
                $_new_account->last_name = $_data_step2['bus_contact_last'];
                $_new_account->business_name = $_data_step2['bus_name'];
                $_new_account->address1 = $_data_step2['bus_address1'];
                $_new_account->address2 = $_data_step2['bus_address2'];
                $_new_account->city = $_data_step2['bus_city'];
                $_new_account->state = $_data_step2['bus_state'];
                $_new_account->zip_code = $_data_step2['bus_zip'];
                $_new_account->phone = $_step3['bus_phone'];
                $_new_account->fax = $_step3['bus_fax'];
                $_new_account->email = $_step3['bus_email'];
                $_new_account->business_type = $_step3['bus_type'];
                $_new_account->delivery_method = $_step3['bus_delivery'];
                //$_new_account->save();
                $this->session->set_userdata('userid', $_new_account->save());
                redirect(base_url('business'));
            }
            $this->load->helper('captcha');
            $word = 'ABCD';
            $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $str = '';
            for ($i = 0; $i < 4; $i++)  {  $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);  } $word = $str;

            $vals = array(
              'word' => $word,
              'img_path'	 =>  $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/captcha/',
              'img_url'	 => base_url().'assets/captcha/',
              'font_path'	 => $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/fonts/PlAGuEdEaTH.ttf',
              'img_width'	 => '150',
              'img_height' => 30,
              'expiration' => 7200
              );
            $cap = create_captcha($vals);
            $this->data['captcha'] =  $cap['image'];
            $this->session->set_userdata('word', $cap['word']);
            $this->template->load('signup', $_template, $this->data);
            break;
      default :
           $this->template->load('signup', 'business/signup1', $this->data);
    }

}
function success(){
    
}
function ccnovalid($val){
    $this->load->library('cc_validation');
    $validate = $this->cc_validation->validateCreditcard_number($val);
    if($validate['status']=='false'){
         $this->form_validation->set_message('ccnovalid', 'Invalid Credit Card Number');
         return FALSE;
    }else{
        return TRUE;
    }

}
        
function cvnnovalid($val){
    $this->load->library('cc_validation');
    $validate = $this->cc_validation->validateCVV($this->input->post('fCreditCardNumber'),$val);
    if($validate=='false'){
         $this->form_validation->set_message('cvnnovalid', 'Invalid CVV Number');
         return FALSE;
    }else{
        return TRUE;
    }

}

function checkCaptcha($val){
    $_word = $this->session->userdata('word');
    if($val != $_word){
        $this->form_validation->set_message('checkCaptcha', 'Invalid Code!');
         return FALSE;
    }else{
        return TRUE;
    }

}
function state_validate($selectValue)
{
    // 'none' is the first option and the text says something like "-Choose one-"
    if($selectValue == 'none' || $selectValue == '')
    {
        $this->form_validation->set_message('state_validate', 'State field is required!');
        return false;
    }
    else // user picked something
    {
        return true;
    }
}

function newcaptcha(){
    $this->load->helper('captcha');
    $word = 'ABCD';
    $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $str = '';
    for ($i = 0; $i < 4; $i++)  {  $str .= substr($pool, mt_rand(0, strlen($pool) -1), 1);  } $word = $str;

    $vals = array(
      'word' => $word,
      'img_path'	 =>  $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/captcha/',
      'img_url'	 => base_url().'assets/captcha/',
      'font_path'	 => $_SERVER['DOCUMENT_ROOT'].'/instant-mvr/system/assets/fonts/PlAGuEdEaTH.ttf',
      'img_width'	 => '150',
      'img_height' => 30,
      'expiration' => 7200
      );
    $cap = create_captcha($vals);
    $this->session->set_userdata('word', $cap['word']);
    echo $cap['image'];
}
    
}

?>
