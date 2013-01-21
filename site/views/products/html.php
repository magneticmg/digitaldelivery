<?php

/* ==========================================================================*\
  || ######################################################################## ||
  || # MMInc PHP                                                            # ||
  || # Project: JFacebook_-_Koowa                                             # ||
  || #  $Id:  $                                                             # ||
  || # $Date:  $                                                            # ||
  || # $Author:  $                                                          # ||
  || # $Rev: $                                                              # ||
  || # -------------------------------------------------------------------- # ||
  || # @Copyright (C) 2010 - Cameron Barr, Magnetic Merchandising Inc.      # ||
  || # @license GNU/GPL http://www.gnu.org/copyleft/gpl.html                # ||
  || # -------------------------------------------------------------------- # ||
  || # http://www.magneticmerchandising.com  info@magneticmerchandising.com # ||
  ||                                                                          ||
  || # -------------------------------------------------------------------- # ||
  || ######################################################################## ||
  \*========================================================================== */

class ComDigitalDeliveryViewProductsHtml extends ComDigitalDeliveryViewHtml {

    protected function _initialize(KConfig $config) {

        parent::_initialize($config);
    }

    /**
     * Adding products to the view so we have access to the names for the orders
     * @return type
     */
    function _display() {

        
        // TODO: move to model and use state
        $validorders = $this->_getValidProductIds();
        
        
        $this->assign('validorders', $validorders);



        return parent::display();
    }

    function _getValidProductIds() {
        $product_ids = array();
        
        if ($email = JFactory::getUser()->email) {
            
            $orders = $this->getService("com://admin/digitaldelivery.model.orders");
            $orders->buyer_email($email);
            $orders = $orders->getData();
          
           
            $date = new JDate;
            foreach ($orders as $i => $order) {
                $orderDate = new JDate($order->valid_until);
                
                if ($date->toUnix() < $orderDate->toUnix()) {
                    $product_ids[$i] = $order->product_id;
                }
            }
        }
      
        return $product_ids;
    }

}
