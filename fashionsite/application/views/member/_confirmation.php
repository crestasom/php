
 Dear <?php echo $deliveryInfo['contactEmail']; ?>,
            <p>We have received your following orders.</p>
<div class="table-responsive cart_info" id="cartTbl">
    <table class="table table-condensed">
        <thead>
            <tr class="cart_menu">
                <td class="image">Item</td>
                <td class="description"></td>
                <td class="size">Size</td>
                <td class="price">Price</td>
                <td class="quantity">Quantity</td>
                <td class="total">Total</td>
                <td></td>
            </tr>
        </thead>
        <tbody>

            <?php
            foreach ($cartRecords as $row):
                //print_r($row);exit;
                $images=explode(",",$row->image);
                ?>
                <tr>
                    <td class="cart_product">
                        <a href=""><img src="<?php echo IMAGE_URL."product/".$images[0] ?>" height="100px" width="100px" alt=""></a>
                    </td>
                    <td class="cart_description">
                        <h4><?php echo $row->title ?></h4>
                    </td>
                    <td class="cart_description">
                        <h4><?php echo $row->size ?></h4>
                    </td>
                    <td class="cart_price">
                        <p>Rs. <?php echo $row->price ?></p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <input class="cart_quantity_input" type="text" name="quantity" value="<?php echo $row->quantity ?>" autocomplete="off" size="2">
                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">Rs. <span id="carttotal<?php echo $row->id; ?>"><?php echo $row->quantity * $row->price ?></span> </p>
                    </td>
                </tr>
            <?php endforeach; ?>

        </tbody>
    </table>
    <table>
        <thead><h3>Shipping Details:</h3></thead>
    <tr><td>Delivery No.:<?php echo $delivery_id;?></td></tr>
    <tr><td>Name:<?php echo $deliveryInfo['contactName'];?></td></tr>
    <tr><td>Email:<?php echo $deliveryInfo['contactEmail'];?></td></tr>
    <tr><td>Address:<?php echo $deliveryInfo['contactAddress'];?></td></tr>
    <tr><td>Phone:<?php echo $deliveryInfo['contactPhone'];?></td></tr>
    <tr><td>Payment Method:<?php echo $payment_method;?></td></tr>
        
    </table>
</div>

