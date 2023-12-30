<?php include './header.php'?>
<?php include './customerSidenav.php'?>
<?php include_once './nav.php';
Session::checkSession();
?>

<table id="stockTable" class="table">

  <div class="container-fluid d-flex">
    <h5 class="w-75 align-middle" id="stockHeading">Product Available in Stock</h5>
      
    <a  class="btn fw-bold me-2 border " href="viewCartData.php">
        <img class="me-1" src="image/cart.png" alt="" width="40px" height="40px">
        My Cart
    </a>
    <a  class="btn fw-bold border text-center " href="productList.php">
        <img class="me-1" src="image/addCart.png" alt="" width="40px" height="40px">
        Add Product
    </a>
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
if (!isset($_GET['search']) || $_GET['search'] == NULL){
    echo "<script>window.location = 'customer404.php'</script>";
}
else{
    $search = $_GET['search'];
    $searchInProductList = $registration->searchInProductList($search);

  
    
    if ($searchInProductList){
      $i = 0;
      foreach ($searchInProductList as $productData ) {
          $i++;
        
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
            <a href="manageCart.php?productId=<?php echo $productData['id']?>" class="btn btn-success" type="submit">Buy</a>
        </td>
      </tr>
  <?php
      }
    }
  
  else{?>
       <tr>
            <td class="text-center" colspan="7">
                <h5 class="text-center">Search not found</h5>
                <a href="productList.php" class="btn fw-bold border text-center mt-2" type="submit">
                    <img class="me-1" src="image/back.png" alt="" width="30px" height="30px">
                    Back
                </a>
            </td>
        </tr>
  <?php } }?>
    </tbody>
</table>

<?php include './footer.php'?> 