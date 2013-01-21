<?php

/* ==========================================================================*\
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
  \*========================================================================== */

class ComDigitalDeliveryModelProducts extends ComDigitalDeliveryModelDefault {

    function __construct(KConfig $config) {
        parent::__construct($config);
        $this->getState()->insert('buyer_email', 'email');
        
    }
    function getList() {

        if (!$this->_list && $this->_state->buyer_email) {

            $this->_list = $this-> // join orders model on product_id 
                    _processJoin("com://admin/digitaldelivery.model.orders", 'product_id', 'id');
        } else {
            $this->_list = parent::getList();
        }
        return $this->_list;
    }

}

