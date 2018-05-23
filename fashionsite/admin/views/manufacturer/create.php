<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst(controller) ?>&DoubleRightArrow;<?php echo isset($editData) ? "Update" : "Create" ?></h1>
            </div>
            <div class="row">
                <div class="span12">
                    <?php //this->loadPartialView("../includes/_links") ?>
                    <?php $this->loadPartialView("../includes/_message") ?>


                </div>
            </div>
            <div class="span12">
                <?php $this->loadPartialView("_form") ?>


            </div>

    </section>
</div>