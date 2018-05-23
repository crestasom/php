<div class="box-content">
    <div class="btn-group-box">
    </div>
    <div class="box-content box-table" span="12">
        <table id="sample-table" class="table table-hover table-bordered tablesorter">
            <?php $columns=$model->getColumns();
            foreach($columns as $field): 
            //to skip the not showing  fields
            
                if(!in_array($field, $model->notShowInTheView)):
                    
                ?>
            <tr>
                <th><?php echo ucfirst($field); ?></th> 
                <td><?php echo $viewData->$field?></td>
            </tr>
            
<?php
endif;
endforeach;?>
            </tbody>
        </table>
    </div>
</div>