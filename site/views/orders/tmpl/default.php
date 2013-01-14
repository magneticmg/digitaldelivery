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

?>
<style type="text/css">
    .order-download, .order-info, .order-id { float: left; padding-right: 15px;}
    .order-info { width: 450px}
    .order { padding-top: 25px;}
    .product_name { font-weight: bold;}
</style>
<div><h2 class="title"><?= @text("DD_ORDERS") ?></h2></div>
<div id="orders">
   <? foreach($orders as $order) :?>
    <div class="order">
    
        
    <div id="order<?= $order->id ?>" class="order-id"><label>
          <?= @text("DD_ORDER_ID") ?>
        </label>:<?= $order->id ?></div>
        <div class="order-info">
    <div id="order<?= $order->product_id ?>" class="product_name">
        <label>
          <?= @text("DD_PRODUCT_NAME") ?>
        </label>:
        <?= $products->{$order->product_id}->name ?>
    </div>
    <div class="product_price"><label><?= @text("DD_PRICE") ?></label>:<?= $products->{$order->product_id}->price ?> <?= $products->{$order->product_id}->currency_code ?> </div>
    <!--<div class="product_name"><?= $order->buyer_name ?></div>-->
    <div class="product_update">
        <label><?= @text("DD_LASTUPATE") ?></label>:
                <?= $order->updated_at ?>
    </div>
    </div>
    <div id="order" class="order-download readon">
        <a href="<?= $order->download_url; ?>" 
           class="button">
                 <?= @text("DOWNLOAD") ?>
        </a>
    </div>
    </div>
    <div style="clear: both"></div>
     <?php endforeach; ?>
</div>    
        
    
    
    

