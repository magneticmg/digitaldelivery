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

class ComDigitalDeliveryDispatcher extends ComDefaultDispatcher {

    protected function _initialize(KConfig $config) {
        $config->append(array(
            'controller' => 'orders'
        ));
        parent::_initialize($config);
    }

    /**
     * In the front end a user should not be able to see orders unless they are logged in.
     * 
     * @param KCommandContext $context
     * @return type
     */
    function _actionDispatch(KCommandContext $context) {

        
        return parent::_actionDispatch($context);
    }

}
