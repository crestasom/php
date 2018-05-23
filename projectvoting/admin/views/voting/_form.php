<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-default">
       
            <div class="panel-heading">
                <thead><b>Please Fill Up the form</b></thead>
            </div>
            <div class="panel-body">
             <form action="" method="post">
                <div class="row">
              <div class="form-group">
                                <label>Project-Code</label>
                                <input class="form-control" type="text" id="title" placeholder="Please Enter Project Code" name="Voting[project_code]" required="">

                            </div>
                           
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" id="title" placeholder="Please Enter Your Name" name="Voting[name]" required="" pattern="[a-zA-Z\s]+" title="Name should contain only alphabets">

                            </div>
                            
                            <div class="form-group">
                                <label>Mobile</label>
                                <input class="form-control" type="text" id="title" placeholder="Please Enter Your Mobile Number (98xxxxxxxx)" name="Voting[mobileNo]" required="" pattern="98[0-9]{8}" title="Phone no. should be 98xxxxxxxx format.">

                            </div>
                            
                             <div class="form-group">
                                <label>College</label>
                                <input class="form-control" type="text" id="title" placeholder="Please Enter Your College Name" name="Voting[college]" required="" pattern="[a-zA-Z\s]+" title="College Name should contain only alphabets">

                            </div>
                                <button type="submit" class="btn btn-success" name="create"  id="create"> Submit</button>
                            <a href="<?php echo LINK_URL?>index.html" class="btn btn-danger" >Cancel</a>

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