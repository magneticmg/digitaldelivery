<?php

/*==========================================================================*\
 || ######################################################################## ||
 || # MMInc PHP                                                            # ||
 || # Project: NewStoreDigitalDelivery                                             # ||
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
class ComDigitalDeliveryModelOrders extends ComDigitalDeliveryModelDefault {
 
    function __construct(KConfig $config = null) {
        parent::__construct($config);
        $this->_state->insert('buyer_email','email');
        
        
    }
    function _initialize(KConfig $config)
    {
        
       
     //   $config->append();
        parent::_initialize($config);
    }
}

