<div class="container">
    <div class="row">
        <div class="col-sm-5 col-sm-offset-1" >
            <h2>Member Login</h2>
            <div class="login-form"><!--login form-->
                <h2>Account Recovery</h2>
                <?php $this->loadPartialView("../includes/_message") ?>
                <form role="form" action="" method="post">
                    <input type="email" id="email" name="email" placeholder="Type Your Email Here">
                    <span id="emailExists" style="display: none"></span>
                    <label><h4>Capcha Verification</h4></label>
                    <p> 
                        <img src="<?php echo MAIN_URL ?>assets/capcha/captcha.php" id="captcha-img" /><br/>
                        <a href="#" onclick="
                                    document.getElementById('captcha-img').src = '<?php echo MAIN_URL ?>assets/capcha/captcha.php?' + Math.random();
                                    document.getElementById('captcha-form').focus();
                                    return false;"
                           id="change-image">Not readable? Change text.</a><br/><br/>
                        <input type="text" name="captcha" id="captcha-form" placeholder="Enter the text shown in the box" />
                    <table>
                        <th><input type="submit" class="btn btn-success" name="continue" id="continue" disabled value="Continue"></th>
                        <td> <a href="<?php echo LINK_URL . controller; ?>/index" class="btn btn-danger" >Cancel</a></td></table>
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
                                    console.log("jquery loaded");
                                    $("#email").blur(function () {
                                        document.getElementById('emailExists').style.display = 'block';

                                        //$("#emailExists").html("Updated");

                                        var email = $(this).val();
                                        $.ajax({
                                            url: '<?php echo LINK_URL ?>member/checkEmail',
                                            type: 'POST',
                                            data: {email: email},
                                            beforeSend: function (data) {
                                                console.log("requesting");
                                                $("#emailExists").addClass("checkEmail");
                                            },
                                            success: function (data) {
                                                console.log(data);
                                                $("#emailExists").removeClass("checkEmail");
                                                if (data == "true") {
                                                    $("#emailExists").addClass("error");
                                                    $("#emailExists").html("Not a registered member");
                                                    document.getElementById("continue").disabled = true;
                                                }
                                                if (data == "false") {
                                                    $("#emailExists").addClass("success");
                                                    $("#emailExists").html("Registered member");
                                                    document.getElementById("continue").disabled = false;
                                                }
                                            }
                                        });
                                    });

                                });
</script>
