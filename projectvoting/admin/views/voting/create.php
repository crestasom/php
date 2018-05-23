
    <section class="content-header">        
            <div class="col-lg-12">
                <h1 class="page-header" style="color: green"><b>Please Vote for your favourite Project</b></h1>
            </div>
            <div class="row">
                <div class="span12">
                    <?php //this->loadPartialView("../includes/_links") ?>
                    <?php $this->loadPartialView("../includes/_message") ?>


                </div>
            </div>
            <div class="span12">
                <?php $this->loadPartialView("_form",array('model'=>$model)) ?>


            </div>

    </section>
</div>