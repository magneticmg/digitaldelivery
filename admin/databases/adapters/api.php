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

class ComDigitaldeliveryDatabaseAdapterApi extends KDatabaseAdapterAbstract {

    /**
     *  Run a query against the api. 
     *  Build the path part of the url from the query. 
     * @param type $query
     * @param type $mode
     * @param type $key
     * @return type
     */
    public function execute($query, $mode = KDatabase::FETCH_ARRAY_LIST, $key = '') {


        /**
         *  Psuedo steps: remove later.
         *  $query as a object
         *  $query->url 
         *  $query->path / service
         *  $query->params 
         *  $query->method // HTTP Verbs (GET/PUT/POST/DELETE) // KHttpRequest::{$query->method}
         * 
         *   $config = new KConfigState;
         *   $config->url = 
         *   $uri = $this->getService('koowa.http.uri');
         *   $uri->host = "api.digitaldelivery.com";
         *   $uri->user = $apiKey;
         *   $uri->pass = $secret;
         *   $uri->path = $query->path () /$service/$method
         *   $uri->query = $query->state stuff
         *   
         *   if we are putting posting $params = $query->params 
         *   $ch = curl_init($uri->__toString());
         *    
         *   curl_setopt_array($opts);
         *   
         *   execute should build the curl request
         *   
         */
       /*$
        *
        *  recently moved from default model. Makes more sence here. 
        */
        $this->_buildBaseUrl($query->url);

        $url = $query->url->__toString();
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        if ($query->method == KHttpRequest::POST) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        }

        $result = curl_exec($ch);

        curl_close($ch);

        if ($query->url->format == 'json') {

            $result = json_decode($result);
        }
        //TODO: Handle xml format as well. 
        $result = $this->process($result, $query->service);

        $rowset = $this->getService("com://admin/digitaldelivery.database.rowset.default", array('table' => false));
        $rowset->addData($result);

        return $rowset;

    }

    function getConnection() {
        static $connection;

        if (!isset($connection)) {
            $connection = ComDigitaldeliveryDatabaseConnection::getConnectionInfo();
        }
        return $connection;
    }

    /**
     * Build the base of the query. Moved form default model. 
     */
    function _buildBaseUrl(KHttpUrl $query) {

        $connection = $this->getConnection();
        
        $query->host = $connection->host; //"api.digitaldelivery.com";
        $query->user = $connection->user;
        $query->pass = $connection->password;
        $query->scheme = $connection->scheme;
        $query->format = $connection->request_format;
    }

    /**
     * Removing the service to return just the data instead of each row having 
     *  root element of the service. Better for rendering using the Framwork /Rows / Rowsets.
     * @param type $data
     * @param type $service
     * @return type
     */
    function process($data, $service) {
        $response = array();
        $service = KInflector::singularize($service);
        foreach ($data as $i => $datum) {
            $response[$datum->$service->id] = $datum->$service;
        }
        return $response;
    }

    
    /**
     * All the methods below this point are empty at the moment. Some are required 
     * as overrides of the parent abstract. 
     * 
     * @return \ComDigitaldeliveryDatabaseAdapterApi
     */
    function getDatabase() {
        return $this;
    }

    function setDatabase($database) {
        
    }

    function _fetchField($result, $key = 0) {
        return $result;
    }

    function _fetchFieldList($result, $key = 0) {
        
    }

    function _fetchArray($sql) {
        return $this->execute($sql);
    }

    function _fetchArrayList($result, $key = '') {

        return $result;
    }

    function _fetchObject($result) {
        return $result;
    }

    function _fetchObjectList($result, $key = '') {
        return $result;
    }

    function _parseTableInfo($info) {
        ;
        return $info;
    }

    function _parseColumnInfo($info) {

        return $info;
    }

    function _parseColumnType($spec) {

        return $spec;
    }

    function _quoteValue($value) {
        return $value;
        ;
    }

    function unlockTable() {
        return true;
    }

    function lockTable($base, $name) {
        return true;
    }

    function getTableSchema($table) {

        return array();
    }

    function isConnected() {
        return true;
    }

    function connect() {
        return $this;
    }

}