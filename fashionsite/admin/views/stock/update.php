<div class="content-wrapper">
    <section class="content-header">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst($name) ?>&DoubleRightArrow;<?php echo "Update Stock"; ?></h1>
            </div>
            &nbsp;
            <div class="span12">
                <?php $this->loadPartialView("_update", array("model" => $model, "editData" => $editData)) ?>


            </div>



    </section>
</div>


