<div class="container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1" >
            <h2>Restore Password</h2>
            <div class="login-form"><!--login form-->
                <?php $this->loadPartialView("../includes/_message") ?>
                <form role="form" action="" method="post" onSubmit="return validate();">
                    <div class="form-group">
                        <input class="form-control" type="text" id="verCode" name="Member[verCode]" placeholder="Enter Verification Code Here">
                        <span id="emailExists"  style="display: none" ></span>
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="password" name="Member[newPassword]" placeholder="New Password">
                    </div>
                    <div class="form-group">
                        <input class="form-control" type="password" id="confirm_password" name="Member[newPassword1]" placeholder="Re-enter New Password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="reset" id="create" disabled >Reset Password</button>
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
</div>
<script src="<?php echo PUBLIC_URL; ?>application/js/jquery.js"></script>
<script>
                        $(document).ready(function () {
                            $("#verCode").blur(function () {

                                //  $("#emailExists").html("Updated");
                                document.getElementById('emailExists').style.display = 'block';

                                var code = $(this).val();
                                $.ajax({
                                    url: "<?php echo LINK_URL ?>member/checkCode",
                                    type: 'POST',
                                    data: {code: code, id:<?php echo $id ?>},
                                    beforeSend: function (data) {
                                        $("#emailExists").addClass("checkEmail");
                                    },
                                    success: function (data) {
                                        console.log(data);
                                        $("#emailExists").removeClass("checkEmail");
                                        if (data == "false") {
                                            $("#emailExists").addClass("error");
                                            $("#emailExists").html("Verfication Code Doesnot match");
                                            document.getElementById("create").disabled = true;
                                        }
                                        if (data == "true") {
                                            $("#emailExists").addClass("success");
                                            $("#emailExists").html("Verfication Code Matched");
                                            document.getElementById("create").disabled = false;
                                        }
                                    }

                                });
                            });

                        });
</script>
<script>
    function validate() {

        var a = document.getElementById("password").value;
        var b = document.getElementById("confirm_password").value;
        if (a != b) {
            alert("Passwords do no match");
            return false;
        }
    }
</script>
