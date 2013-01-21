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

    /**
     *  Method to take the identifier and optional join params and 'join' the 
     *  model results similar to a sql join. 
     * @param type $identifier
     * @param type $on
     * @param type $key
     * @return type
     * join($type, $table, $condition)
     */
    function _processJoin($identifier, $on = 'id', $key = false) {

        /**
         * This can obviously be part of $query->join logic for http    
         */
        if (!$key) {
            $objIdentifier = $this->getIdentifier($identifier);
            $slug = KInflector::singularize($objIdentifier->name);
            $key = "{$slug}_{$on}"; // specific to this api
        }

        
        $list = self::getList();

        $joinlist = $this->getService($identifier)->getList();

        while ($list->valid()) {

            $item = & $list->current();

            $data = array_shift($joinlist->find(array($on => $item->$key))->getData());
            
            if(!empty($data))
                $item->setData(array_merge($data, $item->getData()));

            
            $list->next();
        }

        return $list;
    }

    function getTotal() {

        if (!$this->_total)
            $this->_total = count($this->getList());

        return $this->_total;
    }

    /**
     * Moved to adapter
     * @param KHttpUrl $url
     */
    function _buildRequestBase(KHttpUrl &$url) {

        $url->host = $this->host; //"api.digitaldelivery.com";
        $url->user = $this->user;
        $url->pass = $this->password;
        $url->scheme = "http";
        $url->format = $this->request_format;
    }

    function _buildRequestQuery(KHttpUrl &$url) {
        
    }

    /**
     * Build the path based on the current model name. 
     * 
     * @param KHttpUrl $url
     */
    function _buildRequestPath(KHttpUrl &$url) {

        $service = $this->getIdentifier()->name;

        $url->path = "/$service";
    }

}
