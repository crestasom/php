
<section class="page container">
    <div class="row">
        <div class="span12">
            <?php $this->loadPartialView("../includes/_links") ?>
            <?php $this->loadPartialView("../includes/_message") ?>
            
                 
                </div>
            </div>
    <div class="span12">
            <?php $this->loadPartialView("_form",array("model"=>$model,"editData"=>$editData)) ?>
            
                 
                </div>
            



</div>
</div>

<div id="spinner" class="spinner" style="display:none;">
    Loading&hellip;
</div>

