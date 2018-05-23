<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<?php
$edge = $model->findallEdge();
//  print_r($edge);exit;
?>
<div class="row">
    <div class="col-lg-12" id="routeInfo">
        <b>Route:</b>
    </div>
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
                                                           placeholder="Name"
                                                           name="Route[name]">

                            </div>

                            <div class="form-group">
                                <label class="control-label">Add Edge</label> 
                                <select
                                    class="form-control" id="edges">

                                    <?php
                                    foreach ($edge as $row) :
                                        $row->name=$model->getVertexTitle($row->source_stop)."-".$model->getVertexTitle($row->destination_stop);
                                        ?>
                                        <option
                                            value="<?php echo $row->id; ?>"><?php echo $row->name ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
    
                            
                            
                            <div class="form-group">
                                <label class="control-label">Vehicle Type</label> <select id="doubleSided"
                                                                                    class="form-control" name="Route[vehicleType]">
                                                                                        
                                    <option value="Bus" selected="selected">Bus</option>
                                    <option value="Micro Bus" >Micro Bus</option>
                                    <option value="Tempo" >Tempo</option>

                                </select>
                            </div>

                            <button type="button" class="btn btn-success" name="addToRoute"
                                    id="addToRoute">Add To Route</button>
                            <input type="submit" class="btn btn-primary" name="create"
                                   id="save" value="Save"/>
                            <a href="<?php echo LINK_URL . controller; ?>/cancel"
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

<script src="<?php echo PUBLIC_URL; ?>js/jquery.js"></script>
<script>
    $(document).ready(function () {
        console.log("jquery loaded");


        $("#addToRoute").click(function () {
            var stops = document.getElementById("edges");

            //console.log(edgeName);

            var edge = $("#edges").val();
            //var edgeData =<?php //echo json_encode($edge); ?>;

            $.ajax({
                //  url: '<?php echo LINK_URL ?>route/findNextEdges',
                url: '<?php echo LINK_URL ?>route/findNextEdges',
                type: 'POST',
                data: {edge: edge},
               
                success: function (data) {
                    document.getElementById("edges").focus();
                    var edgeName = $("#edges option:selected").html();
                    var display = document.getElementById("routeInfo").innerHTML
                    edgeName = edgeName.concat(",");
                    display = display.concat(edgeName);
                    console.log(display);
                    document.getElementById("routeInfo").innerHTML = display;


                    var obj = JSON.parse(data);

                    $('#edges').empty();
                    var stops = document.getElementById("edges");
                    for (var i = 0; i < obj.length; i++) {
                        var opt = obj[i].id;
                        var optName = obj[i].name;
                        var el = document.createElement("option");
                        el.textContent = optName;
                        el.value = opt;
                        stops.appendChild(el);
                    }
                    
                }

            });

        });

        

    });
</script>