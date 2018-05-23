<div id="page-wrapper">
    <div class="container-fluid">
         <form action="<?php echo LINK_URL?>version/updateVersion" method="post">
             <tr>
             <input class="form-control col-lg-4" width="col-lg-4" type="text" name="message" placeholder="Enter Version Detail">
             <input class="btn btn-primary" type="submit" value="Release Update">
            </tr>
            </form>
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?php echo ucfirst(controller) . " Management"; ?></h1> 
            </div>
            <div class="col-lg-12">
            <?php //$this->loadPartialView("../includes/_links") ?>
            <?php $this->loadPartialView("../includes/_message") ?>
            <?php $this->loadPartialView("../includes/_search", array('model' => $model)) ?>
            </div>
            <div class="box">
                <div class="box-header">
                    <i class="icon-list"></i>

                </div>
                <?php
                //var_dump(array('model'));
                //exit;
                $this->loadPartialView("_datalist", array('model' => $model))
                ?>
            </div>
        </div>

    </div>



</div>
</div>

<div id="spinner" class="spinner" style="display:none;">
    Loading&hellip;
</div>

