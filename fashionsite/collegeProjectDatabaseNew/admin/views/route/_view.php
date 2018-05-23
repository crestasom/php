<div class="box-content">
    <div class="btn-group-box">
    </div>
    <div class="box-content box-table" span="12">
        <table id="sample-table" class="table table-hover table-bordered tablesorter">
            <thead><h3><?php Echo "View Details::" . ucfirst($viewData->name); ?></h3></thead>
            <?php
            $columns = $model->getColumns();
           // print_r($columns);exit;
            foreach ($columns as $field):
                //to skip the not showing  fields

                if (!in_array($field, $model->notShowInTheView)):
                    ?>
                    <tr>
                        <th><?php echo ucfirst($field); ?></th> 
                        <td>
                            <?php
                            if ($field == 'status') {
                            echo $model->getStatus($viewData->$field)    ;
                            }else if($field=='stops'){
                            	echo $model->getStopsNames($viewData->$field);
                            } 
                            else {
                                echo $viewData->$field;
                            }
                            ?>
                        </td>
                    </tr>

                    <?php
                endif;
            endforeach;
            ?>
            </tbody>
        </table>
    </div>
</div>