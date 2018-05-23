<?php ?>
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
//echo '<pre>';
//print_r($pagination['allRecords']);exit;
foreach ($pagination['allRecords'] as $rows):
    ?>
                    <tr class="bg-info">
                        <td><?php echo $sn++ ?></td>
    <?php foreach ($model->labels() as $key => $value): ?>
                            <td>
                            <?php
                            if ($key == 'status') {
                                echo $model->getOrderStatus($rows->$key);
                            } else {
                                echo $rows->$key;
                            }
                            ?>
                            </td>
                            <?php endforeach; ?>
                        <td class="td-actions">
                            <a href="<?php echo LINK_URL . controller . "/view/" . $rows->id ?>">
                                [View]
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
                data: {searchBy: searchBy, searchKey: searchKey},
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