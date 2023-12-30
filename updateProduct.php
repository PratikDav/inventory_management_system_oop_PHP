<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>


<?php 
if (isset($_GET['id'])) {
  $id = (int)$_GET['id'];
}

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])){
  $updateProduct = $registration->updateProduct($id, $_POST);
}

$productDataById = $registration->getProductById($id);

if($productDataById){

?>
        <form method ="POST" class="row" id="stockTable" enctype="multipart/form-data">
          <h5>
            <img src="image/update.png" alt="" width="35px" height="35px">
            Update Product
          </h5>
          <hr>
<?php 
  if (isset($updateProduct)) {
    echo $updateProduct;
  }
?>
          <div style="text-align: center;">
            <img style="width:200px; height:200px;" src="<?php echo $productDataById->image;?>" alt="">
          </div>
            
            <label for="productImage">Select Product Image</label><br>
            <input class="form-control w-75 mb-2 mx-2" type="file" name="image" value="<?php echo $productDataById->image?>" id="productImage"></input>
                <div class="col-md-6">
                    <label for="productName">Product Name</label><br>
                    <input type="text" id="productName" name="productName" class="form-control addCustomersInput" Value="<?php echo $productDataById->productName; ?>"aria-label="Example: Pratik Dav" required>
                </div>
                <div class="col-md-6">
                    <label  for="productCategory">Product Category</label><br>
                    <select name="productCategory" value="<?php echo $productDataById->productCategory;?>" class="form-select addCustomersInput" aria-label="Default select example">
                    <option Selected><?php echo $productDataById->productCategory;?></option>
                    <option value="Grocery">    Grocery       </option>
                    <option value="Technology"> Technology    </option>
                    <option value="Accessory">  Accessory     </option>
                    <option value="Clothing">   Clothing      </option>
                    <option value="Specialty">  Specialty     </option>
                    <option value="Thrift">     Thrift        </option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="addCustomersInput" for="quantity">Quantity</label><br>
                    <input type="number" name="quantity" value="<?php echo $productDataById->quantity?>" id="quantity" class="form-control addCustomersInput" aria-label="Example: 5" required>
                </div>
                <div class="col-md-6">
                    <label class="addCustomersInput" for="totalBuyPrice">Total Buy Price</label><br>
                    <input type="text" name="totalBuyPrice" value="<?php echo $productDataById->totalBuyPrice; ?>" id="totalBuyPrice" class="form-control addCustomersInput"  aria-label="Example: 500" required>
                </div>
                <div class="col-md-6">
                    <label class="addCustomersInput" for="totalSellPrice">Total Sell Price</label><br>
                    <input type="text" name="totalSellPrice" value="<?php echo $productDataById->totalSellPrice; ?>" id="totalSellPrice" class="form-control addCustomersInput"  aria-label="Example: 700" required>
                </div>
                <button type="submit" name="update" class="w-25 mt-3 ms-2 btn btn-success">Update</button>
        </form>
<?php } ?>

<?php include './footer.php'?> 