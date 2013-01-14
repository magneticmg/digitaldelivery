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

class ComDigitalDeliveryControllerOrder extends ComDefaultControllerDefault {

    /**
     * In the front end a user should not be able to see orders unless they are logged in.
     * 
     * @param KCommandContext $context
     * @return type
     */
    function _actionGet(KCommandContext $context) {


        if (!$email = JFactory::getUser()->email) {
            $url = KRequest::url();
            
            $option = (JVERSION < 1.6) ? "com_user" : "com_users"; 
            JFactory::getApplication()->redirect("index.php?option=$option&view=login&return=" . base64_encode($url), JText::_("LOGIN"));
        }
        // set the buyer email state
        $this->buyer_email = $email;
 
        return parent::_actionGet($context);
    }

}