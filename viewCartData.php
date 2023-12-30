<?php include './header.php'?>
<?php include './customerSidenav.php'?>
<?php include_once './nav.php';
Session::checkSession();
?>

<?php
   
  if (isset($_GET['action']) && $_GET['action'] == 'delete'){

    $cartId = (int)$_GET['cartId'];
    $productId = (int)$_GET['productId'];
    

    
    $updateProductTableDeleteOneCart = $registration->updateProductTableDeleteOneCart($productId, $cartId);
    $deleteCartProductData = $registration->deleteCartProductData($cartId);
    
  }
  
?>

<table id="stockTable" class="table">
    <div class="container-fluid d-flex">
        <h5 class="w-50 align-middle" id="stockHeading">Your Cart</h5>
        <a class="btn border fw-bold w-25 d-flex" href="productList.php">
              <img class="me-2" src="image/add-to-basket.png" alt="" width="30px" height="30px">
                Add Product
        </a>
        <form action="searchInViewCartData.php" method="get" class="d-flex w-25" role="search">
            <input style="height:50px" class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn border fw-bold me-2 d-flex h-25" type="submit">
            <img class="me-2" src="image/search.png" alt="" width="35px" height="35px">
              Search
            </button>
        </form>
    </div>
    <hr>
  <thead>
    <tr>
        <th scope="col">Serial No.</th>
        <th class="text-center" scope="col">Product Name</th>
        <th class="text-center" scope="col">Product Image</th>
        <th class="text-center" scope="col">Product Quantity</th>
        <th class="text-center" scope="col">Price</th>
        <th class="text-center" scope="col">Manage</th>
    </tr>
  </thead>

<?php
    $productData = $registration->getCartData();
    if ($productData){
      $i = 0;
      foreach ($productData as $productData) {
          $i++;
        
?>

<?php
if($productData['customerId'] ==  Session::get('id')){

?>
  <tbody>
    <tr class="">
      <th scope="row"><?php echo $i;?></th>
      <td class="text-center"><?php echo $productData['productName'];?></td>
      <td class="text-center">
          <img src="<?php echo $productData['image'];?>" alt="" width="50px" height="50px">
      </td>
      <td class="text-center"><?php echo $productData['quantity'];?></td>
      <td class="text-center"><?php echo $productData['price'];?></td>
      <td class="text-center">
        <a href="payment.php?action=purchase&cartId=<?php echo $productData['cartId']?>&customerId=<?php echo $productData['customerId'];?>" class="btn btn-success text-center" type="submit">Purchase</a>
        <a href="viewCartData.php?action=delete&cartId=<?php echo $productData['cartId']?>&productId=<?php echo $productData['productId']?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger text-center" type="submit">Delete</a>
      </td>
    </tr>

<?php

}?>
<?php
    } ?>
    
 <?php } else{?>

 <tr>
    <td class="text-center" colspan="6">
        <h5 class="text-center">You have no cart</h5>
    </td>
</tr>

<?php }?>
  </tbody>
</table>




<?php include './footer.php'?> 
