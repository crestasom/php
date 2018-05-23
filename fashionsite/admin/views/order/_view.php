<section class="content">
    <div class="portlet">    
        <div class="portlet-content" style="border-top: none !important;margin:4px;">
            <div id="order_dtl" style="float:left;width:280px;">
                <h2>Transaction Details</h2>

                <span style="font-weight:bold">Customer:</span> 	<?php echo $viewData->contactName ?><br />
                <span style="font-weight:bold">Address:</span> 	<?php echo $viewData->contactAddress ?><br />
                <span style="font-weight:bold">Contact:</span> 	<?php echo $viewData->contactPhone ?><br />
                <span style="font-weight:bold">E-Mail:</span> 	<?php echo $viewData->contactEmail ?><br />

            </div>

            <div id="payment_details" style="float:left;width:280px;margin:4px;">
                <h2>Payment Details</h2>
                <?php //print_r($paymentDetail);exit;?>
                <span style="font-weight:bold"> Payment Method:</span> <?php echo ucfirst($paymentDetail->payway) ?><br />
                <span style="font-weight:bold">TransactionID:</span> <?php echo $paymentDetail->transactionKey ?><br />
                <span style="font-weight:bold">Amount:</span> <?php echo $paymentDetail->amount ?> <br />

            </div>
            <br />
            <hr />
            <div style="clear:both;"></div>
            <div id="payment_details" style="float:left;width:280px;margin:4px;">
                <h2>Order Details (from buyer)</h2>
                <div id="product_details" style="width:50%">
                    <table id="example2" class="table table-bordered table-hover" width="100%">
                        <thead>
                            <tr>
                                <th width="200%" scope="col">Item Name</th>
                                <th width="109" scope="col">Quantity</th>
                                <th width="109" scope="col">Size</th>
                                <th width="109" scope="col">Rate</th>
                                <th width="171" scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($orderDetail as $row) {
                                $productDetail = $model->getProductDetail($row->stock_id);
                                ?>
                                <tr>
                                    <td width="200%"><?php echo $productDetail['title'] ?></td>
                                    <td><?php echo $row->quantity ?></td>
                                    <td><?php echo $productDetail['size'] ?></td>
                                    <td><?php echo $productDetail['price'] ?></td>
                                    <td><?php echo $productDetail['price'] * $row->quantity ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>   
                    </table>

                </div>
            </div>
        </div>
        <tr>
<?php if(!$viewData->status):?>
        <a href="<?php echo LINK_URL . controller; ?>/changeStatus/<?php echo $viewData->id?>" class="btn btn-success" >Mark as Delivered</a>
        <?php endif;?>
        <a href="<?php echo LINK_URL . controller; ?>/index" class="btn btn-danger" >Back</a>

        </tr>
</section>







<div class="panel-body">

    <div class="box-solid box-primary" span="12">
        <table id="sample-table" class="table " style=" width:'18px'">
            </tbody>
        </table>
    </div>
</div>