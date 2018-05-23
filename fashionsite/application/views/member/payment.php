

        <div id="registration">
            <h2>Payment Process</h2>

            <h4>Please Wait.. We are redirecting you to <?php echo $method;?></h4>
            <?php if($_SESSION['payment']=='paypal'){
                $this->loadPartialView("payment/_paypal",array('cartTotal'=>$cartTotal));
            }elseif($_SESSION['payment']=='esewa'){
                $this->loadPartialView("payment/_esewa",array('cartTotal'=>$cartTotal));
            }
                ?>
        </div>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>

        
