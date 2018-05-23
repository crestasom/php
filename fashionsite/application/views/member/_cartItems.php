<?php if ($cartItems): ?>
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
                    <td ><a id="emptyCart"><i class="fa fa-trash-o" data-toggle="tooltip" data-placement="top" title="Empty Cart" data-original-title="Tooltip on top" aria-describedby="tooltip246845"></i></a></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($cartItems as $row):
                    //print_r($row);exit;
                    $images = explode(",", $row->image);
                    $stockData = $stock->findById($row->stock_id);
                    ?>
                    <tr>
                        <td class="cart_product">
                            <a href=""><img src="<?php echo IMAGE_URL . "product/" . $images[0] ?>" height="100px" width="100px" alt=""></a>
                        </td>
                        <td class="cart_description">
                            <h4><?php echo $row->title ?></h4>
                        </td>
                        <td class="cart_description">
                            <h4><a href=""><?php echo $row->size ?></a></h4>
                        </td>
                        <td class="cart_price">
                            <p>Rs. <?php echo $row->price ?></p>
                        </td>
                        <td class="cart_quantity">
                            <div class="cart_quantity_button">
                                <input class="cart_quantity_input" id="cartqty<?php echo $row->id ?>" onchange="javascript:updateQty(<?php echo $row->id . "," . $row->price ?>);" type="number" min="1" max="<?php echo $stockData->quantity > 5 ? 5 : $stockData->quantity; ?>" name="quantity" value="<?php echo $row->quantity ?>" autocomplete="off" size="2">
                            </div>
                        </td>
                        <td class="cart_total">
                            <p class="cart_total_price">Rs. <span id="carttotal<?php echo $row->id; ?>"><?php echo $row->quantity * $row->price ?></span> </p>
                        </td>
                        <td class="cart_delete">
                            <a class="cart_quantity_delete" cart_id="<?php echo $row->id ?>" id="cartRemove"><i class="fa fa-times"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>

        <section id="do_action">
            <div class="container">
                <div class="heading">
                    <h3>Cart Description</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="total_area">
                            <ul>
                                <li>Cart Total <span>Rs.<span id="cartAmt"> <?php echo Functions::getCartAmount(); ?></span></span></li>

                            </ul>
                            <a class="btn btn-default check_out" href="<?php echo LINK_URL . controller ?>/checkout">Check Out</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php else: ?>
    <tr><td><h3><b>No Item in cart..Please add some..</b></h3></td></tr>
<?php endif; ?>

<script>
    function updateQty(cart_id, price) {
        var qty = $("#cartqty".concat(cart_id)).val();
        //alert(qty);
        $.ajax({
            url: "<?php echo LINK_URL; ?>member/updateCartQty",
            type: "POST",
            dataType: "json", //define the type of data recieved/response
            data: {cart_id: cart_id, quantity: qty},
            beforeSend: function (data) {
                console.log(data);
            },
            success: function (data) {
                //alert('success');
                //console.log(data);
                if (data.cartAmt) {
                    //alert(data.cartAmt);
                    $("#carttotal".concat(cart_id)).html(qty * price);
                    $("#cartAmt").html(data.cartAmt);
                    //$("#forAjaxMessage").html(data.success);
                }
                if (data.error) {
                    //alert(data.error);
                    $("#forAjaxMessage").addClass("error");
                    $("#forAjaxMessage").html(data.error);
                }
                //$("#cartItems").html(data.cartItems)
                //$('html,body').animate({scrollTop:$('#page').offset().top},400);
                //alert(data); 
            }


        });
        return false;
    }
    ;

    $(document).ready(function () {
        //console.log("jquery loaded");
        $(".cart_quantity_delete").click(function () {// class of the remove from cart link
            //alert("just clicked");
            var cart_id = $(this).attr('cart_id');
            console.log(cart_id);
            var userConfirm = confirm("Are you sure you want to remove this item?");
            if (userConfirm) {

                $.ajax({
                    url: "<?php echo LINK_URL; ?>member/removeCartItem",
                    type: "POST",
                    data: {id: cart_id},
                    // beforeSend: function (data) {
                    // console.log(loading...);
                    //  },
                    success: function (data) {
                        console.log(data);
                        $("#forAjaxMessage").addClass("success");
                        $("#forAjaxMessage").html(data.success);
                        $("#cartTbl").html(data.cartList);
                        $("#cartCount").html(data.cartCount);
                        $("#cartAmt").html(data.cartAmt);
                        //$("#cartItems").html(data.cartItems)
                        $('html, body').animate({scrollTop: $("#page").offset().top}, 4000);
                        //alert(data);
                    },
                    dataType: "json" //define the type of data recieved/response
                });
            }
            return false;
        });

        //to empty cart
        $("#emptyCart").click(function () {// class of the remove from cart link
            //alert("just clicked");
            //var cart_id = $(this).attr('cart_id');
            //console.log(cart_id);
            var userConfirm = confirm("Are you sure you want to remove all items from cart?");
            if (userConfirm) {

                $.ajax({
                    url: "<?php echo LINK_URL; ?>member/emptyCart",
                    // beforeSend: function (data) {
                    // console.log(loading...);
                    //  },
                    success: function (data) {
                        console.log(data);
                        $("#forAjaxMessage").addClass("success");
                        $("#forAjaxMessage").html(data.success);
                        $("#cartTbl").html(data.cartList);
                        $("#cartCount").html(data.cartCount);
                        $("#cartAmt").html(data.cartAmt);
                        //$("#cartItems").html(data.cartItems)
                        $('html, body').animate({scrollTop: $("#page").offset().top}, 4000);
                        //alert(data);
                    },
                    dataType: "json" //define the type of data recieved/response
                });
            }
            return false;
        });

    });
</script>