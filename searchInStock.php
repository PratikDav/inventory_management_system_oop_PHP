<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>



<table id="stockTable" class="table">

  <div class="container-fluid d-flex">
      <h5 class="w-50 align-middle" id="stockHeading">Product in Stock</h5>
      <a class="btn border-info fw-bold w-25" href="addProduct.php">
      <img class="me-1" src="image/addProduct.png" alt="" width="30px" height="30px">
          Add Product
      </a>
  </div>
  <hr>
    <thead>

<!--Product Delete Machanism -->
<?php
  if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $id = (int)$_GET['delProductId'];
    $deleteProduct = $registration->deleteProduct($id);
    $getData = $registration->getProductById($id);

    //delete Image from local folder
    if ($getData) {

      while ($deleteImage = $getData->fetch_assoc()){
        $deleteLink = $deleteImage['image'];
        unlink($deleteLink);
      }
    }

    //delete product data from database
    if ($deleteProduct) {
      $successMsg = "<script>alert('Data Deleted Successfully!')</script>";
      $failedMsg = "<script>alert('Data Not Deleted!')</script>";
      echo $successMsg;
      echo "<script>window.location = 'stock.php'</script>";
    }else {
      echo $failedMsg;
      echo "<script>window.location = 'stock.php'</script>";
    }
  }
  
?>

      <tr>
        <th scope="col">Id</th>
        <th class="text-center" scope="col">Product Type</th>
        <th class="text-center" scope="col">Product Name</th>
        <th class="text-center" scope="col">Product Image</th>
        <th class="text-center" scope="col">Product Quantity</th>
        <th class="text-center" scope="col">Total Buy Price</th>
        <th class="text-center" scope="col">Total Sell Price</th>
        <th class="text-center" scope="col">Manage</th>
      </tr>
    </thead>


<?php
if (!isset($_GET['search']) || $_GET['search'] == NULL){
    echo "<script>window.location = '404.php'</script>";
}
else{
    $search = $_GET['search'];
    $searchInStock = $registration->searchInStock($search);

  
    // $productData = $searchInViewCartData;
    if ($searchInStock){
      $i = 0;
      foreach ($searchInStock as $productData ) {
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
        <td class="text-center"><?php echo $productData['totalBuyPrice'];?></td>
        <td class="text-center"><?php echo $productData['totalSellPrice'];?></td>
        <td class='container-fluid d-flex ms-5'>
              <a class="me-2" href="updateProduct.php?id=<?php echo $productData['id']?>">
                  <img title="Update" src="image/edit.png" alt="" width="35px" height="35px">
              </a>
              <a title="Delete" href="stock.php?action=delete&delProductId=<?php echo $productData['id']?>" onclick="return confirm('Are you sure you want to delete this product?')">
                  <img  src="image/delete.png" alt="" width="40px" height="40px">
              </a>
        </td>
      </tr>
  <?php
    }
  } else{?>
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