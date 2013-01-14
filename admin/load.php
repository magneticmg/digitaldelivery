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
KLoader::loadIdentifier('com://admin/digitaldelivery.define');

require_once DDAPIPATH .'base'.DS . 'object.php';

require_once DDAPIPATH . 'digitaldelivery.php';
//require_once DDAPIPATH .'base'.DS . 'row.php';
//require_once DDAPIPATH .'base'.DS . 'rowset.php';

//$apiIdentifier = KService::getIdentifier('com://admin/digitaldelivery.api.digitaldelivery');
//gp($apiIdentifier, __FILE__);

KLoader::loadIdentifier('com://admin/digitaldelivery.model.default');
KLoader::loadIdentifier('com://site/digitaldelivery.mappings');
KLoader::loadIdentifier('com://admin/digitaldelivery.views.html');