<div class="col-sm-9 padding-right" id="page">
    <div id="forAjaxMessage">&nbsp;</div>
     <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">featured items</h2>

        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">	
                    <?php $data=$product->getTopProducts('6');
                    $i=0;
                    while($i<3):
                        
?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $images=  explode(",",$data[$i]->image);?>
                                    <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" alt="" width="50" />
                                    <h2><?php echo $data[$i]->price;?></h2>
                                    <p><?php echo $data[$i]->title; ?></p>
                                    <a href="<?php echo LINK_URL."product/view/".$data[$i]->url ;?>.html" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    endwhile; ?>
                </div>
                <div class="item">	
                    <?php while($i<6):
?>
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <?php $images=  explode(",",$data[$i]->image);?>
                                    <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" alt="" width="50" />
                                    <h2><?php echo $data[$i]->price;?></h2>
                                    <p><?php echo $data[$i]->title; ?></p>
                                    <a href="<?php echo LINK_URL."product/view/".$data[$i]->url ;?>.html" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Detail</a>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php
                    $i++;
                    endwhile; ?>
                </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>			
        </div>
    </div><!--/recommended_items-->
    <div class="features_items"><!--features_items-->
        <h2 class="title text-center">Latest Items</h2>
        <?php foreach($product->getLatest('6') as $data): ?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <?php $images=  explode(",",$data->image);?>
                        
                        <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" alt="" />
                        <h2><?php echo $data->price; ?></h2>
                        <p><?php echo $data->title;?></p>
                    </div>
                    <input type="hidden" id="quantity" value="1">
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2><?php echo $data->price; ?></h2>
                            <p><?php echo $data->title;?></p>
                            <a href="<?php echo LINK_URL."product/view/".$data->url ;?>.html" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       <?php endforeach;?>

    </div><!--features_items-->

    

   

</div>
</div>
</div>
</section>
