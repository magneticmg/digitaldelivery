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

    
    /**
     * Override the KModelAbstract get list. 
     * TODO: move the directdelivery api here and make a model instead 
     * @return type
     */
    function getList() {

        if (!$this->_list) {

            
            $url = new KHttpUrl;
            //$this->_buildRequestBase($url);
            
            $this->_buildRequestPath($url);
            $this->_buildRequestQuery($url);
            
            $query = new KObject;
            $query->method = KHttpRequest::GET;
            $query->url = $url;
            $query->service = $this->getIdentifier()->name;
          
            $database = $this->getService('com://admin/digitaldelivery.database.adapter.api');
            
            $this->_list = $database->select($query, KDatabase::FETCH_ROWSET);
            

        }

        return parent::getList();
    }

    function getTotal() {

        if (!$this->_total)
            $this->_total = count($this->getList());

        return $this->_total;
    }
    
    function _buildRequestBase(KHttpUrl &$url){
        
            $url->host = $this->host;//"api.digitaldelivery.com";
            $url->user = $this->user;
            $url->pass = $this->password;
            $url->scheme = "http";
            $url->format = $this->request_format;
            
        
    }
    
    function _buildRequestQuery(KHttpUrl &$url){
        
                              
    }
    function _buildRequestPath(KHttpUrl &$url){
        
        $service = $this->getIdentifier()->name;
        $url->path = "/$service";
        
    }
    
    

}
