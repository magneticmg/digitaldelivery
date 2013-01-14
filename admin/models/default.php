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

class ComDigitalDeliveryModelDefault extends KModelAbstract {

    function __construct(KConfig $config = null) {
        parent::__construct($config);
    }

    /**
     * Override the KModelAbstract get list. 
     * TODO: move the directdelivery api here and make a model instead 
     * @return type
     */
    function getList() {

        if (!$this->_list) {

            $api = KService::get("com://admin/digitaldelivery.libs.digitaldelivery", array('request' => $this->_state->toArray()));
            $service = $this->getIdentifier()->name;
            $this->_list = $api->read($service);
        }

        return parent::getList();
    }

    function getTotal() {

        if (!$this->_total)
            $this->_total = count($this->getList());

        return $this->_total;
    }

}
