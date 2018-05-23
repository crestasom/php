<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <thead><?php echo isset($editData) ? "Update Details" : "Enter Details"; ?></thead>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" id="category_id" name="Product[category_id]">

                                    <?php
                                    foreach ($model->getCategories() as $row):
                                        $selected = '';
                                        $cat = $model->getCatTitle($row->category_id);
                                        if (isset($editData) and $editData->category_id == $row->id) {
                                            $selected = 'selected="selected"';
                                        }
                                        ?>
                                        <option value="<?php echo $row->id; ?>" <?php echo $selected; ?> ><?php echo $cat . " " . $row->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Manufacturer</label>
                                <select class="form-control" id="manufacturer_id" name="Product[manufacturer_id]">

                                    <?php
                                    foreach ($model->getManufacturer() as $row):
                                        $selected = '';
                                        if (isset($editData) and $editData->category_id == $row->id) {
                                            $selected = 'selected="selected"';
                                        }
                                        ?>
                                        <option value="<?php echo $row->id; ?>" <?php echo $selected; ?>><?php echo $row->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" id="title" value="<?php echo isset($editData) ? $editData->title : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Title" ?>" name="Product[title]" required="">

                            </div>
                            <div class="form-group">
                                <label>URL</label>
                                <input class="form-control" type="text" id="url" value="<?php echo isset($editData) ? $editData->url : "" ?>" placeholder="<?php echo isset($editData) ? "" : "URL" ?>" name="Product[url]" required="">
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control" type="text" id="price" value="<?php echo isset($editData) ? $editData->price : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Price" ?>" name="Product[price]" pattern="[0-9]*\.?[0-9]*" title="Please enter a Price in floating number">
                            </div>
                            <?php if(!isset($editData)):?>
                            <div class="form-group">
                               <label for="size">Available Size</label><br>
                           <!--      <input type="checkbox" name="size[]" value="S"> Small 
                                <input type="checkbox" name="size[]" value="M"> Medium 
                                <input type="checkbox" name="size[]" value="L"> Large 
                                <input type="checkbox" name="size[]" value="XL"> Extra Large 
                                <input type="checkbox" name="size[]" value="XXL"> Double Extra Large 
                           -->
                           <input class="form-control" type="text" id="size" name="size" value="<?php echo isset($editData) ? $editData->size : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Multiple size should be separated by comma." ?>" required="">
                            </div>
                            <?php endif;?>
                            <div class="form-group">
                                Add Photos <input multiple="true" accept="image/*" type="file" name="photos[]"/>
                            </div>
                            <div class="form-group">
                                <label>Summary</label>
                                <textarea class="form-control" rows="3" id="summary" value="" placeholder="<?php echo isset($editData) ? "" : "Summary" ?>" name="Product[summary]"><?php echo isset($editData) ? $editData->summary : "" ?></textarea>
                            </div>

                            <div class="form-group">
                                <label>Detail</label>
                                <textarea class="form-control" rows="3" id="detail" value="" placeholder="<?php echo isset($editData) ? "" : 'Detail'; ?>" name="Product[detail]"><?php echo isset($editData) ? $editData->detail : ""; ?></textarea>

                            </div>
                            <div class="form-group">
                                <label>SEO Title</label>
                                <input class="form-control" type="text" id="seoTitle" value="<?php echo isset($editData) ? $editData->seoTitle : "" ?>" placeholder="<?php echo isset($editData) ? "" : "SEO Title" ?>" name="Product[seoTitle]">

                            </div>
                            
                            <div class="form-group">
                                <label>SEO Description</label>
                                <input class="form-control" type="text" id="seoDesc" value="<?php echo isset($editData) ? $editData->seoDesc : "" ?>" placeholder="<?php echo isset($editData) ? "" : "SEO Description" ?>" name="Product[seoDesc]">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select id="status" class="form-control" name="Product[status]">
                                    <?php
                                    $active = 'selected="selected"';
                                    $inactive = '';

                                    if (isset($editData) and ! $editData->status) {
                                        $inactive = 'selected="selected"';
                                        $active = '';
                                    }
                                    ?>
                                    <option value="1" <?php echo $active; ?> >Active</option>
                                    <option value="0" <?php echo $inactive; ?>>In-Active</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-success" name=<?php echo isset($editData) ? "update" : "create" ?> id="create"><?php echo isset($editData) ? "Update" : "Create" ?></button>
                            <a href="<?php echo LINK_URL . controller; ?>/index" class="btn btn-danger" >Cancel</a>

                    </div>
                    </form>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->

        <!-- /.col-lg-12 -->
    </div>
</div>
<!-- /.row -->
</div>
<script type="text/javascript" src="<?php echo MAIN_URL ?>assets/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="<?php echo MAIN_URL ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript">

                        function BrowseServer()
                        {
                            // You can use the "CKFinder" class to render CKFinder in a page:
                            var finder = new CKFinder();
                            finder.basePath = '<?php echo MAIN_URL ?>assets/ckfinder/';	// The path for the installation of CKFinder (default = "/ckfinder/").
                            finder.selectActionFunction = SetFileField;
                            finder.popup();

                            // It can also be done in a single line, calling the "static"
                            // popup( basePath, width, height, selectFunction ) function:
                            // CKFinder.popup( '../', null, null, SetFileField ) ;
                            //
                            // The "popup" function can also accept an object as the only argument.
                            // CKFinder.popup( { basePath : '../', selectActionFunction : SetFileField } ) ;
                        }

                        // This is a sample function which is called when a file is selected in CKFinder.
                        function SetFileField(fileUrl)
                        {
                            document.getElementById('xFilePath').value = fileUrl;
                        }
                        //CKEDITOR.replace("detail");
</script>

<script src="<?php echo PUBLIC_URL; ?>/bootstrap/js/jquery.min.js"></script>
<script>
                        $(document).ready(function () {
                            console.log("jquery loaded");
                            $("#title").keyup(function () {
                                var Text = $(this).val();
                                Text = Text.toLowerCase();
                                Text = Text.replace(/ /g, '-').replace(/[^\w-]+/g, '')
                                $("#url").val(Text);
                            });

                        });
</script>

<script>
    function showQtyLabel(status){
        console.log(status);
            document.getElementById("sizeqty").disabled = !status;
            
        }
</script>