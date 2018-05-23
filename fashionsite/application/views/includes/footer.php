</section>
</div>
<footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Top Categories</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach ($category->getTopCateories('6') as $rows): ?>
                                <li><a href="<?php echo LINK_URL . "category/view/" . $category->getCatUrl($rows->category_id) . "/" . $rows->url ?>"><?php echo $category->getCatTitleFull($rows->id); ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>Top Brands</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <?php foreach ($manufacturer->getTopManufacturer('6') as $rows): ?>
                                <li><a href="<?php echo LINK_URL . "manufacturer/view/" . $rows->url ?>"><?php echo $rows->title; ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>About E-Nepal</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="<?php echo LINK_URL?>site/about">About Us</a></li>
                            <li><a href="<?php echo LINK_URL?>site/privacy">Privacy Policy</a></li>
                            <li><a href="<?php echo LINK_URL?>site/terms">Terms and Conditions</a></li>
                        </ul>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2016 E-Nepal Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><b>LPZ Group</b></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

</body>
</html>