<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo ucfirst(controller) ?>&DoubleRightArrow;View</h1>
        </div>

        <div class="span12">
            <?php $this->loadPartialView("_view", array("model" => $model,"viewData"=>$viewData)) ?>


        </div>




    </div>
</div>

<div id="spinner" class="spinner" style="display:none;">
    Loading&hellip;
</div>

