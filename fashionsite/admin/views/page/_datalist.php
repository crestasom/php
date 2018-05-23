<?php
$pagination = $model->findAllByPagination();
?>
<div class="box-content">
    <div class="btn-group-box">
    </div>
    <div class="box-content box-table" span="12">
        <table id="sample-table" class="table table-hover table-bordered tablesorter">
            <thead>
                <tr>
                    <th>S.N.</th>
                    <?php
                    foreach ($model->labels() as $values):
                        ?>
                        <th><?php echo $values; ?></th>
                    <?php endforeach; ?>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sn = 1;
                foreach ($pagination['allRecords'] as $row):
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <?php
                        foreach ($model->labels() as $key => $values):
                            ?>
                            <td><?php echo $row->$key; ?></td>
                        <?php endforeach; ?>
                            <td class="td-actions">
                            <a href="<?php echo LINK_URL . controller . "/view/" . $row->id ?>" class="btn btn-small btn-info">
                                <i class="btn-icon-only icon-eye-open"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/update/" . $row->id ?>" class="btn btn-small btn-success">
                                <i class="btn-icon-only icon-edit"></i>
                            </a>
                            <a href="<?php echo LINK_URL . controller . "/delete/" . $row->id ?>" class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">
                                <i class="btn-icon-only icon-trash"></i>
                            </a>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="10">
                        <?php echo $pagination['pagination'];?>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>