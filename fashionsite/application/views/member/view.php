<div class="main_bg">
    <div class="wrap">	
        <div class="main">
            <!-- start content -->
            <div class="single">
                <!-- start span1_of_1 -->
                <div class="left_content">
                    <div class="span1_of_1">
                        <!-- start product_slider -->
                        <div class="product-view">
                            <div class="product-essential">
                                <div class="product-img-box">
                                    <div class="product-image"> 
                                        <a class="cs-fancybox-thumbs cloud-zoom" rel="adjustX:30,adjustY:0,position:'right',tint:'#202020',tintOpacity:0.5,smoothMove:2,showTitle:true,titleOpacity:0.5" data-fancybox-group="thumb" href="images/0001-2.jpg" title="Women Shorts" alt="Women Shorts">
                                            <img src="<?php echo $product->image ?>" alt="Women Shorts" title="Women Shorts" />
                                        </a>
                                    </div>
                                    <script type="text/javascript">
                                        var prodGallery = jQblvg.parseJSON('{"prod_1":{"main":{"orig":"images/0001-2.jpg","main":"images/large/0001-2.jpg","thumb":"images/small/0001-2.jpg","label":""},"gallery":{"item_0":{"orig":"images/0001-2.jpg","main":"images/large/0001-2.jpg","thumb":"images/small/0001-2.jpg","label":""},"item_1":{"orig":"images/0001-1.jpg","main":"images/large/0001-1.jpg","thumb":"images/small/0001-1.jpg","label":""},"item_2":{"orig":"images/0001-5.jpg","main":"images/large/0001-5.jpg","thumb":"images/small/0001-5.jpg","label":""},"item_3":{"orig":"images/0001-3.jpg","main":"images/large/0001-3.jpg","thumb":"images/small/0001-3.jpg","label":""},"item_4":{"orig":"images/0001-4.jpg","main":"images/large/0001-4.jpg","thumb":"images/small/0001-4.jpg","label":""}},"type":"simple","video":false}}'),
                                                gallery_elmnt = jQblvg('.product-img-box'),
                                                galleryObj = new Object(),
                                                gallery_conf = new Object();
                                        gallery_conf.moreviewitem = '<a class="cs-fancybox-thumbs" data-fancybox-group="thumb" style="width:64px;height:85px;" href=""  title="" alt=""><img src="" src_main="" width="64" height="85" title="" alt="" /></a>';
                                        gallery_conf.animspeed = 200;
                                        jQblvg(document).ready(function () {
                                            galleryObj[1] = new prodViewGalleryForm(prodGallery, 'prod_1', gallery_elmnt, gallery_conf, '.product-image', '.more-views', 'http:');
                                            jQblvg('.product-image .cs-fancybox-thumbs').absoluteClick();
                                            jQblvg('.cs-fancybox-thumbs').fancybox({prevEffect: 'none',
                                                nextEffect: 'none',
                                                closeBtn: true,
                                                arrows: true,
                                                nextClick: true,
                                                helpers: {
                                                    thumbs: {
                                                        width: 64,
                                                        height: 85,
                                                        position: 'bottom'
                                                    }
                                                }
                                            });
                                            jQblvg('#wrap').css('z-index', '100');
                                            jQblvg('.more-views-container').elScroll({type: 'vertical', elqty: 4, btn_pos: 'border', scroll_speed: 400});

                                        });

                                        function initGallery(a, b, element) {
                                            galleryObj[a] = new prodViewGalleryForm(prods, b, gallery_elmnt, gallery_conf, '.product-image', '.more-views', '');
                                        }
                                        ;
                                    </script>
                                </div>
                            </div>
                        </div>
                        <!-- end product_slider -->
                    </div>
                    <!-- start span1_of_1 -->
                    <div class="span1_of_1_des">
                        <div class="desc1">
                            <h3><?php echo $product->title ?> </h3>
                            <h5>Rs. <?php echo $product->price; ?>
                                <div class="share-desc">
                                    <div class="share">
                                        <div class="btn_form">
                                            <form>
                                                <input type="submit" value="add to cart" title="" />
                                            </form>
                                        </div>
                                        <h4>Share Product :</h4>
                                        <ul class="share_nav">
                                            <li><a href="#"><img src="<?php echo PUBLIC_URL ?>images/facebook.png" title="facebook"></a></li>
                                            <li><a href="#"><img src="<?php echo PUBLIC_URL ?>images/twitter.png" title="Twiiter"></a></li>
                                            <li><a href="#"><img src="<?php echo PUBLIC_URL ?>images/rss.png" title="Rss"></a></li>
                                            <li><a href="#"><img src="<?php echo PUBLIC_URL ?>images/gpluse.png" title="Google+"></a></li>
                                        </ul>
                                    </div>
                                    <div class="clear"></div>
                                </div>
                        </div>
                    </div>
                    <div class="clear"></div>
                    <!-- start tabs -->
                    <section class="tabs">
                        <input id="tab-1" type="radio" name="radio-set" class="tab-selector-1" checked="checked">
                        <label for="tab-1" class="tab-label-1">overview</label>
                        <div class="clear-shadow"></div>

                        <div class="content">
                            <div class="content-1">
                                <p class="para top"><span><?php echo ucwords($product->title) ?></span><?php echo $product->detail; ?></p>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </section>
                    <!-- end tabs -->
                    <div class="main_bg">
                        <div class="wrap">	
                            <div class="main">
                                <h2 class="style top">related Products</h2>
                                <!-- start grids_of_3 -->
                                <div class="grids_of_3">
                                    <?php  foreach($productModel->getRelated($product->id,$product->category_id) as $row):?>
                                    <div class="grid1_of_3">
                                        <a href="details.html">
                                            <img src="<?php echo $row->image?>" alt=""/>
                                            <h3><?php echo $row->title; ?></h3>
                                            <div class="price">
                                                <h4>Rs. <?php echo $row->price ?></h4>
                                            </div>
                                            <span class="b_btm"></span>
                                        </a>
                                    </div>
                                    <?php endforeach;?>
                                        <div class="clear"></div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- start sidebar -->
                <div class="left_sidebar">
                    <div class="sellers">
                        <h4>Best Sellers</h4>
                        <div class="single-nav">
                            <ul>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
                                <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">The standard chunk of Lorem Ipsum</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">Always free from repetition</a></li>
                                <li><a href="#">Always free from repetition</a></li>			                    
                            </ul>
                        </div>
                        <div class="banner-wrap bottom_banner color_link">
                            <a href="#" class="main_link">
                                <figure><img src="images/delivery.png" alt=""></figure>
                                <h5><span>Free Shipping</span><br> on orders over $99.</h5><p>This offer is valid on all our store items.</p></a>
                        </div>
                        <div class="brands">
                            <h1>Brands</h1>
                            <div class="field">
                                <select class="select1">
                                    <option>Please Select</option>
                                    <option>Lorem ipsum dolor sit amet</option>
                                    <option>Lorem ipsum dolor sit amet</option>
                                    <option>Lorem ipsum dolor sit amet</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end sidebar -->
                <div class="clear"></div>
            </div>	
            <!-- end content -->
        </div>
    </div>
</div>		