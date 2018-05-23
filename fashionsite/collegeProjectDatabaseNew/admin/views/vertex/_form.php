F
<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<?php
$refPoints = $model->getReferenceVertex();
$cmpRefPoints = $model->getCmpReferenceVertex();
?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <thead><?php echo isset($editData) ? "Update Details" : "Enter Details"; ?></thead>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="post">
                            <div class="form-group">
                                <label>Name</label> <input class="form-control" type="text"
                                                           id="name"
                                                           value="<?php echo isset($editData) ? $editData->name : "" ?>" 
                                                           placeholder="<?php echo isset($editData) ? "" : "Name"?>"
                                                           name="Vertex[name]">


                                <div class="form-group">
                                    <label class="control-label">Reference Stop</label>
                                    <?php //echo'<pre>';print_r($refPoints);exit;?> 
                                    <select
                                        class="form-control" id="status" class="span5"
                                        name="Vertex[referenceStops]">

                                        <option value="0">Null</option>
                                        <?php
                                        foreach ($cmpRefPoints as $row) :
                                            $selected = '';
                                            if (isset($editData) and $editData->referenceStops == $row->id) {
                                                $selected = 'selected="selected"';
                                            }
                                            ?>
                                            <option
                                                value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->name ?></option>
                                            <?php
                                            endforeach;

                                            foreach ($refPoints as $rows) :
                                                $selected = '';
                                                if (isset($editData) and $editData->referenceStops == $rows->id) {
                                                    $selected = 'selected="selected"';
                                                }
                                                ?>
                                            <option
                                                value="<?php echo $rows->id; ?>" <?php echo $selected; ?>><?php echo $rows->name ?></option>
                                            <?php endforeach; ?>

                                    </select>
                                </div>

                            </div>
                            <div class="form-group">
                                <label>Latitude</label> <input class="form-control" type="text"
                                                               id="lat"
                                                               value="<?php echo isset($editData) ? $editData->latCode : "" ?>"
                                                               placeholder="<?php echo isset($editData) ? "" : "Latitude"?>"
                                                               name="Vertex[latCode]">

                            </div>
                            <div class="form-group">
                                <label>Longitude</label> <input class="form-control" type="text"
                                                                id="long"
                                                                value="<?php echo isset($editData) ? $editData->longCode : "" ?>"
                                                                placeholder="<?php echo isset($editData) ? "" : "Longitude"?>"
                                                                name="Vertex[longCode]">

                            </div>
                            <button type="submit" class="btn btn-success"
                                    name=<?php echo isset($editData) ? "update" : "create" ?> id="create"><?php echo isset($editData) ? "Update" : "Create" ?></button>
                            <a href="<?php echo LINK_URL . controller; ?>/index"
                               class="btn btn-danger">Cancel</a>
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->
</div>