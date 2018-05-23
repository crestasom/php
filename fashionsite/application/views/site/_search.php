<h3>Search Result for "<?php echo $searchKey?>"</h3>
<div class="category-tab"><!--category-tab-->
        <div class="col-sm-12">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#product" data-toggle="tab">Product</a></li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade active in" id="product" >
        <?php
        if($productSearch):
           // echo '<pre>';
            //var_dump($productSearch);exit;
        foreach($productSearch as $rows):?>
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                    <div class="productinfo text-center">
                        <?php $images=  explode(",",$rows->image);?>
                        
                        <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" alt="" />
                        <h2><?php echo $rows->price?></h2>
                        <p><?php echo $rows->title?></p>
                        <a href="<?php echo LINK_URL."product/view/".$rows->url ;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Detail</a>
                    </div>
                    <div class="product-overlay">
                        <div class="overlay-content">
                            <h2><?php echo $rows->price?></h2>
                            <p><?php echo $rows->title?></p>
                             <a href="<?php echo LINK_URL."product/view/".$rows->url ;?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;
        else:?>
                <h4>No Product found.<a href="<?php echo LINK_URL?>site/index">  Return To Home</a></h4>
                    <?php endif;?>
                    
        
            </div>

            <div class="tab-pane fade" id="manufacturer" >
                <?php if($manuSearch):
                foreach($manuSearch as $row):?>
                <li>
                    <a href="<?php echo LINK_URL?>manufacturer/view/<?php echo $row->url?>">
                        <img src="<?php echo $row->image?>"<br>
                    </a>
                </li>
                <?php endforeach;
                else:?>
                <h4>No Manufacturer found.<a href="<?php echo LINK_URL?>site/index">  Return To Home</a></h4>
                    <?php endif;?>
            </div>

            <div class="tab-pane fade" id="category" >
                <?php if($catSearch):
                foreach($catSearch as $row):?>
                <li>
                    <a href="<?php echo LINK_URL . "category/view/" . $category->getCatUrl($row->category_id) . "/" . $row->url ?>">
                        <h2> <?php echo ucfirst($category->getCatUrl($row->category_id)." ".$row->url)?></h2>
                    </a>
                </li>
                <?php endforeach;
                else:?>
                <h4>No Category found.<a href="<?php echo LINK_URL?>site/index">  Return To Home</a></h4>
                    <?php endif;?>
            </div>
        </div>
    </div><!--/category-tab-->