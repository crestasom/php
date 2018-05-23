<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>AdminLTE 2 | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo PUBLIC_URL ?>plugins/iCheck/square/blue.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <section class="content-header">
            <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <thead><?php echo "<h3>Account Recovery</h3>"; ?></thead>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <?php $this->loadPartialView("../includes/_message") ?>
                                    <form role="form" action="" method="post">
                                        <div class="form-group">
                                            <label>Enter Your Email</label>
                                            <input class="form-control" type="text" id="email" name="email">
                                            <span id="emailExists"  style="width: 150px; height: 150px;" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                        </div>
                                        <div class="form-group">
                                            <label>Capcha Verification</label>
                                            <p> 
                                                <img src="<?php echo MAIN_URL ?>assets/capcha/captcha.php" id="captcha-img" /><br/>
                                                <a href="#" onclick="
                                                        document.getElementById('captcha-img').src = '<?php echo MAIN_URL ?>assets/capcha/captcha.php?' + Math.random();
                                                        document.getElementById('captcha-form').focus();
                                                        return false;"
                                                   id="change-image">Not readable? Change text.</a><br/><br/>
                                                <b>Enter the Text Shown</b><br/>
                                                <input type="text" name="captcha" id="captcha-form" /><br/>
                                            </p>
                                        </div>
                                        <button type="submit" class="btn btn-success" name="continue" id="continue" disabled>Continue</button>
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
        </section>
    </div>
    <script src="<?php echo PUBLIC_URL; ?>bootstrap/js/jquery.min.js"></script>
    <script>
                                                    $(document).ready(function () {
                                                        console.log("jquery loaded");
                                                        $("#email").blur(function () {
                                                            $("#emailExists").html("Updated");
                                                            var email = $(this).val();
                                                            $.ajax({
                                                                url: '<?php echo LINK_URL ?>user/checkEmail',
                                                                type: 'POST',
                                                                data: {email: email},
                                                                beforeSend: function (data) {
                                                                    console.log("requesting");
                                                                    $("#emailExists").addClass("checkEmail");
                                                                },
                                                                success: function (data) {
                                                                    console.log("completed");
                                                                    $("#emailExists").removeClass("checkEmail");
                                                                    if (data == "false") {
                                                                        $("#emailExists").addClass("error");
                                                                        $("#emailExists").html("Not a registered user");
                                                                        document.getElementById("continue").disabled = true;
                                                                    }
                                                                    if (data == "true") {
                                                                        $("#emailExists").addClass("success");
                                                                        $("#emailExists").html("Registered user");
                                                                        document.getElementById("continue").disabled = false;
                                                                    }
                                                                }
                                                            });
                                                        });
                                                    });
    </script>
</body>
</html>
