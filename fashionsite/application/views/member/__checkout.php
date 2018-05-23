<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active">Check out</li>
            </ol>
        </div><!--/breadcrums-->
        <?php $this->loadPartialView("..\includes\_message");?>
        <div class="shopper-informations">
            <div class="row">
                <div class="col-sm-5 clearfix">
                    <div class="bill-to">
                        <p>Delivery Information</p>
                        <p><h5 style="color:#00F"> Use any payment gateway to get 5% discount</h5></p>
                        <div class="form-one">
                            <form method="post" action="<?php echo LINK_URL; ?>member/payment_method">
                                <div> <input type="checkbox" id="autocomplete" onclick="updateDeliveryInfo()" > <b>Use Account Information</b></div>
                                <input type="text" id="deliveryName" placeholder="Name*" name="delivery[name]" pattern="[a-z\sA-Z]+" required="" title="Mane should only contain alphabets">
                                <input type="text" id="deliveryAddress" placeholder="Address*" name="delivery[address]" required="">
                                <input type="email" id="deliveryEmail" placeholder="Email*" name="delivery[email]" required="">
                                <input type="text" id="deliveryPhone" placeholder="Phone No.*" name="delivery[phone]" required=""pattern="[0-9]{7,10}" title="Phone no. should be 7-10 digit long.">
                                <label>
                                    Payment Method
                                </label>
                                <li><input type="radio" name="payment_method" value="cod"></input>
                                    <label for="payment_method_cash">Cash on Delivery</label></li>
                                <li><input type="radio" name="payment_method" value="esewa"></input>
                                    <label for="payment_method_esewa">Esewa</label></li>
                                <li><input type="radio" name="payment_method" value="paypal" checked="checked"></input>
                                    <label for="payment_method_paypal">paypal</label></li>

                                <input type="submit" value="Continue" class="btn btn-primary" >
                            </form>
                        </div>
                    </div>
                </div>
                <div class="review-payment">
                    <h2>Review & Payment</h2>
                </div>

                <div class="table-responsive cart_info col-sm-7 clearfix">
                    <table class="table table-condensed">
                        <thead>
                            <tr class="cart_menu">
                                <td class="image">Item</td>
                                <td class="description"></td>
                                <td class="price">Price</td>
                                <td class="quantity">Quantity</td>
                                <td class="total">Total</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($cartItems as $row): 
                                $images=explode(",",$row->image);
                                ?>
                                <tr>
                                    
                                    <td class="cart_product">
                                        <a href=""><img src="<?php echo IMAGE_URL."product/".$images[0] ?>" width="100px" alt=""></a>
                                    </td>
                                    <td class="cart_description">
                                        <h4><a href=""><?php echo $row->title ?></a></h4>
                                    </td>
                                    <td class="cart_price">
                                        <p><?php echo $row->price ?></p>
                                    </td>
                                    <td class="cart_quantity">
                                        <p><?php echo $row->quantity ?></p>
                                    </td>
                                    <td class="cart_total">
                                        <p class="cart_total_price"><?php echo $row->price * $row->quantity; ?></p>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="4">&nbsp;</td>
                                <td colspan="2">
                                    <table class="table table-condensed total-result">
                                        <tr>
                                            <td>Total</td>
                                            <td><span><?php echo Functions::getCartAmount(); ?></span></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</section> <!--/#cart_items-->
<script>
    function updateDeliveryInfo(){
        var memberInfo=<?php echo json_encode($member); ?>;
        if(document.getElementById("autocomplete").checked){
            var address=memberInfo["address"]?memberInfo["address"]:"";
            var phone=memberInfo["mobile"]?memberInfo["mobile"]:"";
            var email=memberInfo["email"]?memberInfo["email"]:"";
        document.getElementById("deliveryName").setAttribute("value", memberInfo["fullname"]); 
        document.getElementById("deliveryAddress").setAttribute("value", address);
        document.getElementById("deliveryEmail").setAttribute("value", email);
        document.getElementById("deliveryPhone").setAttribute("value", phone); 
    }else{
        document.getElementById("deliveryName").setAttribute("value", ""); 
        document.getElementById("deliveryAddress").setAttribute("value", "");
        document.getElementById("deliveryEmail").setAttribute("value", "");
        document.getElementById("deliveryPhone").setAttribute("value", ""); 
        document.getElementById("deliveryName").setAttribute("placeholder", "Name*"); 
        document.getElementById("deliveryAddress").setAttribute("placeholder", "Address*");
        document.getElementById("deliveryEmail").setAttribute("placeholder", "Email*");
        document.getElementById("deliveryPhone").setAttribute("placeholder", "Phone No.*"); 
    }
    }
    </script>