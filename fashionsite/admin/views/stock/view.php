<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst(controller) ?>&DoubleRightArrow;View</h1>
            </div>

            <div class="span12">
                <?php $this->loadViewNoSideBar("_view", array("model" => $model, "viewData" => $viewData, 'name' => $name)) ?>
            </div>
        </div>
    </section>
</div>


