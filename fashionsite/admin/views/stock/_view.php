<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <h4><?php echo ucfirst($name); ?>:Stock Details</h4>
            <thead>
                <tr class="success">
                    <?php foreach ($model->labels() as $values): ?>
                    
                        <th><?php echo $values; ?></th>
                        
                    <?php
                    //endif;
                    endforeach; ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    ?>
                <?php foreach ($viewData as $rows): ?>
                    <tr class="bg-info">
                        
                        <?php foreach ($model->labels() as $key => $value): ?>
                            <td>
                                <?php
                                if ($key != 'id' and $key!='product_id') {
                                    
                                    echo $rows->$key;
                                }
                                ?>
                            </td>
                        <?php endforeach; ?>
                       
                </tr>
                    <?php endforeach;?>
            </tbody>
        </table>
    </div>
    <!-- /.table-responsive -->
</div>