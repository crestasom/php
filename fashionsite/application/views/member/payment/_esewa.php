<form  id="confirm" action = "http://dev.esewa.com.np/epay/main" method="POST">
<input value="<?php echo (int)($cartTotal*.95); ?>" name="tAmt" type="hidden">
<input value="<?php echo (int)($cartTotal*.95); ?>" name="amt" type="hidden">
<input value="0" name="txAmt" type="hidden">
<input value="0" name="psc" type="hidden">
<input value="0" name="pdc" type="hidden">
<input value="nec" name="scd" type="hidden">
<input value="XYZ-1234" name="pid" type="hidden">
<input value="http://shresthasom.com.np<?php echo LINK_URL; ?>member/payment/success" type="hidden" name="su">
<input value="http://shresthasom.com.np<?php echo LINK_URL; ?>member/payment/failure" type="hidden" name="fu">
</form>
 <script>
        $(document).ready(function () {
            $("#confirm").submit();
        });
    </script>