
<section class="page container">
    <div class="row">
        <div class="span12">
            <?php $this->loadPartialView("../includes/_links") ?>
            <?php $this->loadPartialView("../includes/_message") ?>
            <?php $this->loadPartialView("../includes/_search",array('model'=>$model)) ?>
            <div class="box">
                <div class="box-header">
                    <i class="icon-list"></i>
                    <h5>List of <?php echo ucfirst(controller); ?></h5>
                </div>
                <?php
                //var_dump(array('model'));
                //exit;
                $this->loadPartialView("_datalist", array('model'=> $model))?>
            </div>
        </div>

    </div>



</div>
</div>

<div id="spinner" class="spinner" style="display:none;">
    Loading&hellip;
</div>

