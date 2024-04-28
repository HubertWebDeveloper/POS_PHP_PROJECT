<?php include("includes/header.php"); ?>
<?php if(isset($_SESSION['cphone'])){ ?>
<div class="container-fluid px-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card mt-4">
                <div class="card-header">
                    <h4 class="mb-0">Order Summary
                        <a href="index.php" class="btn btn-info float-end">Back to Create Order</a>
                    </h4>
                    <div class="card-body">
                        <?php //alertMessage(); ?>

                        <div id="myBillingArea">
                            <?php
                                 $phone = validate($_SESSION['cphone']);
                                 $invoiceNo = validate($_SESSION['invoice_no']);

                                 $customerQuery = mysqli_query($con, "SELECT * FROM customers WHERE phone='$phone' LIMIT 1");
                                 if($customerQuery){
                                    if(mysqli_num_rows($customerQuery) > 0){
                                        $customerRow = mysqli_fetch_assoc($customerQuery);

                                        ?>
                                           <table style="width:100%;margin-bottom:20px">
                                              <tbody>
                                                 <tr>
                                                    <td style="text-align:center" colspan="2">
                                                       <h4 style="font-size:23px;line-height: 30px;margin:2px;padding:0">Company Address</h4>
                                                       <p style="font-size:16px;line-height: 24px;margin:2px;padding:0">#address, 3rd cross, kigali, rwanda.</p>
                                                       <p style="font-size:16px;line-height: 24px;margin:2px;padding:0">P.O BOX or website.</p>
                                                    </td>
                                                 </tr>
                                                 <tr>
                                                    <td>
                                                       <h5 style="font-size:20px;line-height: 30px;margin:2px;padding:0">Customer Details</h5>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Customer Name: <?php echo $customerRow['name'] ?></p>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Customer Phone No: <?php echo $customerRow['phone'] ?></p>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Customer Email Id: <?php echo $customerRow['email'] ?></p>
                                                    </td>
                                                    <td align="end">
                                                       <h5 style="font-size:20px;line-height: 30px;margin:2px;padding:0">Invoice Details</h5>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Invoice No: <?php echo $invoiceNo ?></p>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Invoice Date: <?php echo date('d M Y') ?></p>
                                                       <p style="font-size:14px;line-height: 20px;margin:2px;padding:0">Address: Main road, Kigali, Rwanda</p>
                                                    </td>
                                                 </tr>
                                              </tbody>
                                           </table>
                                        <?php
                                    }else{
                                        echo "No Customer Found.";
                                        return;
                                    }
                                 }
                              }else{
                                echo "<script>window.open('index.php','_self')</script>";
                              }
                            ?>
                            <!-- ----- display product list ------- -->
                            <div class="table-responsive mb-1">
                                <table style="width:100%" cellpadding="5">
                                  <thead>
                                      <tr>
                                        <th align="start" style="border-bottom:1px solid #ccc" width="5%">ID</th>
                                        <th align="start" style="border-bottom:1px solid #ccc">Product Name</th>
                                        <th align="start" style="border-bottom:1px solid #ccc" width="10%">Price</th>
                                        <th align="start" style="border-bottom:1px solid #ccc" width="10%">Quantity</th>
                                        <th align="start" style="border-bottom:1px solid #ccc" width="15%">Total Price</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                                      $select = mysqli_query($con, "SELECT * FROM temporary_card");
                                      $count = mysqli_num_rows($select);
                                      $i=0;
                                      $total =0;
                                      if($count > 0){
                                        while($row = mysqli_fetch_assoc($select)){
                                            $i++;
                                            $total +=$row['product_price'] * $row['product_qty'];
                                            ?>
                                            <tr>
                                                <td style="border-bottom:1px solid #ccc"><?= $i; ?></td>
                                                <td style="border-bottom:1px solid #ccc"><?= $row['product_name'] ?></td>
                                                <td style="border-bottom:1px solid #ccc"><?= $row['product_price'] ?></td>
                                                <td style="border-bottom:1px solid #ccc"><?= $row['product_qty'] ?></td>
                                                <td style="border-bottom:1px solid #ccc"><?= number_format($row['product_price'] * $row['product_qty'],0) ?></td>
                                            </tr>
                                            <?php
                                        }
                                      }else{
                                        echo "No Data Found.";
                                      }
                                    ?>
                                    
                                    <tr>
                                        <td colspan="4" align="end" style="font-weight: bold">Grand Total: </td>
                                        <td clospan="1" style="font-weight:bold"><?= number_format($total,0); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" align="end" style="font-weight: bold">Payment Mode: </td>
                                        <td clospan="1" style="font-weight:bold;width:100%"><?php echo $_SESSION['payment_mode'] ?></td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" style="width:100%;text-align:center;font-weight:normal;font-style: italic;color:#D5D8DC">This #<?= $_SESSION['invoice_no'] ?> Invoice has provided by hubert hirwa.</th>
                                    </tr>
                                  </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php"); ?>