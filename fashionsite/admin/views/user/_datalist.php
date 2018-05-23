<?php
$pagination = $model->findAllByPagination();
?>
<!-- /.panel-heading -->
<div class="panel-body">
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
                                if($key=='status'){
                                    echo $model->getStatus($rows->$key);   
                                }else{
                                echo $rows->$key; 
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                        <td class="td-actions">
                            <a href="<?php echo LINK_URL . controller . "/view/" . $rows->id ?>" class="btn btn-success btn-circle" data-toggle="tooltip" data-placement="top" title="View <?php echo ucfirst(controller)?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                               <i class="fa fa-eye"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/update/" . $rows->id ?>" class="btn btn-primary btn-circle" data-toggle="tooltip" data-placement="top" title="Edit <?php echo ucfirst(controller)?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                               <i class="fa fa-edit"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/delete/" . $rows->id ?>" onclick="return confirm('Are you sure you want to delete this item?')" class="btn btn-danger btn-circle" data-toggle="tooltip" data-placement="top" title="Delete <?php echo ucfirst(controller)?>" data-original-title="Tooltip on top" aria-describedby="tooltip246845">
                                <i class="fa fa-trash-o"></i>
                            </a>
                        </td>
                    <?php endforeach; ?>
                        <tr>
                    <td colspan="10">
                        <?php echo $pagination['pagination'];?>
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