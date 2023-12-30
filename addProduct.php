<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>
<?php

$registration = new Registration();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addProduct'])){
    $productAdd = $registration->productAdd($_POST);
}

?> 

<section class ="container addCustomers">
    <h5 style="color:#282C34;" class="addCustomersInput">New Product Add</h5>
     <hr>

     <?php
        if (isset($productAdd)) {
            echo $productAdd;
        }
            
    ?>

    <form method ="POST" class="row" enctype="multipart/form-data">
    <label for="productImage">Select Product Image</label><br>
    <input class="form-control w-75 mb-2 mx-2" type="file" name="image" id="productImage">
        <div class="col-md-6">
            <label for="productName">Product Name</label><br>
            <input type="text" id="productName" name="productName" class="form-control addCustomersInput" placeholder="Example: Olive Oil" aria-label="Example: Pratik Dav" required>
        </div>
        <div class="col-md-6">
            <label  for="productCategory">Product Category</label><br>
            <select name="productCategory" class="form-select addCustomersInput" aria-label="Default select example">
                <option selected>Grocery</option>
                <option value="Technology">Technology</option>
                <option value="Accessory">Accessory</option>
                <option value="Clothing">Clothing</option>
                <option value="Specialty">Specialty</option>
                <option value="Thrift">Thrift</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="quantity">Quantity</label><br>
            <input type="number" name="quantity" id="quantity" class="form-control addCustomersInput" placeholder="Example: 5" aria-label="Example: 5" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="totalBuyPrice">Total Buy Price</label><br>
            <input type="text" name="totalBuyPrice" id="totalBuyPrice" class="form-control addCustomersInput" placeholder="Example: 500" aria-label="Example: 500" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="totalSellPrice">Total Sell Price</label><br>
            <input type="text" name="totalSellPrice" id="totalSellPrice" class="form-control addCustomersInput" placeholder="Example: 700" aria-label="Example: 700" required>
        </div>
        <button name="addProduct" class="w-25 mt-3 ms-2 btn btn-primary" type="submit">Add Product</button>
    </form>
</section>

 <?php include './footer.php'?> 