<?php
$product=$manufacturer->findAllByPagination($sqls,$url);
//echo '<pre>';
//print_r($product);exit;
?> 
<div class="features_items"><!--features_items-->
        <h2 class="title text-center"><?php echo $manufacturerInfo->title; ?></h2>
        <?php
        foreach($product['allRecords'] as $rows):?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <?php $images=  explode(",",$rows->image);?>
                        
                        <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" alt="" />
                        
                        <h2><?php echo $rows->price?></h2>
                        <p><?php echo $rows->title?></p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2><?php echo $rows->price?></h2>
                            <p><?php echo $rows->title?></p>
                             <a href="<?php echo LINK_URL."product/view/".$rows->url ;?>.html" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        <br>
        
    </div><!--features_items-->
    <div class="title text-center"><b><?php echo $product['pagination'];?></b></div>