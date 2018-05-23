<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst(controller) ?>&DoubleRightArrow;View</h1>
            </div>

            <div class="span12">
                <?php $this->loadPartialView("_view", array("model" => $model, "viewData" => $viewData)) ?>
            </div>
        </div>
        </section>
</div>


