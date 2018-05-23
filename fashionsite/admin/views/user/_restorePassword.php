<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>E-Nepal | Restore Password</title>
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
        <div class="content-wrapper">
            <section class="content-header">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <thead><?php echo "Restore Password"; ?></thead>
                                <?php $this->loadPartialView("../includes/_message") ?>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <form role="form" action="" method="post" onSubmit="return validate();">
                                            <div class="form-group">
                                                <label>Enter Verification Code</label>
                                                <input class="form-control" type="text" id="verCode" name="Users[verCode]">
                                                <span id="emailExists"  style="width: 150px; height: 150px;" >&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                            </div>
                                            <div class="form-group">
                                                <label>New Password</label>
                                                <input class="form-control" type="password" id="password" name="Users[newPassword]">
                                            </div>
                                            <div class="form-group">
                                                <label>Re-enter New Password</label>
                                                <input class="form-control" type="password" id="confirm_password" name="Users[newPassword1]">
                                            </div>
                                            <button type="submit" class="btn btn-success" name="reset" id="create">Reset Password</button>
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
                                                $("#verCode").blur(function () {

                                                    //  $("#emailExists").html("Updated");

                                                    var code = $(this).val();
                                                    $.ajax({
                                                        url: '<?php echo LINK_URL ?>user/checkCode',
                                                        type: 'POST',
                                                        data: {code: code,id:<?php echo $id?>},
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
    </body>
</html>