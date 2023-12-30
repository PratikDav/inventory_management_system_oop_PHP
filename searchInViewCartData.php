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

<?php


?>

<table id="stockTable" class="table">
    <div class="container-fluid d-flex">
        <h5 class="w-75 align-middle" id="stockHeading">Your Cart</h5>
        <a  class="btn fw-bold me-2 border" href="viewCartData.php">
            <img class="me-1" src="image/cart.png" alt="" width="40px" height="40px">
            My Cart
        </a>
        <a  class="btn fw-bold border text-center" href="productList.php">
              <img class="me-1" src="image/addCart.png" alt="" width="40px" height="40px">
                Add Product
        </a>
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
if (!isset($_GET['search']) || $_GET['search'] == NULL){
    echo "<script>window.location = 'customer404.php'</script>";
}
else{
    $search = $_GET['search'];
    $searchInViewCartData = $registration->searchInViewCartData($search);

  
    // $productData = $searchInViewCartData;
    if ($searchInViewCartData){
      $i = 0;
      foreach ($searchInViewCartData as $productData ) {
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
        <a href="" class="btn btn-success text-center" type="submit">Purchase</a>
        <a href="viewCartData.php?action=delete&cartId=<?php echo $productData['cartId']?>&productId=<?php echo $productData['productId']?>" onclick="return confirm('Are you sure you want to delete this product?')" class="btn btn-danger text-center" type="submit">Delete</a>
      </td>
    </tr>

<?php

}else{
    // echo "You Have no Access";
}
?>
<?php


    }
  }
  else{?>
        <tr>
            <td class="text-center" colspan="6">
                <h5 class="text-center">Search not found</h5>
                <a href="viewCartData.php" class="btn fw-bold border text-center mt-2" type="submit">
                    <img class="me-1" src="image/back.png" alt="" width="30px" height="30px">
                    Back
                </a>
            </td>
        </tr>
            
<?php } 
}
?>


  </tbody>
</table>




<?php include './footer.php'?> 
