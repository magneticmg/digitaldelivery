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
//TODO: Use default_products.php for alternative layout support
$date = new JDate;
if(JVERSION < 1.6){
    $today = $date->toMySQL();
} else {
    $today = $date->toSQL();   
}

?>
<style src="media://com_digitaldelivery/css/digitaldelivery.css" />
<div>  
    <h2 class="title"><?= @text("DD_PRODUCTS") ?></h2></div>
<div id="ddproducts">
<? foreach($products as $product) :?>
    
<? //$product = $product->product; // do this somewhere else?>

    <div id="product-<?= $product->id ?>" class="product-block">
        <div class="product-info">
        <div class="product-name"><?= $product->name ?></div>
        <div class="product-file"><?= $product->attachment->filename ?></div>
        <div class="product-price"><?= "$product->currency_code $product->price" ?></div>
</div>
        <div class="button buy">
            <?  if($product->product_id && $product->download_url && ($product->valid_until > $today)) : ?>
                <a class="btn-primary button" href="<?= $product->download_url ?>">
                <?= @text("DOWNLOAD") ?></a> 
                <div class="smaller italic" style="margin-top: 10px;"><?= @text('DD_HAVEALREADYPURCHASED')?></div>
            <? else: ?>
               <a class="btn-primary" href="<?= $product->instant_buy_url ?>"><?= @text("BUYNOW") ?></a>
            <? endif; ?>
            
        </div>
    </div>
    <div style="clear: both"></div>
<? endforeach; ?>
</div>
