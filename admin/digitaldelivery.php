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
if(!defined('KOOWA')) {
    JError::raiseWarning(0, JText::_("Koowa wasn't found. Please install the Koowa plugin and enable it."));
    return;
}

//if (KRequest::get('get.view', 'string') == '') KRequest::set('get.view', 'users');
KLoader::loadIdentifier('com://admin/digitaldelivery.load');


echo KService::get('com://admin/digitaldelivery.dispatcher')->dispatch();
