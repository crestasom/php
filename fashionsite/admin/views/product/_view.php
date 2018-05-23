<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead><h3><?php Echo "View Details::" . ucfirst($viewData->title); ?></h3></thead>
                        <?php
                        $columns = $model->getColumns();
                        foreach ($columns as $field):
                            //to skip the not showing  fields

                            if (!in_array($field, $model->notShowInTheView)):
                                ?>
                                <tr>
                                    <th><?php echo ucfirst($field) . ":  "; ?></th> 
                                    <td><?php
                                        if ($field == 'status') {
                                            echo $model->getStatus($viewData->$field);
                                        } else if ($field == 'image') {
                                            $images=explode(",",$viewData->$field);
                                            ?>
                                            <img src="<?php echo IMAGE_URL."product/".$images[0]; ?>" width="300">
                                            <?php
                                        } else if ($field == 'category_id') {
                                            echo $model->getCatTitleFull($viewData->$field);
                                        } else if($field == 'manufacturer_id'){
                                            echo $model->getManuTitle($viewData->$field);
                                        }else {
                                            echo $viewData->$field;
                                        }
                                        ?></td>
                                </tr>

                                <?php
                            endif;
                        endforeach;
                        ?>

                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->

        </div><!-- /.col -->
    </div><!-- /.row -->
</section>







<div class="panel-body">

    <div class="box-solid box-primary" span="12">
        <table id="sample-table" class="table " style=" width:'18px'">
            </tbody>
        </table>
    </div>
</div>