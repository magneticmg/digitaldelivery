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

class ComDigitalDeliveryControllerProduct extends ComDefaultControllerDefault {

    /**
     * In the front end a user will get a download link if they are logged in and purchased already. 
     * 
     * @param KCommandContext $context
     * @return type
     */
    function _actionGet(KCommandContext $context) {


        if ($email = JFactory::getUser()->email) {
            // set the buyer email state
            $this->buyer_email = $email;
        }

        return parent::_actionGet($context);
    }

}