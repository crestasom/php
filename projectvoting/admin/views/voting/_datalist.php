<?php
$pagination = $model->getTop();
?>
<!-- /.panel-heading -->
<?php ?>
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
                    
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                foreach ($pagination as $rows):
                    ?>
                    <tr class="bg-info">
                        <td><?php echo $sn++ ?></td>
                        <?php foreach ($model->labels() as $key => $value): ?>
                            <td>
                                <?php
                                    echo $rows->$key;
                                ?>
                            </td>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                <tr>
                    <td colspan="10">
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