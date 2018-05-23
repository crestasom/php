<div class="box-content">
    <div class="btn-group-box">
    </div>
    <div class="box-content box-table" span="12">
        <table id="sample-table" class="table table-hover table-bordered tablesorter">
            <thead><h3><?php Echo "View Details::" . ucfirst($viewData->title); ?></h3></thead>
            <?php
            $columns = $model->getColumns();
            foreach ($columns as $field):
                //to skip the not showing  fields

                if (!in_array($field, $model->notShowInTheView)):
                    ?>
                    <tr>
                        <th>
                            <?php
                            if ($field == 'category_id') {
                                echo "Catagory";
                            }
                            else if ($field == 'manufacturer_id') {
                                echo "Manufacturer";
                            } else {
                                echo ucfirst($field);
                            }
                            ?>
                        </th> 
                        <td>
                            <?php
                            if ($field == 'image') {
                                ?>
                                <img src="<?php echo $viewData->$field; ?>" width="300">
                                <?php
                            } elseif ($field == 'category_id') {
                                echo $model->getCatTitle($viewData->$field);
                            } elseif ($field == 'manufacturer_id') {
                                echo $model->getManuTitle($viewData->$field);
                            } else {
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