 <div class="features_items"><!--features_items-->
     <?php 
     $product=$products->findAllByPagination($sqls,$mainUrl,$url);
     //echo '<pre>';
     //print_r($product);exit;?>
        <h2 class="title text-center"><?php echo $category->getCatTitleFull($categoryInfo->id); ?></h2>
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
        <div class="clear">
        <div><b><?php echo $product['pagination'];?></b></div> 
        </div>
    </div><!--features_items-->