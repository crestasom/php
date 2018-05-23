<div class="container">
    <div class="row">
        <div class="col-sm-4">
            <div class="signup-form"><!--sign up form-->
                <h2>New User Signup!</h2>
                <?php //echo '<pre>';print_r($data);exit;?>
                <?php $this->loadPartialView("../includes/_message");
                       // echo 'skjhsdf';?>
                <?php if (isset($success)): ?>
                    <div><h3><?php echo $success ?></h3></div>
                <?php else: ?>
                    <form action="" method="post" onSubmit="return validate();">
                        <input type="text" placeholder="Name" name="fullname" required="required" pattern="[a-zA-Z\s]+" title="Name should only contain alphabets" />
                        <input type="email" placeholder="Email Address" name="email" id="email" required=""/>
                        <span id="emailExists" style="display: none" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                        <input type="text" placeholder="Address" name="address" id="address" required="" />
                        <input type="text" placeholder="Phone No." name="phone" id="phone" required="" pattern="[0-9]{7,10}" title="Phone no. should be 7-10 digit long."/>
                        <input type="password" placeholder="Password" required="" name="password" id="password"/>
                        <input type="password" placeholder="Confirm Password" name="confirmpassword" id="confirm_password"/>
                        <label for="capcha" > Capcha </label><br />
                        <img src="<?php echo MAIN_URL ?>assets/capcha/captcha.php" id="captcha-img" /><br/>
                        <a href="#" onclick="
                                    document.getElementById('captcha-img').src = '<?php echo MAIN_URL ?>assets/capcha/captcha.php?' + Math.random();
                                    document.getElementById('captcha-form').focus();
                                    return false;"
                           id="change-image">Not readable? Change text.</a><br/><br/>
                        <b>Enter the Text Shown</b><br/>
                        <input type="text" name="captcha" id="captcha-form" /><br/>
                        <input type="submit" id="submit" class="btn btn-default" value="Signup" name="register">
                    </form>

                <?php endif; ?>
            </div><!--/sign up form-->
        </div>
    </div>
    </div>

<script src="<?php echo PUBLIC_URL; ?>application/js/jquery.js"></script>
<script>
                            $(document).ready(function () {
                                console.log("Jquery Loaded");
                                $("#email").blur(function () {
                                    document.getElementById('emailExists').style.display = 'block';

                                    // $("#emailExists").html("Updated");

                                    var email = $(this).val();
                                    $.ajax({
                                        url: '<?php echo LINK_URL ?>member/checkEmail',
                                        type: 'POST',
                                        data: {email: email},
                                        beforeSend: function (data) {
                                            $("#emailExists").addClass("checkEmail");
                                        },
                                        success: function (data) {
                                            //$("#emailExists").html("Updated");
                                            //$("#emailExists").html(data);
                                            $("#emailExists").removeClass("checkEmail");
                                            if (data == "false") {
                                                $("#emailExists").addClass("alert alert-block alert-danger");
                                                $("#emailExists").html("Already a member <a href='<?php echo LINK_URL?>member/forgotPassword'>Forgot Password?</a>");
                                                document.getElementById("submit").disabled = true;
                                            }
                                            if (data == "true") {
                                                $("#emailExists").addClass("alert alert-block alert-success");
                                                $("#emailExists").html("Available");
                                                document.getElementById("submit").disabled = false;
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

</body>