<div class="col-sm-9 padding-right" id="page">
    <div id="forAjaxMessage">&nbsp;</div>
    <div class="product-details"><!--product-details-->
        <div class="col-sm-5">
            <div class="view-product">
                <img src="<?php echo IMAGE_URL . "product/" . $images[0] ?>" class="magnify" id="imageMain"/>

            </div>
            <div id="similar-product" class="carousel" >

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <div class="item active">
                        <?php foreach ($images as $img): ?>
                        <img id="imgData" class="magnify" src="<?php echo IMAGE_URL . "product/" . $img ?>"  width="80" alt="" onmouseover="changeImage('<?php echo MAIN_URL."uploads/files/product/" . $img?>')">
                        <?php endforeach; ?>
                    </div>

                    <!-- Controls -->
                    
                </div>

            </div>
        </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2><?php echo $product->title ?></h2>
                    <span>
                        <span>Rs. <?php echo $product->price ?></span><br/>
                        Size:<select name="size" id="size" onchange="updateMax()">
                            <?php 
                            $stockqty=array();
                            foreach ($stockData as $row):
                                $stockqty[$row->id]=$row->quantity;?>
                            <option  value="<?php echo $row->id; ?>"><?php echo $row->size; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <label>Quantity:</label>
                        <input type="number" id="quantity" value="1" min="1" max="5" name="quantity"  />
                        <button type="button" class="btn btn-fefault cart" id="submit" product_id="<?php echo $product->id ?>">
                            <i class="fa fa-shopping-cart"></i>
                            Add to cart
                        </button>
                    </span>
                    <p><b>Availability:</b> In Stock</p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b> <?php echo $manufacturer->getManuTitle($product->manufacturer_id) ?></p>
                </div><!--/product-information-->
            </div>
        </div><!--/product-details-->

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Details</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane active in" id="details" >
                   <?php '<pre>';
                   echo $product->detail;
                   ?>
                </div>

            </div>
        </div><!--/category-tab-->
         <script>
                $(document).ready(function () {
                    console.log("jquery loaded");
                    $("#submit").click(function () {//.btn_form is class of the add to cart link
                        //alert("just clicked");
                        var product_id = $(this).attr('product_id');
                        var stock_id = document.getElementById('size').value;
                        //alert(product_id);exit;
                        var qty = document.getElementById('quantity').value;
                        console.log(product_id);
                        $.ajax({
                            url: "<?php echo LINK_URL; ?>member/addtocart.html",
                            type: "POST",
                            dataType: "json", //define the type of data recieved/response
                            data: {id: stock_id, quantity: qty},
                            beforeSend: function (data) {
                                console.log(data);
                            },
                            success: function (data) {
                                //alert('success');
                                console.log(data);
                                if (data.success) {
                                    // alert(data.success);
                                    $("#forAjaxMessage").addClass("success");
                                    $("#forAjaxMessage").html(data.success);
                                }
                                if (data.error) {
                                    //alert(data.error);
                                    $("#forAjaxMessage").addClass("error");
                                    $("#forAjaxMessage").html(data.error);
                                }
                                $("#cartCount").html(data.cartItems)
                                $('html,body').animate({scrollTop: $('#page').offset().top}, 400);
                                //alert(data); 
                            }


                        });
                        return false;
                    });
                    

                })






            </script>
        
        <script>
            function updateMax(){
                //alert("Javascript alert");
                var obj = <?php echo json_encode($stockqty); ?>;
                var size=document.getElementById("size").value;
                var qty=obj[size];
                //alert(qty);
                qty=qty>5?5:qty;
               // alert(qty);
                document.getElementById("quantity").setAttribute("value", 1); 
                document.getElementById("quantity").setAttribute("max", qty); 
            }
            </script>
             <script>
                function changeImage(imageName) {
                    //console.log(imageName);exit;
                    var image = document.getElementById('imageMain');
                        image.src = imageName;
                        return false;
                    
                }

            </script>
    </div>