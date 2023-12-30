<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>

<div class="container mt-3">
    <h5 class="fw-bold fs-5" style="color:#334155" >User Summary</h5>
    <hr>
</div>
<div class="container mt-4" style="margin-left:50px;">
    <div class="row">
        <a href="addAdmin.php" class="col-md-3 card me-2 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/admin.png" alt="" width="30px" height="100px">
            Add Admin
        </a>
        <a href="addStuff.php" class="col-md-3 card me-2 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/stuff.png" alt="" width="30px" height="100px">
            Add Stuff
        </a>
        <a href="addCustomers.php" class="col-md-3 card me-2 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/addCustomer.png" alt="" width="30px" height="100px">
            Add Customer
        </a>
        <a href="addSupplier.php" class="col-md-3 card text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/addSupplier.png" alt="" width="30px" height="100px">
            Add Supplier
        </a>
        <a href="allAdmin.php " class="col-md-3 card me-2 mt-4 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/adminPic.png" alt="" width="40px" height="100px">
            All Admin
        </a>
        <a href="allStuff.php" class="col-md-3 card me-2 mt-4 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/employee.png" alt="" width="40px" height="100px">
            All Stuff
        </a>
        <a href="allCustomer.php" class="col-md-3 card me-2 mt-4 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/customer.png" alt="" width="40px" height="100px">
            All Customer
        </a>
        <a href="allSupplier.php" class="col-md-3 card mt-4 text-center fw-semibold fs-5" style="width: 16rem; height: 8rem; background-color:#334155; color:aliceblue; text-decoration:none;">
            <img src="image/supplier.png" alt="" width="40px" height="100px">
            All Supplier
        </a>
    </div>
</div>
<!-- <div class="container mt-3">
    <h5 class="fw-bold fs-5" style="color:#334155" >Stock Summary</h5>
    <hr>
</div> -->
<?php
// $productData = $registration->getProductData();
// if ($productData){
//       $i = 0;
//       foreach ($productData as $productData) {
//           $i++;
//           $sum = 0;
//         if($productData['quantity'] !== 0){
//             $sum = $sum+$productData['quantity']; }}}
?>

<div class="container mt-5 mb-3">
    <h5 class="fw-bold fs-5" style="color:#334155;">Empty Goods</h5>
    <hr>
</div>
<table class="container table mt-4 mb-3">
  <thead>
    <tr>
      <th class="text-center" scope="col">Serial No.</th>
      <th class="text-center" scope="col">Product Name</th>
      <th class="text-center" scope="col">Quantity</th>
      <th class="text-center" scope="col">Manage</th>
    </tr>
  </thead>
<?php 
$productData = $registration->getProductData();

    if ($productData){
      $i = 0;
      foreach ($productData as $productData) {
          $i++;
        if($productData['quantity'] == 0){
?>
  <tbody>
    <tr>
      <th class="text-center" scope="row"><?php echo $i;?></th>
      <td class="text-center"><?php echo $productData['productName'];?></td>
      <td class="text-center"><?php echo $productData['quantity'];?></td>
      <td class="text-center">
        <a href="updateProduct.php?id=<?php echo $productData['id']?>" class="btn border-success text-center fw-bold " type="submit">
            <img class="me-1" src="image/updatedB.png" alt="" width="25px" height="25px">
            Update
        </a>
      </td>
    </tr>
    <?php
        }
    }
  }
  else{?>
      <tr>
          <td class="text-center" colspan="4">
              <h2>No Empty Good!</h2>
          </td>
      </tr>
  <?php }?>
  </tbody>
</table>
<?php include './footer.php'?>