<?php include("includes/header.php"); ?>

<div class="container-fluid px-4">
  <h4 class="mt-4">Admins Manager</h4>
  <?php message(); ?>
  <ol class="breadcrumb mb-4">
    <!-- -------------------- admins page ----------------- -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="admins" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Admins</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--
              * display the multiple tables
              * display form
              -->

              <?php include("tabs/admin_tab.php") ?>
              <!-- ----------------end here -------------- -->
          </div>
          <div class="modal-footer">
            <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button> -->
          </div>
        </div>
      </div>
    </div>
     <!-- -------------------- Customers page ----------------- -->
     <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="customers" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Customers</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--
              * display the multiple tables
              * display form
              -->

              <?php include("tabs/customer_tab.php") ?>
              <!-- ----------------end here -------------- -->
          </div>
          <div class="modal-footer">
            <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------- Customers page ----------------- -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="category" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-ml">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Category</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--
              * display the multiple tables
              * display form
              -->

              <?php include("tabs/category_tab.php") ?>
              <!-- ----------------end here -------------- -->
          </div>
          <div class="modal-footer">
            <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------- Customers page ----------------- -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="products" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Products</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!--
              * display the multiple tables
              * display form
              -->

              <?php include("tabs/product_tab.php") ?>
              <!-- ----------------end here -------------- -->
          </div>
          <div class="modal-footer">
            <!-- <button class="btn btn-primary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Open second modal</button> -->
          </div>
        </div>
      </div>
    </div>
    <!-- -------------------------- edit form here ------------------------- -->
    <?php //include("popup/adminEdit.php"); ?>
    
  </ol>
<button class="btn me-2 mt-2" data-bs-target="#admins" data-bs-toggle="modal">Admins</button>
<button class="btn me-2 mt-2" data-bs-target="#customers" data-bs-toggle="modal">Customers</button>
<button class="btn me-2 mt-2" data-bs-target="#category" data-bs-toggle="modal">Prod Category</button>
<button class="btn me-2 mt-2" data-bs-target="#products" data-bs-toggle="modal">Products</button>
<!-- -------------------- box dev  ----------------- -->
<?php 
  // display all customers are in database
  $list_cust = mysqli_query($con, "SELECT * FROM `customers`");
  $counts_cust = mysqli_num_rows($list_cust);
  // display all categories are in database
  $list_categ = mysqli_query($con, "SELECT * FROM `category`");
  $counts_categ = mysqli_num_rows($list_categ);
  // display all products are in database
  $list_prod = mysqli_query($con, "SELECT * FROM `products`");
  $counts_prod = mysqli_num_rows($list_prod);
  // display all products are Out of Stock
  $list_stock = mysqli_query($con, "SELECT * FROM `products` WHERE `quantity`='0'");
  $counts_stock = mysqli_num_rows($list_stock);
?>
<div class="box" style="display:flex;flex-wrap:wrap;gap:20px;justify-content:center">

    <button type="button" class="col-md-2 mb-3 mt-3 btn btn-primary position-relative">
      <i style="width:60px;height:60px" class="fa fa-users"></i>
      <p>Customers</p>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php echo $counts_cust ?>
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>

    <button type="button" class="col-md-2 mb-3 mt-3 btn btn-primary position-relative">
      <i style="width:60px;height:60px" class="fa fa-list-alt"></i>
      <p>Categories</p>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php echo $counts_categ ?>
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>

    <button type="button" class="col-md-2 mb-3 mt-3 btn btn-primary position-relative">
      <i style="width:60px;height:60px" class="fa fa-shopping-cart"></i>
      <p>Products</p>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php echo $counts_prod ?>
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>
    
    <button type="button" class="col-md-2 mb-3 mt-3 btn btn-primary position-relative">
      <i style="width:60px;height:60px" class="fa fa-cart-arrow-down"></i>
      <p>Out Of Stock</p>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        <?php echo $counts_stock ?>
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>

    <button type="button" class="col-md-2 mb-3 mt-3 btn btn-primary position-relative">
      <i style="width:60px;height:60px" class="fa fa-home"></i>
      <p>Inbox</p>
      <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
        99+
        <span class="visually-hidden">unread messages</span>
      </span>
    </button>
</div>
<!-- --------------------- displayed table --------------- -->
<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-body mt-2">
            <?php
                $admins = getAll('admins');
                $i=0;
                if(mysqli_num_rows($admins) > 0){
            ?>
            <div class="table-responsive">
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Password</th>
                          <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <?php foreach($admins as $admin) : $i++; $id = $admin['id']; ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $admin['name']?></td>
                            <td><?= $admin['email']?></td>
                            <td><?= $admin['phone']?></td>
                            <td><?= $admin['password']?></td>
                            <td>
                                <?php 
                                if($admin['active'] == '0'){
                                    echo "<label style='color:red'>No Active</label>";
                                    }else{
                                        echo "<label style='color:green'>Active</label>";
                                    } ?></td>
                        </tr>
                        <?php endforeach; ?> 
                    </tbody>
                </table>
            </div>
            <?php
                }else{
                    ?>
                    <tr>
                      <td colspan="4">No Record Found</td>
                    </tr> 
                    <?php
                }
            ?>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>