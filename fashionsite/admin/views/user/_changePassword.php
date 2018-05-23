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
    <section class="content-header">

        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <thead><?php echo "Update Password"; ?></thead>
                        <?php $this->loadPartialView("../includes/_message") ?>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
                                <form role="form" action="" method="post" onSubmit="return validate();">
                                    <div class="form-group">
                                        <label>Old Password</label>
                                        <input class="form-control" type="password" id="old_password" name="Users[oldPassword]">
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
                                    <button type="submit" class="btn btn-success" name="confirm" id="create" disabled>Change Password</button>
                                    <a href="<?php echo LINK_URL . "site"; ?>/index" class="btn btn-danger" >Cancel</a>
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

<script src="<?php echo PUBLIC_URL; ?>bootstrap/js/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            console.log("Jquery Loaded");
            $("#old_password").blur(function () {

                //$("#emailExists").html("Updated");

                var password = $(this).val();
                $.ajax({
                    url: '<?php echo LINK_URL ?>user/checkPassword',
                    type: 'POST',
                    data: {password: password},
//                    beforeSend: function (data) {
//                        //$("#emailExists").addClass("checkEmail");
//                    },
                    success: function (data) {
                        console.log(data);
                        $("#emailExists").removeClass("checkEmail");
                        if (data == "false") {
                            $("#emailExists").addClass("error");
                            $("#emailExists").html("Incorrect Password");
                            document.getElementById("create").disabled = true;
                        }
                        if (data == "true") {
                            $("#emailExists").addClass("success");
                            $("#emailExists").html("Correct Password");
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