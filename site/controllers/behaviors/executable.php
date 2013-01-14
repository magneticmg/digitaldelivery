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
class ComDigitalDeliveryControllerBehaviorExecutable extends KControllerBehaviorExecutable {
    
    function canBrowse(){
        
        
       if(!JFactory::getUser()->email){
//           $url = KRequest::url();
//           
//           $this->setRedirect("index.php?option=com_users&view=login&return=" .  base64_encode($url), JText::_("LOGIN"));
//           $this->redirect();
           return false;
       }
       return true;
        
    }
}
