
<section class="page container">
    <div class="row">
        <div class="span12">
            <?php $this->loadPartialView("../includes/_links") ?>
            <div class="box">
                <div class="box-header">
                    <i class="icon-bookmark"></i>
                    <h5>Detail:: <?php echo $viewData->fullname; ?></h5>
                </div>
                <?php
                //var_dump(array('model'));
                //exit;
                $this->loadPartialView("_view", array('model'=> $model,'viewData'=>$viewData))?>
            </div>
        </div>

    </div>



</div>
</div>

<div id="spinner" class="spinner" style="display:none;">
    Loading&hellip;
</div>

