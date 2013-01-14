<?php

/*==========================================================================*\
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
 \*==========================================================================*/
  
class ComDigitalDeliveryViewOrdersHtml extends ComDigitalDeliveryViewHtml{

    protected function _initialize(KConfig $config)
    {
        
        parent::_initialize($config);
    }

    /**
     * Adding products to the view so we have access to the names for the orders
     * @return type
     */
    function display(){
        
        $products = KService::get("com://admin/digitaldelivery.model.products");
       
        $this->assign('products', $products->getData());
        
        return parent::display();
    }
    
}
