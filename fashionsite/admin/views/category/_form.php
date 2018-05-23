<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <thead><?php echo isset($editData) ? "Update Details" : "Enter Details"; ?></thead>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-6">
                        <form role="form" action="" method="post">

                            <div class="form-group" id ="category">
                                <label >Main Category </label>
                                <select class="form-control" id="category_id" name="Category[category_id]" onchange="javascript:checkMainCategory();">

                                    <option value="0" >Primary Category</option>
                                    <?php
                                    foreach ($model->getCatagories() as $row):
                                        $selected = '';
                                        if (isset($editData) and $editData->category_id == $row->id) {
                                            $selected = 'selected="selected"';
                                        }
                                        
                                        ?>
                                        <option value="<?php echo $row->id; ?>" <?php echo $selected; ?> ><?php echo $row->title ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" type="text" id="title" value="<?php echo isset($editData) ? $editData->title : '' ?>" placeholder="<?php echo isset($editData) ? '' : "Title" ?>" name="Category[title]">

                            </div>
                            <div class="form-group">
                                <label>Url</label>
                                <input class="form-control" type="text" id="url" value="<?php echo isset($editData) ? $editData->url : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Url" ?>" name="Category[url]">

                            </div>
                            <div class="form-group">

                                <label>SEO Title</label>
                                <input class="form-control" type="text" id="seoTitle" value="<?php echo isset($editData) ? $editData->seoTitle : "" ?>" placeholder="<?php echo isset($editData) ? "" : "SEO Title" ?>" name="Category[seoTitle]">

                            </div>
                            <div class="form-group">
                                <label>SEO Description</label>
                                <input class="form-control" type="text" id="seoDesc" value="<?php echo isset($editData) ? $editData->seoDesc : "" ?>" placeholder="<?php echo isset($editData) ? "" : "SEO Description" ?>" name="Category[seoDesc]">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control" id="status" class="span5" name="Category[status]">
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
                        </form>
                    </div>
                    <!-- /.col-lg-6 (nested) -->
                    <!-- /.col-lg-6 (nested) -->
                </div>
                <!-- /.row (nested) -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
    <!-- /.col-lg-12 -->
</div>

<!--for uploading image--->
<script type="text/javascript" src="<?php echo MAIN_URL ?>assets/ckfinder/ckfinder.js"></script>
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
    function checkMainCategory() {
        var cat_id = document.getElementById('category_id').value;
        if (cat_id == 0) {
            document.getElementById('type').style.display='none';
        } else {
            document.getElementById('type').style.display="block";
        }
    }

</script>
