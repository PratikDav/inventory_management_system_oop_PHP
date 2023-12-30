<?php include './header.php'?>
<?php include './customerSidenav.php'?>
<?php include_once './nav.php';
Session::checkSession();
?>


<?php
if (isset($_GET['productId'])) {
    $id = (int)$_GET['productId'];
    
    


if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCart'])){
    $productAddToCurt                   = $registration->productAddToCurt($id, $_POST);   
    $updateProductAfterCartToMainTable  = $registration->updateProductAfterCartToProductTable($id, $_POST); 
}

$productDataById = $registration->getProductById($id);

if($productDataById){

?>
            <form method ="POST" class="row" id="stockTable" enctype="multipart/form-data">
              <h5>
                <img src="image/update.png" alt="" width="35px" height="35px">
                Add to Your Curt
              </h5>
              <hr>
              <div style="text-align: center;">
                <img style="width:200px; height:200px;" src="<?php echo $productDataById->image;?>" alt="">
              </div>
                
                
                    <div class="col-md-6">
                        <label for="productName">Product Name</label><br>
                        <input type="text" id="productName" name="productName" class="form-control addCustomersInput" Value="<?php echo $productDataById->productName; ?>"aria-label="Example: Pratik Dav" required disabled>
                    </div>
                    <div class="col-md-6">
                        <label  for="productCategory">Product Category</label><br>
                        <select name="productCategory" class="form-select addCustomersInput" aria-label="Default select example" disabled>
                        <option Selected><?php echo $productDataById->productCategory;?></option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="addCustomersInput" for="quantity">Total Quantity</label><br>
                        <input type="number" name="productQuantity" id="quantity" value="<?php echo $productDataById->quantity; ?>" class="form-control addCustomersInput me-2" aria-label="Example: 5" disabled>
                        <label class="addCustomersInput" for="quantity">Quantity</label><br>
                        <input type="number" name="quantity" id="quantity" class="form-control addCustomersInput me-2" aria-label="Example: 5" required>
                    </div>
                    <div class="col-md-6">
                        <label class="addCustomersInput" for="price">Price for One (kg/liter/piece)</label><br>
                        <input type="text" name="price" value="<?php echo $price = $productDataById->totalSellPrice / $productDataById->quantity; ?>" id="price" class="form-control addCustomersInput"  aria-label="Example: 700" required disabled>
                    </div>

                    
                    <div class="col-md-6">
                        <!-- <label class="addCustomersInput" for="totalBuyPrice">Total Buy Price</label><br> -->
                        <input type="hidden" name="totalBuyPrice" value="<?php echo $productDataById->totalBuyPrice; ?>" id="totalBuyPrice" class="form-control addCustomersInput"  aria-label="Example: 500" required>
                    </div>
                    <div class="col-md-6">
                        <!-- <label class="addCustomersInput" for="totalSellPrice">Total Sell Price</label><br> -->
                        <input type="hidden" name="totalSellPrice" value="<?php echo $productDataById->totalSellPrice; ?>" id="totalSellPrice" class="form-control addCustomersInput"  aria-label="Example: 700" required>
                    </div>

                    <button type="submit" name="addCart" class="w-25 mt-3 ms-2 btn btn-success">Add to Cart</button>
            </form>
    <?php } } ?>
    







<?php include './footer.php'?> 