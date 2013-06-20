<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of model_admin_login
 *
 * @author alps
 */
class model_admin_login extends CI_Model{
    //put your code here
    function __construct() {
        parent::__construct();
    }
    
public function verify_account($user_name, $_password)
   {
      $query = $this
            ->db
            ->where('user_name', $user_name)
            ->where('password', $_password)
            ->limit(1)
            ->get('admin_login');

      if ( $query->num_rows > 0 ) {
         // person has account with us
         return $query->row();
      }
      return false;
   }
}

?>
