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

class ComDigitalDeliveryLibsDigitaldelivery extends DObject { // DObject 

    protected $_domain;
    protected $_key;
    protected $_secret;
    protected $_format;
    protected $_service; // orders
    protected $_request;

    function __construct($config = array()) {

        parent::__construct($config);

        if (!isset($config['domain'])) {
            $this->_domain = "api.digitaldeliveryapp.com";
        }

        $this->_key = DDAPIKEY;
        $this->_secret = DDAPISECRET;
        $this->_format = 'json';
    }

    function _initialize(KConfig $config) {

        $this->request = $config->request;
        parent::_initialize($config);
    }

    /**
     * url: https://KEY:SECRET@api.digitaldeliveryapp.com/products 
     *    orders/search?email=#{buyer_email}
     *      scheme key:secret  @ domain service format
     * 
     *  Read should break up the arguments by
     *  params.
     *  $params[0] = '${service}, i.e. orders, products
     *  $params[1] = ${method} , i.e. index, search, show
     */
    function read(/* polymorphic */) {

        $params = func_get_args();


        $service = $params[0];
        $method = isset($params[1]) ? $params[1] : ''; // no method is 'index' 
        $query = isset($params[2]) ? $params[2] : array();

        $url = $this->buildUrl($service, $method);
        $response = $this->makeRequest($url, $this->request->toArray());
       
        if ($this->_format == 'xml') {
            
        } else if ($this->_format == 'json') {

            $result = json_decode($response);
        }

        $result = $this->process($result, $service);
        
        $return = $this->getService("com://admin/digitaldelivery.libs.data.rowset");
        $return->setData($result);
        return $return;
    }

    function process($data, $service){
        
        
        $response = array();
        $service = KInflector::singularize($service);
     
        foreach($data as $i => $datum){
            $response[$datum->$service->id] = $datum->$service;
        }
        
        return $response;
    }
    function buildUrl($service = 'orders', $method = null) {
        $format = $this->getFormat();

        if ($method) {
            // "products/search
            $service = "$service/$method";
        }
        if ($format) {

            $service = $service . $format;
        }

        $url = "http://{$this->get('_key')}:{$this->get('_secret')}@{$this->get('_domain')}/$service?{$this->getQuery()}";

        return $url;
    }

    function getQuery() {

        return http_build_query($this->request->toArray());
    }

    function getFormat() {
        if ($this->_format) {
            return ".{$this->_format}";
        } return '';
    }

    function makeRequest($url, $params) {

        $ch = curl_init($url);

        gp($url, __METHOD__);
        //curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_HEADER, 0);

        $result = curl_exec($ch);

        
        curl_close($ch);


        return $result;
    }

}
