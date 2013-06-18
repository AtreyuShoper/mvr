<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MVR_Cart
 *
 * @author alps
 */
if (!defined('BASEPATH'))  exit('No direct script access allowed');
class MVR_Cart extends CI_Cart{
    //put your code here
    var $product_id_rules	= '\.\:\-_ a-z0-9';
    function __construct($params = array()) {
        parent::__construct($params);
        $this->ci =& get_instance();
    }
    function update($items = array()) {
    // Was any cart data passed?
    if (!is_array($items) OR count($items) == 0) {
      return FALSE;
    }
 
    // You can either update a single product using a one-dimensional array,
    // or multiple products using a multi-dimensional one.  The way we
    // determine the array type is by looking for a required array key named "id".
    // If it's not found we assume it's a multi-dimensional array
    $save_cart = FALSE;
    if (isset($items['rowid']) AND isset($items['qty'])) {
      if ($this->_update($items) == TRUE) {
        $save_cart = TRUE;
      }
    } else {
      foreach ($items as $val) {
        if (is_array($val) AND isset($val['rowid']) AND isset($val['qty'])) {
          if ($this->_update($val) == TRUE) {
            $save_cart = TRUE;
          }
        }
      }
    }
 
    // Save the cart data if the insert was successful
    if ($save_cart == TRUE) {
      $this->_save_cart();
      return TRUE;
    }
 
    return FALSE;
  }
  // --------------------------------------------------------------------
 
  /**
   * Update the cart
   *
   * This function permits the quantity of a given item to be changed.
   * Typically it is called from the "view cart" page if a user makes
   * changes to the quantity before checkout. That array must contain the
   * product ID and quantity for each item.
   *
   * @access	private
   * @param	array
   * @return	bool
   */
  function _update($items = array()) {
    // Without these array indexes there is nothing we can do
    if (!isset($items['qty']) OR !isset($items['rowid']) OR !isset($this->_cart_contents[$items['rowid']])) {
      return FALSE;
    }
 
    // Prep the quantity
    $items['qty'] = preg_replace('/([^0-9])/i', '', $items['qty']);
 
    // Is the quantity a number?
    if (!is_numeric($items['qty'])) {
      return FALSE;
    }
 
    // Is the new quantity different than what is already saved in the cart?
    // If it's the same there's nothing to do
    //    if ($this->_cart_contents[$items['rowid']]['qty'] == $items['qty']) {
    //      return FALSE;
    //    }
 
    // Is the quantity zero?  If so we will remove the item from the cart.
    // If the quantity is greater than zero we are updating
    if ($items['qty'] == 0) {
      unset($this->_cart_contents[$items['rowid']]);
    } else {
      $this->_cart_contents[$items['rowid']] = $items;
 
      $this->_cart_contents[$items['rowid']]['options'] = array_merge($this->_cart_contents[$items['rowid']]['options'], $items['options']);
    }
 
    return TRUE;
  }
    
    
}

?>
