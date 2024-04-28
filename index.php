<?php include("includes/header.php"); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-body mt-2">
            <?php message(); ?>
            <form action="InsertCode.php" method="POST" enctype="multipart/form-data">
                <div class="row">

                    <div class="col-md-5 mb-3">
                      <label for="">Select Product *</label>
                      <select class="form-select mySelect2" name="product_id" id="inputGroupSelect01" required>
                        <option value="">---select Product---</option>
                        <?php
                        $product = getAll('products');
                        if($product){
                            if(mysqli_num_rows($product) > 0){
                                foreach($product as $prod){
                                    ?><option value="<?php echo $prod['id'] ?>"><?php echo $prod['name'] ?></option><?php
                                }
                            }
                        }else{
                            ?><option value="">No Data Found.</option><?php
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-5 mb-3">
                        <label for="">Qauntity</label>
                        <input type="number" name="order_qty" value="1" required class="form-control">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label></label>
                        <button type="submit" name="filter" class="btn btn-primary"style="width:100%">Filter</button>
                    </div>
                </div>
            </form>

        </div>
        <div class="card-body" id="productArea">
            <div class="table-responsive mb-3" id="productContent">
                <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Qauntity</th>
                                <th>Total Price</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                               $i = 1; 
                               $IP = $_SERVER['REMOTE_ADDR'];
                               $total =0;
                               $tax =0;
                               $fetch = mysqli_query($con, "SELECT * FROM temporary_card WHERE `user_ip`='$IP' ORDER BY id DESC");
                               if(mysqli_num_rows($fetch) > 0){
                                  while($row = mysqli_fetch_assoc($fetch)){
                                    $price = $row['product_price'];
                                    $qty = $row['product_qty'];
                                    $name = $row['product_name'];
                                    $total +=$row['product_price'] * $row['product_qty'];

                                    $check = mysqli_query($con, "SELECT * FROM products WHERE `name`='$name'");
                                    $nrow = mysqli_fetch_assoc($check);
                                    $QTY = $nrow['quantity'];
                                    ?>
                                    <tr>
                                    <td><?= $i++; ?></td>
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['product_price']; ?></td>
                                    <td>
                                        <div class="input-group qtyBox">
                                            <input type="hidden" class="prodId" value="<?php echo $row['id'] ?>">
                                            <input type="hidden" class="prodQty" value="<?php echo $QTY ?>">

                                            <button class="input-group-text decrement">-</button>
                                            <input type="number" value="<?php  echo $row['product_qty'] ?>" class="qty quantityInput">
                                            <button class="input-group-text increment">+</button>

                                        </div>
                                    </td>
                                    <td><?= number_format(($price * $qty), 0); ?></td>
                                    <td>
                                        <a href="delete.php?order_id=<?php echo $row['id'] ?>" class="btn btn-danger">Remove</a>
                                    </td>
                                  </tr>
                                    <?php
                                  }
                               }
                               ?>
                               <tr>
                                   <td colspan="4" align="end" style="font-weight: bold">Sub Total: </td>
                                   <td clospan="1" style="font-weight:bold"><?= number_format($total,0); ?></td>
                               </tr>
                               <tr>
                                   <td colspan="4" align="end" style="font-weight: bold">Tax (18%): </td>
                                   <td clospan="1" style="font-weight:bold"><?= number_format($tax,0); ?></td>
                               </tr>
                               <tr>
                                   <td colspan="4" align="end" style="font-weight: bold">Customer Bonas: </td>
                                   <td clospan="1" style="font-weight:bold"><?= number_format(100,0); ?></td>
                                   <td clospan="2"><button type="submit" class="btn btn-info" id="proceedToBonus">Bonus</button></td>
                               </tr>
                               <tr>
                                   <td colspan="4" align="end" style="font-weight: bold">Grand Total: </td>
                                   <td clospan="1" style="font-weight:bold"><?= number_format($total - 100,0); ?></td>
                               </tr>
                        </tbody>
                </table>
            </div>
            <div class="mt-2">
                <hr>
                <div class="row">
                    <div class="col-md-4">
                        <label>Select Payment Mode</label>
                        <select name="payment" id="payment_mode" class="form-control">
                            <option value="">-- Select Pyament --</option>
                            <option value="cash_payment">Cash Payment</option>
                            <option value="bank_payment">Bank Payment</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label>Enter Customer Phone Number</label>
                        <input type="phone" id="cphone" name="cphone" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <br>
                        <button type="submit" class="btn btn-warning w-100 proceedToPlace">Proceed to place order</button>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
<!-- ------- customer add record modal ----------- -->
<div class="modal" id="addCustomerModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add Customer</h5>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="">Name *</label>
                    <input type="text" id="c_name" placeholder="Name" required class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Email *</label>
                    <input type="email" id="c_email" placeholder="Email" class="form-control">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Phone *</label>
                    <input type="number" id="c_phone" placeholder="Phone" required class="form-control">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="">Is Active</label>
                    <input type="checkbox" name="is_ban" style="width:30px;height:20px">
                </div>
            </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveCustomer">Save</button>
      </div>
    </div>
  </div>
</div>
 <!-- ------- customer Bonus add --------- -->

</div>

<?php include("includes/footer.php"); ?>