<div class="row">
    <div class="col-sm-3">
        <div class="left-sidebar">
            <h3>Category</h3>
            <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                <?php
                foreach ($category->getCategories() as $row):
                    $subCat = $category->getSubCategories($row->id);
                    if ($subCat):
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordian" href="#<?php echo $row->url; ?>">
                                        <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                        <?php echo $row->title; ?>
                                    </a>
                                </h4>
                            </div>
                            <div id="<?php echo $row->url; ?>" class="panel-collapse collapse">
                                <div class="panel-body">
                                    <ul>
                                        <?php foreach ($subCat as $rows): ?>
                                            <li><a href="<?php echo LINK_URL . "category/view/" . $category->getCatUrl($rows->category_id) . "/" . $rows->url ?>.html"><?php echo $rows->title; ?> </a></li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    endif;
                endforeach;
                ?>
            </div>
            <!--/category-products-->

            <div class="brands_products"><!--brands_products-->
                <h2>Brands</h2>
                <div class="brands-name">
                    <ul class="nav nav-pills nav-stacked">
                        <?php
                        $manu = $manufacturer->findAll();
                        foreach ($manu as $row):
                            ?>
                            <li><a href="<?php echo LINK_URL . "manufacturer/view/" . $row->url ?>.html"> <span class="pull-right">(<?php echo Functions::countManu($row->id); ?>)</span><?php echo $row->title; ?></a></li>
                            <?php endforeach; ?>
                    </ul>
                </div>
            </div><!--/brands_products-->


        </div>
    </div>