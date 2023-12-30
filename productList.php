<?php include './header.php'?>
<?php include './customerSidenav.php'?>
<?php include_once './nav.php';
Session::checkSession();
?>

<table id="stockTable" class="table">

  <div class="container-fluid d-flex">
      <h5 class="col-md-4 w-25 me-5 ms-5 align-middle" id="stockHeading">Product Available in Stock</h5>
      <a  class="btn fw-bold me-1 border w-25 h-25" href="viewCartData.php">
            <img class="me-1" src="image/cart.png" alt="" width="40px" height="40px">
            My Cart
      </a>
      <form action="searchInProductList.php" method="get" class="d-flex w-25" role="search">
            <input style="height:50px" class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn border fw-bold me-2 h-25 d-flex" type="submit">
              <img class="me-2" src="image/search.png" alt="" width="35px" height="35px">
              Search
            </button>
      </form>
  </div>
  <hr>
  <thead>

    <tr>
        <th scope="col">Id</th>
        <th class="text-center" scope="col">Product Type</th>
        <th class="text-center" scope="col">Product Name</th>
        <th class="text-center" scope="col">Product Image</th>
        <th class="text-center" scope="col">Product Quantity</th>
        <th class="text-center" scope="col">Price</th>
        <th class="text-center" scope="col">Manage</th>
    </tr>
  </thead>


<?php 
    $productData = $registration->getProductData();
    if ($productData){
      $i = 0;
      foreach ($productData as $productData) {
          $i++;
          if($productData['quantity'] > 0){
?>

    <tbody>
      <tr>
        <th scope="row"><?php echo $i;?></th>
        <td class="text-center"><?php echo $productData['productCategory'];?></td>
        <td class="text-center"><?php echo $productData['productName'];?></td>
        <td class="text-center">
          <img src="<?php echo $productData['image'];?>" alt="" width="50px" height="50px">
      </td>
        <td class="text-center"><?php echo $productData['quantity'];?></td>
        <td class="text-center"><?php echo $productData['totalSellPrice'];?></td>
        <td class="text-center">
          <a href="manageCart.php?productId=<?php echo $productData['id']?>" class="" type="submit">
            <img class="me-2" src="image/buy.png" alt="" width="60px" height="60px">
          </a>
        </td>
      </tr>
  <?php
      }
     }
  }
  else{?>
      <tr>
          <td colspan="7">
              <h2>No User Data found!</h2>
          </td>
      </tr>
  <?php }?>
    </tbody>
</table>

<?php include './footer.php'?> 