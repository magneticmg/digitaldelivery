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
?>
<div id="products">
<? foreach($products as $product) :?>
    
<? $product = $product->product; // do this somewhere else?>

    <div id="product-<?= $product->id ?>">
        <div class="product-name"><?= $product->name ?></div>
        <div class="product-file"><?= $product->attachment->filename ?></div>
        <div class="product-price"><?= $product->price ?></div>

        <div class="button">
            <a class="btn-primary" href="<?= $product->instant_buy_url ?>"><?= @text("BUYNOW") ?></a>
        </div>
    </div>

<? endforeach; ?>
</div>
