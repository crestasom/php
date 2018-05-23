<?php
    $paypalMode = 0; //0 for sandbox, 1 for production (live) mode

    if ($paypalMode == 0) {
        ?><form name="confirmation" id="confirmation" method="post" action="https://www.sandbox.paypal.com/cgi-bin/webscr">
            <input type="hidden" name="business" value="somps012348-facilitator@nec.edu.np">

        <?php } else {
            ?>
            <form name="confirmation" id="confirmation" method="post" action="https://www.paypal.com/cgi-bin/webscr">
                <input type="hidden" name="business" value="somps012348-facilitator@nec.edu.np">
            <?php } ?>

            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="rm" value="2">
            <input type="hidden" name="amount" value="<?php echo ($cartTotal/100)*.95; ?>">
            <input type="hidden" name="return" value="http://localhost<?php echo LINK_URL; ?>member/payment/success">
            <input type="hidden" name="cancel_return" value="http://localhost<?php echo LINK_URL; ?>member/payment/failure">
            <input type="hidden" name="item_name" value="Shopping cart payment">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="no_note" value="0">

        </form>
    
    <script>
        $(document).ready(function () {
            $("#confirmation").submit();
        });
    </script>