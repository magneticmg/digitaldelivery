<?php

/* ==========================================================================*\
  || ######################################################################## ||
  || # MMInc PHP                                                            # ||
  || # Project: DigitalDeliveryBack                                             # ||
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

class ComDigitaldeliveryDatabaseConnection {

    /**
     * Move this to a joomla param/field
     * @var type 
     */
    static $connection = array(
        'host' => '',
        'user' => '',
        'password' => '',
        'request_format' => '',
        'scheme' => ''
    );

    function __get($key) {

        if (isset(self::$connection[$key])) {
            return self::$connection[$key];
        }
    }

    function getConnectionInfo() {

        $connectionInfo = new KObject();
        foreach (self::$connection as $key => $value) {
               
            $connectionInfo->set($key, $value);
        }
        
        return $connectionInfo;
    }

}
