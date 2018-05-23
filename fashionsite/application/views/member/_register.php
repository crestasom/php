<html>
<head>Restore Password</head>
<body>
<div>
        <?php if ($type == 'register'): ?>
            Dear <?php echo $email; ?>,
            <p>Thank you for joining us.We are sure that you will love our product.
                please click on the following link to verify your account.</p>
            <p><a href="<?php echo LINK_URL ?>member/verify/<?php echo $secretKey; ?>">Click here to verify</a></p>
            Have a great Shopping
        <?php elseif($type=='restorePassword'): ?>
            Dear <?php echo $email;?>,
            Your verification code is <b><?php echo $secretKey;?>></b>.
            Thank You
        <?php endif; ?>
</div>
</body>
</html>