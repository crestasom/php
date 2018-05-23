<?php

?>
<!-- /.panel-heading -->

<div class="panel-body" id="datalist">
    <div class="table-responsive">
        <table class="table">
            <h4> <?php echo "List of " . ucfirst(controller); ?></h4>
            
              
            <thead>
                <tr class="success">
                    <th>S.N.</th>
                    <?php foreach ($model->labels() as $values): ?>
                        <th><?php echo $values; ?></th>
                    <?php endforeach; ?>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                foreach ($pagination['allRecords'] as $rows):
                    ?>
                    <tr class="bg-info">
                        <td><?php echo $sn++ ?></td>
                        <?php foreach ($model->labels() as $key => $value): ?>
                            <td>
                                <?php
                                if ($key == 'status') {
                                    echo $model->getStatus($rows->$key);
                                } elseif ($key == 'category_id') {
                                    echo $model->getCatTitleFull($rows->$key);
                                } elseif ($key == 'manufacturer_id') {
                                    echo $model->getManuTitle($rows->$key);
                                } else {
                                    echo $rows->$key;
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                        <td class="td-actions">
                            <a href="<?php echo LINK_URL . controller . "/view/" . $rows->id ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="View <?php echo controller ?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/update/" . $rows->id ?>" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Edit <?php echo controller ?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/delete/" . $rows->id ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete <?php echo controller ?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-trash-o"></i>
                            </a>
                            <a href="<?php echo LINK_URL . "stock/update/" . $rows->id ?>" class="btn btn-foursquare btn-circle" data-toggle="tooltip" data-placement="top" title="Edit Stock" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo LINK_URL . "stock/view/" . $rows->id ?>" class="btn btn-foursquare btn-circle" data-toggle="tooltip" data-placement="top" title="View Stock" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-edit"></i>
                            </a>
                        </td>
                    <?php endforeach; ?>
                <tr>
                    <td colspan="10">
                        <?php echo $pagination['pagination']; ?>
                    </td>
                </tr>
                </tr>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

</div>
<!-- /.panel-body -->
</div>
<!-- /.panel -->
</div>

<script>
$(document).ready(function () {
        console.log("jquery loaded");
        $("#searchProduct").click(function () {// class of the remove from cart link
            alert("just clicked");
            var searchby = document.getElementById('searchBy').value;
            var searchKey = document.getElementById('searchKey').value;
            //console.log(searchby);
            //console.log(searchKey);
                $.ajax({
                    url: "<?php echo LINK_URL; ?>product/listProduct",
                    type: "POST",
                    data: {searchBy: searchBy,searchKey:searchKey},
                    // beforeSend: function (data) {
                    // console.log(loading...);
                    //  },
                    success: function (data) {
                        console.log(data);
                       // $("#forAjaxMessage").addClass("success");
                        //$("#forAjaxMessage").html(data.success);
                        $("#datalist").html(data.products);
                        //$("#cartCount").html(data.cartCount);
                        //$("#cartAmt").html(data.cartAmt);
                        //$("#cartItems").html(data.cartItems)
                        //$('html, body').animate({scrollTop: $("#page").offset().top}, 4000);
                        //alert(data);
                    },
                    dataType: "json" //define the type of data recieved/response
                });
            return false;
        });

    });
    
    </script>