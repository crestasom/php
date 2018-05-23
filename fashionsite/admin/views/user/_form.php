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
                            <div class="form-group">
                                <label>Full Name</label>
                                <input class="form-control" type="text" id="name" value="<?php echo isset($editData) ? $editData->fullname : '' ?>" placeholder="<?php echo isset($editData) ? '' : "Full Name" ?>" name="Users[fullname]" required="">

                            </div>
                            <div class="form-group">
                                <label>User Name</label>
                                <input class="form-control" type="text" id="username" value="<?php echo isset($editData) ? $editData->username : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Username" ?>" name="Users[username]" required="" >

                            </div>
                            <div class="form-group">

                                <label>E-Mail</label>
                                <input class="form-control" type="text" id="email" value="<?php echo isset($editData) ? $editData->email : "" ?>" placeholder="<?php echo isset($editData) ? "" : "E_mail" ?>" name="Users[email]" title="Please enter a valid e-mail" pattern="([a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$)" required="">
                                <span id="emailExists" class="emailExists" span="4px"></span>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" id="password" value="<?php echo isset($editData) ? $editData->password : "" ?>" placeholder="<?php echo isset($editData) ? "" : "Password" ?>" name="Users[password]">

                            </div>
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <select class="form-control" id="status" class="span5" name="Users[status]">
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
<script src="<?php echo PUBLIC_URL; ?>bootstrap/js/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        console.log("Jquery Loaded")  ;
        $("#email").blur(function () {
          // $("#emailExists").html("Updated");
           var email = $(this).val();
            $.ajax({
                     url: '<?php echo LINK_URL ?>user/checkEmail',
                    type: 'POST',
                    data: {email:email},
                    beforeSend: function () {
                        
                        $("#emailExists").addClass("checkEmail");
                    },
                  /*  success: function (data) {
                        $("#emailExists").removeClass("checkEmail");
                        if (data == "false") {
                            $("#emailExists").addClass("error");
                            $("#emailExists").html("Already a member");
                        }
                        if (data == "true") {
                            $("#emailExists").addClass("success");
                            $("#emailExists").html("Available");
                        }
                    } */

                    });
        });
       
    });
</script>
