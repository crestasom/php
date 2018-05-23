
<div class="panel-body">
    <div class="table-responsive">
        <form action="" method="post">
            <table class="table">
                <thead>
                    <tr class="success">
                        <th>S.N.</th>
                        <th>Size</th>
                        <th>Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    foreach ($editData as $rows):
                        ?>
                        <tr class="bg-info">
                    <input type="hidden" name="id[]" value="<?php echo $rows->id;?>">
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $rows->size ?> </td>
                    <td><input type="number" value="<?php echo $rows->quantity ?>" name="quantity[<?php echo $rows->id ?>]" </td>
                <?php endforeach; ?>
                </tr>
                </tbody>
                <tfoot>
                <button type="submit" class="btn btn-success" name="update" id="create">Update</button>
                <a href="<?php echo LINK_URL; ?>product/index" class="btn btn-danger" >Cancel</a>
                </tfoot> 
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