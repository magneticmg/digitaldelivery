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

class ComDigitalDeliveryModelOrders extends ComDigitalDeliveryModelDefault {

    function __construct(KConfig $config = null) {
        parent::__construct($config);

        $this->_state->insert('buyer_email', 'email')
                ->insert('valid_until', 'date')
                ->insert('state', 'word');
    }

    /**
     * TODO: Decide when to search 
     * 
     * @param KHttpUrl $url
     */
    function _buildRequestPath(KHttpUrl &$url) {

        parent::_buildRequestPath($url);
    }

    /**
     * 
     * @param KHttpUrl $url
     */
    function _buildRequestQuery(KHttpUrl &$url) {

        $state = $this->_state;
        $params = array();
        
        parent::_buildRequestQuery($url);
        
        if ($state->state) {
            $params['state'] = $state->state;
        }
        
        $query = array_merge($params, $url->getQuery(true));
        
        $url->setQuery($query);
        
    }

}

