<?php include './header.php'?>
<?php 
include './customerSidenav.php'
?>
<?php include_once './nav.php';
Session::checkSession();
?>
<?php 
if (isset($_GET['customerId']) && isset($_GET['cartId']) ) {
    $cartId = (int)$_GET['cartId'];
    $customerId = (int)$_GET['customerId'];
    
  }

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['pay'])){
    $updatePaymentTable = $registration->updatePaymentTable($cartId, $customerId, $_POST);
    $updateCartAfterPayment = $registration->updateCartAfterPayment($cartId);
  }
?>

<div class="container">
    <h1 class="text-center mt-3" style="color:#455A64">Make Your Payment</h1>
</div>
<div style="margin-left:70px" class="container row border mt-3 mb-3 rounded">
    <form action="" method="POST" class="row g-3 mt-3 col-md-6 mb-3">
        <h5 class="col-12" style="color:#455A64">Customer Details</h5>
        <hr>
<?php
$getPurchaseCustomerDetails = $registration->getPurchaseCustomerDetails($customerId);

  if($getPurchaseCustomerDetails){
    
?>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Name</label>
            <input type="text" name="customerName" value="<?php echo $getPurchaseCustomerDetails->firstName;?>" class="form-control" id="inputEmail4" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo $getPurchaseCustomerDetails->email;?>" id="inputEmail4" required>
        </div>
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Contact No.</label>
            <input type="text" class="form-control" name="contact" value="<?php echo $getPurchaseCustomerDetails->contact;?>" id="inputEmail4" required>
        </div>
        <div class="col-6">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" name="address" value="<?php echo $getPurchaseCustomerDetails->address;?>" id="inputAddress" required>
        </div>
        <?php }else{
            echo "<script>window.location = 'viewCartData.php'</script>";
        } ?>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" name="city" placeholder="Type Your City" id="inputCity" required>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Payment Date</label>
            <input type="date" class="form-control" name="paymentDate" id="inputCity" required>
        </div>
        <h5 class="col-12 mt-2" style="color:#455A64">Product Details</h5>
        <hr>

<?php

$getPurchaseCartDetails = $registration-> getPurchaseCartDetails($cartId);

if ($getPurchaseCartDetails) {
    

?>
        
        <div class="col-md-12">
            <label for="inputCity" class="form-label">Product Name</label>
            <input type="text" class="form-control" name="productName" value="<?php echo $getPurchaseCartDetails->productName;?>" id="inputCity" readonly>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Quantity</label>
            <input type="text" class="form-control" name="quantity" value="<?php echo $getPurchaseCartDetails->quantity;?>" id="inputCity" readonly>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" value="<?php echo $getPurchaseCartDetails->price;?>" id="inputCity" readonly>
        </div>
        <?php }else{
            echo "<script>window.location = 'viewCartData.php'</script>";
        }?>
        <h5 class="col-12 mt-2" style="color:#455A64">Payment Details</h5>
        <hr>
        <div class="col-md-12">
            <label for="inputCity" class="form-label">Card Number</label>
            <input type="number" placeholder="1212 1212 1212 1212" class="form-control" name="cardNumber" required>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">CVC</label>
            <input type="number" class="form-control" name="cardCVC" placeholder="123" id="inputCity" required>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" name="expiryDate" id="inputCity" required>
        </div>
        <div class="col-12 mt-3">
            <button style="background-color:#38A0E7;color:aliceblue" type="submit" name="pay" class="btn">Pay Now</button>
        </div>
    </form>
    
    <div class="container col-md-6 mt-5">
        <img class="img-responsive" src="image/payment.gif" alt="" width="100%" height="">
    </div>
</div>


<?php include './footer.php'?> 