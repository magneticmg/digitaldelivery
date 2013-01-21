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

    function getList() {
        if (!$this->_list) {

                
            $this->_list = $this->_processJoin("com://admin/digitaldelivery.model.products");
//            $list = parent::getList();
//            /**
//             *  We are going to append the products here. 
//             */
//            
//            $products = $this->getService("com://admin/digitaldelivery.model.products");
//            $productlist = $products->getList();
//            
//               /**
//                * Essentially a join on products.id = orders.product_id
//                */
//            while ($list->valid()){
//                 
//                $item = & $list->current();
//                $on = 'product_id';
//                $data = array_shift($productlist->find(array('id' => $item->$on))->getData());
//               
//                $order->setData(array_merge($data, $order->getData()));
//               
//                $list->next(); 
//            }
//            $this->_list = $list;
//              
            
        }
        return $this->_list;
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

