</div>
<!-- /.row -->
<?php //print_r($cmpRefPoints);exit;?>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <thead><?php echo isset($editData) ? "Update Details" : "Enter Details"; ?></thead>
            </div>
            <div class="panel-body">
                <div class="row">

                    <form action="" method="post" onSubmit="return checkDest()">
                        <div class="form-group">
                            <label>Source</label> <select class="form-control"
                                                          id="source_stop" name="Edge[source_stop]">

                                <?php
                                foreach ($model->getStops() as $row) :
                                    $selected = '';
                                    if (isset($editData) and $editData->source_stop == $row->id) {
                                        $selected = 'selected="selected"';
                                    }
                                    ?>
                                    <option
                                        value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Destination</label> <select class="form-control"
                                                               id="destination_stop" name="Edge[destination_stop]">

                                <?php
                                foreach ($model->getStops() as $row) :
                                    $selected = '';
                                    if (isset($editData) and $editData->destination_stop == $row->id) {
                                        $selected = 'selected="selected"';
                                    }
                                    ?>
                                    <option
                                        value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->name ?></option>
                                    <?php endforeach; ?>
                            </select>
                        </div>

                       

                        <div class="form-group">
                            <label class="control-label">Reference Stop</label> <select
                                class="form-control" id="status" class="span5"
                                name="Edge[referenceStops]">
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
                                    endforeach
                                    ;
                                    foreach ($refPoints as $row) :
                                        $selected = '';
                                        if (isset($editData) and $editData->referenceStop == $row->id) {
                                            $selected = 'selected="selected"';
                                        }
                                        ?>
                                    <option
                                        value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->name ?></option>
                                    <?php endforeach; ?>

                            </select>
                        </div>


                        <div class="form-group">
                            <label class="control-label">Direction</label> <select
                                id="status" class="form-control" name="Edge[oneway]">
                                    <?php
                                    $twoWay = 'selected="selected"';
                                    $oneWay = '';

                                    if (isset($editData) and $editData->oneway) {
                                        $oneWay = 'selected="selected"';
                                        $twoWay = '';
                                    }
                                    ?>
                                <option value="1"
                                        <?php echo $oneWay; ?>>One-Way</option>
                                <option value="0" <?php echo $twoWay; ?>>Two-Way</option>

                            </select>
                        </div>

                        <input type="submit" class="btn btn-success"
                               name=<?php echo isset($editData) ? "update" : "create" ?>
                               id="create"
                               value="<?php echo isset($editData) ? "Update" : "Create" ?>"> <a
                               href="<?php echo LINK_URL . controller; ?>/index"
                               class="btn btn-danger">Cancel</a>

                </div>

                </form>
                <script>
                    function checkDest() {
                        console.log("checkpoint");
                        var sourceId = document.getElementById("source_stop").value;
                        var destId = document.getElementById("destination_stop").value;
                        if (sourceId == destId) {
                            alert("Source and Destination Stops are same");
                            return false;

                        }
                        return true;
                    }
                </script>
            </div>