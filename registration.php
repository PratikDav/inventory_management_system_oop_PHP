<?php
include_once './session.php'; 

class Registration{
    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    // Registration Mechanisms

    public function adminRegistrations($data){
        $firstName        = $data['firstName'];
        $lastName         = $data['lastName'];
        $gender           = $data['gender'];
        $contact          = $data['number'];
        $email            = $data['email'];
        $password         = md5($data['password']);
        $address          = $data['address'];
        $birthDate        = $data['birthDate'];
        $nid              = $data['nid'];
        $religion         = $data['religion'];
        $registrationDate = $data['registrationDate'];

        $checkEmail       = $this->adminEmailCheck($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }

        if ($checkEmail == true) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address already exists!</div>"; 
            return $msg;
        }

        $sql ="INSERT INTO admin(firstName, lastName, gender, contact, email, password, address, birthDate, nid, religion, registrationDate) VALUES(:firstName, :lastName, :gender, :contact, :email, :password, :address, :birthDate, :nid, :religion, :registrationDate)";

        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':firstName',$firstName);
        $query-> bindValue(':lastName',$lastName);
        $query-> bindValue(':gender',$gender);
        $query-> bindValue(':contact',$contact);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query-> bindValue(':address',$address);
        $query-> bindValue(':birthDate',$birthDate);
        $query-> bindValue(':nid',$nid);
        $query-> bindValue(':religion',$religion);
        $query-> bindValue(':registrationDate',$registrationDate);
        $result=$query -> execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Stuff have been registered successfully</div>"; 
            return $msg;
        }else {
            $msg = "<div class='alert alert-danger'><strong>Sorry!</strong> Try again</div>"; 
            return $msg;
        }
    }


    // Stuff Registration
    public function stuffRegistrations($data){
        $firstName        = $data['firstName'];
        $lastName         = $data['lastName'];
        $gender           = $data['gender'];
        $contact          = $data['number'];
        $email            = $data['email'];
        $password         = md5($data['password']);
        $address          = $data['address'];
        $birthDate        = $data['birthDate'];
        $nid              = $data['nid'];
        $religion         = $data['religion'];
        $registrationDate = $data['registrationDate'];

        $checkEmail       = $this->stuffEmailCheck($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }

        if ($checkEmail == true) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address already exists!</div>"; 
            return $msg;
        }

        $sql ="INSERT INTO stuff(firstName, lastName, gender, contact, email, password, address, birthDate, nid, religion, registrationDate) VALUES(:firstName, :lastName, :gender, :contact, :email, :password, :address, :birthDate, :nid, :religion, :registrationDate)";

        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':firstName',$firstName);
        $query-> bindValue(':lastName',$lastName);
        $query-> bindValue(':gender',$gender);
        $query-> bindValue(':contact',$contact);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query-> bindValue(':address',$address);
        $query-> bindValue(':birthDate',$birthDate);
        $query-> bindValue(':nid',$nid);
        $query-> bindValue(':religion',$religion);
        $query-> bindValue(':registrationDate',$registrationDate);
        $result=$query -> execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Stuff have been registered successfully</div>"; 
            return $msg;
        }else {
            $msg = "<div class='alert alert-danger'><strong>Sorry!</strong> Try again</div>"; 
            return $msg;
        }

    }


    // Customer Registration
    public function customerRegistrations($data){
        $firstName        = $data['firstName'];
        $lastName         = $data['lastName'];
        $gender           = $data['gender'];
        $contact           = $data['number'];
        $email            = $data['email'];
        $password         = md5($data['password']);
        $address          = $data['address'];
        $registrationDate = $data['registrationDate'];

        $checkEmail       = $this->customerEmailCheck($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }

        if ($checkEmail == true) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address already exists!</div>"; 
            return $msg;
        }

        $sql ="INSERT INTO customer (firstName, lastName, gender, contact, email, password, address, registrationDate) VALUES(:firstName, :lastName, :gender, :contact, :email, :password, :address, :registrationDate)";

        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':firstName',$firstName);
        $query-> bindValue(':lastName',$lastName);
        $query-> bindValue(':gender',$gender);
        $query-> bindValue(':contact',$contact);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query-> bindValue(':address',$address);
        $query-> bindValue(':registrationDate',$registrationDate);
        $result=$query -> execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Customer have been registered successfully</div>"; 
            return $msg;
        }else {
            $msg = "<div class='alert alert-danger'><strong>Sorry!</strong> Try again</div>"; 
            return $msg;
        }

    }

     // Checking Admin Email Address if it is exists
     public function adminEmailCheck($email){
        $sql = "SELECT email FROM admin WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query -> execute();
        
        if ($query->rowCount() > 0) {
            return true;
        }
        else { 
            return false;
        }

    }
     // Checking Stuff Email Address if it is exists
     public function stuffEmailCheck($email){
        $sql = "SELECT email FROM stuff WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query -> execute();
        
        if ($query->rowCount() > 0) {
            return true;
        }
        else { 
            return false;
        }

    }
    
     // Checking Customer Email Address if it is exists
     public function customerEmailCheck($email){
        $sql = "SELECT email FROM customer WHERE email = :email";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query -> execute();
        
        if ($query->rowCount() > 0) {
            return true;
        }
        else { 
            return false;
        }

    }
    
    
    
    
    // Login Mechanisms

    // Admin Login
    public function adminLoginQuery($email, $password){
        $sql = "SELECT * FROM admin WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query -> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }


    // Stuff Login
    public function stuffLoginQuery($email, $password){
        $sql = "SELECT * FROM stuff WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query -> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    


    // Customer Login
    public function customerLoginQuery($email, $password){
        $sql = "SELECT * FROM customer WHERE email = :email AND password = :password LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':email',$email);
        $query-> bindValue(':password',$password);
        $query-> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

   
    



    //All User Login Data Collection

    // Admin
    public function adminUserLogin($data){

        $email            = $data['email'];
        $password         = md5($data['pass']);

        $adminCheckEmail       = $this->adminEmailCheck($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }
        
        if ($adminCheckEmail == false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address not exists!</div>"; 
            return $msg;
        }

        $adminResult = $this-> adminLoginQuery($email, $password);
        
        if ($adminResult) {
            Session::init();
            Session::set("login", true);
            // For Admin
            Session::set("id", $adminResult->id);
            Session::set("firstName", $adminResult->firstName);
            Session::set("lastName", $adminResult->lastName);
            Session::set("loginMSG", "<div class='alert alert-success'><strong>Success!</strong> You are logged in successfully!</div>");
            Session::set("adminPanelName","Admin");
            header("Location: adminPanel.php");
       
        }
        else{
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Data not found!</div>"; 
            return $msg;
        }

        

    }

    public function getAllAdmin(){
        $sql = "SELECT * FROM admin ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }

    // Stuff
    public function stuffUserLogin($data){

        $email            = $data['email'];
        $password         = md5($data['pass']);
        $stuffCheckEmail  = $this->stuffEmailCheck($email);
        

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }
        
        if ($stuffCheckEmail == false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address not exists!</div>";
            return $msg;
        }

        $stuffResult = $this-> stuffLoginQuery($email, $password);
        
        if ($stuffResult) {
            Session::init();
            Session::set("login", true);
            // For Stuff
            Session::set("id", $stuffResult->id);
            Session::set("firstName", $stuffResult->firstName);
            Session::set("lastName", $stuffResult->lastName);
            Session::set("loginMSG", "<div class='alert alert-success'><strong>Success!</strong> You are logged in successfully!</div>");
            Session::set("stuffPanelName","Stuff");
            header("Location: customerPanel.php");
        }
        else{
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Data not found!</div>"; 
            return $msg;
        }

        

    }



    //Customer
    public function customerUserLogin($data){

        $email            = $data['email'];
        $password         = md5($data['pass']);

        
        $customerCheckEmail    = $this->customerEmailCheck($email);

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Invalid Email Address</div>"; 
            return $msg;
        }
        
        if ($customerCheckEmail == false) {
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Email Address not exists!</div>"; 
            return $msg;
        }

        
        $customerResult = $this-> customerLoginQuery($email, $password);
        
        if ($customerResult) {
            Session::init();
            Session::set("login", true);
            // For Customer
            Session::set("id", $customerResult->id);
            Session::set("firstName", $customerResult->firstName);
            Session::set("lastName", $customerResult->lastName);
            Session::set("loginMSG", "<div class='alert alert-success'><strong>Success!</strong> You are logged in successfully!</div>");
            Session::set("customerPanelName","Customer");
            header("Location: customerPanel.php");
       
        }
        else{
            $msg = "<div class='alert alert-danger'><strong>Error!</strong> Data not found!</div>"; 
            return $msg;
        }

        

    }

    public function getAllCustomer(){
        $sql = "SELECT * FROM customer ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }

    //Product Add
    public function productAdd($data){
        $productCategory        = $data['productCategory'];
        $productName            = $data['productName'];
        $quantity               = $data['quantity'];
        $totalBuyPrice          = $data['totalBuyPrice'];
        $totalSellPrice         = $data['totalSellPrice'];
       
        //image upload machanism....
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $filename);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploadedImage = "productImage/.$unique_image";
        
        move_uploaded_file($file_temp, $uploadedImage);

        $sql ="INSERT INTO product (productCategory, productName, image, quantity, totalBuyPrice, totalSellPrice) VALUES(:productCategory, :productName, :uploadedImage, :quantity, :totalBuyPrice, :totalSellPrice)";

        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':productCategory',$productCategory);
        $query-> bindValue(':productName',$productName);
        $query-> bindValue(':uploadedImage',$uploadedImage);
        $query-> bindValue(':quantity',$quantity);
        $query-> bindValue(':totalBuyPrice',$totalBuyPrice);
        $query-> bindValue(':totalSellPrice',$totalSellPrice);
        $result=$query -> execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Product Added Successfully!</div>"; 
            return $msg;
        }else {
            $msg = "<div class='alert alert-danger'><strong>Sorry!</strong> Try again</div>"; 
            return $msg;
        }

    }

    // Retrieve Product Data
    public function getProductData() {
        $sql = "SELECT * FROM product ORDER BY id DESC";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }
    // public function getProductDataForQuantity() {
    //     $sql = "SELECT * FROM product ORDER BY id DESC";
    //     $query = $this->db->pdo->prepare($sql);
    //     $query -> execute();
    //     $result = $query ->fetchAll();
    //     $quantity= $result['quantity'];

    //     $sum = 0;
    //     $sum += $quantity;
    // }

    // data retrieved by Id
    public function getProductById($id){
        $sql = "SELECT * FROM product WHERE id = :id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':id',$id);
        $query -> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }



    // product data update into main product table in stock.php file
    public function updateProduct($id, $data){
        $productCategory        = $data['productCategory'];
        $productName            = $data['productName'];
        $quantity               = $data['quantity'];
        $totalBuyPrice          = $data['totalBuyPrice'];
        $totalSellPrice         = $data['totalSellPrice'];
       
        //image upload machanism....
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $filename = $_FILES['image']['name'];
        $filesize = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $filename);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploadedImage = "productImage/.$unique_image";
        
        move_uploaded_file($file_temp, $uploadedImage);

        $sql ="UPDATE product SET 
                    productCategory = :productCategory, 
                    productName     = :productName, 
                    image   = :uploadedImage, 
                    quantity        = :quantity, 
                    totalBuyPrice   = :totalBuyPrice, 
                    totalSellPrice  = :totalSellPrice
                    WHERE id        = :id";

        $query = $this->db->pdo->prepare($sql);

        $query-> bindValue(':id',$id);
        $query-> bindValue(':productCategory',$productCategory);
        $query-> bindValue(':productName',$productName);
        $query-> bindValue(':uploadedImage',$uploadedImage);
        $query-> bindValue(':quantity',$quantity);
        $query-> bindValue(':totalBuyPrice',$totalBuyPrice); 
        $query-> bindValue(':totalSellPrice',$totalSellPrice);
        $result=$query -> execute();

        if ($result) {
            $msg = "<div class='alert alert-success'><strong>Success!</strong> Product Updated Successfully!</div>"; 
            return $msg;
        }else {
            $msg = "<div class='alert alert-danger'><strong>Sorry!</strong> Try again</div>"; 
            return $msg;
        }
    }



    // product data Delete from main product table in stock.php file
    public function deleteProduct($id){
        $sql    = "DELETE FROM product WHERE id = :id LIMIT 1";
        $query  = $this->db->pdo->prepare($sql);
        $query-> bindValue(':id',$id);
        $result =$query -> execute();
        return $result;
    }



    // product add to customer cart table in manageCart.php file
    public function productAddToCurt($id, $data){
        $quantity               = (int)$data['quantity'];
        $productId              = $id;
        $customerId             = Session::get('id');

        $sql1 = "SELECT * FROM product WHERE id = '$productId'";
        $query1 = $this->db->pdo->prepare($sql1);
        $query1 -> execute();
        $result = $query1 ->fetch(PDO::FETCH_OBJ);

        // return $result;
        // print_r($result);

        $productName = $result->productName;
        $price = ($result->totalSellPrice / $result->quantity) * $quantity;
        $image = $result->image;
        
        // echo $productName."<br>";
        // echo $price."<br>";
        // echo $quantity."<br>";
        // echo $image."<br>";
        // echo $customerId."<br>";
        if($result->quantity > 0 && $quantity <= $result->quantity && $result->totalSellPrice > 0){

            $sqlInsertIntoCart ="INSERT INTO customercart(customerId, productId, productName, price, quantity, image) VALUES(:customerId, :productId, :productName, :price, :quantity, :image)";

            $query = $this->db->pdo->prepare($sqlInsertIntoCart);
            $query-> bindValue(':customerId',$customerId);
            $query-> bindValue(':productId',$productId);
            $query-> bindValue(':productName',$productName);
            $query-> bindValue(':price',$price);
            $query-> bindValue(':quantity',$quantity);
            $query-> bindValue(':image',$image);
            $result=$query -> execute();

            if ($result) {
                echo "<script>window.location = 'viewCartData.php'</script>";
            }

        }
        else{
            echo "<script>alert('Not enough product!')</script>";
        }

        

        
        
    }



    // update main product table after adding data to customer cart in manageCart.php file
    public function updateProductAfterCartToProductTable($id, $data){
        $quantity               = (int)$data['quantity'];
        $productId              = $id;


        $sql1 = "SELECT * FROM product WHERE id = '$productId'";
        $query1 = $this->db->pdo->prepare($sql1);
        $query1 -> execute();
        $result = $query1 ->fetch(PDO::FETCH_OBJ);

        if($result->quantity > 0 && $quantity <= $result->quantity && $result->totalSellPrice > 0){

            $stockQuantity = $result->quantity - $quantity;
            $stockTotalSellPrice = ($result->totalSellPrice / $result->quantity) * $stockQuantity;
            $stockTotalBuyPrice = ($result->totalBuyPrice / $result->quantity) * $stockQuantity;

            // echo $stockQuantity."<br>";
            // echo $stockTotalSellPrice."<br>";
            // echo $stockTotalBuyPrice;

            $sqlUpdateIntoProduct = "UPDATE product SET 
                                quantity        = :quantity, 
                                totalBuyPrice   = :totalBuyPrice, 
                                totalSellPrice  = :totalSellPrice
                                WHERE id        = :id";

            $query = $this->db->pdo->prepare($sqlUpdateIntoProduct);

            $query-> bindValue(':id',$productId);
            $query-> bindValue(':quantity',$stockQuantity);
            $query-> bindValue(':totalBuyPrice',$stockTotalBuyPrice); 
            $query-> bindValue(':totalSellPrice',$stockTotalSellPrice);
            return $result=$query -> execute();

        }
        else{
            echo "<script>alert('Not enough product!')</script>";
        }

    }


    // Get details of customer cart in viewCartData.php file
    public function getCartData() {
        $sql = "SELECT * FROM customercart ORDER BY cartId DESC";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }


    // cart data retrieved by Id
    public function getCartProductDataById($id){
        $sql = "SELECT * FROM customercart WHERE cartId = :id LIMIT 1";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(':id',$id);
        $query -> execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }


    // Update main product table After Delete a Product from Cart in viewCartData.php fil
    public function updateProductTableDeleteOneCart($productId, $cartId) {
        $productId              = $productId;
        $cartId                 = $cartId;


        $sqlForCurt     = "SELECT * FROM customercart WHERE cartId = '$cartId'";
        $queryForCurt   = $this->db->pdo->prepare($sqlForCurt);
        $queryForCurt-> execute();
        $resultCurt     = $queryForCurt ->fetch(PDO::FETCH_OBJ);

        // echo '<pre>';
        // print_r($resultCurt);
        // echo '</pre>';

        $cartQuantity = $resultCurt->quantity;
        echo $cartQuantity."<br>";

        $sqlForProduct  = "SELECT * FROM product WHERE id = '$productId'";
        $queryForProduct   = $this->db->pdo->prepare($sqlForProduct);
        $queryForProduct-> execute();
        $resultProduct  = $queryForProduct ->fetch(PDO::FETCH_OBJ);

        // echo '<pre>';
        // print_r($resultProduct);
        // echo '</pre>';


        $remainQuantity         =  $resultProduct->quantity + $cartQuantity;
        $remainTotalSellPrice   =  ($resultProduct->totalSellPrice / $resultProduct->quantity) * $remainQuantity;
        $remainTotalBuyPrice    = ($resultProduct->totalBuyPrice / $resultProduct->quantity) * $remainQuantity;

            // echo $remainQuantity."<br>";
            // echo $remainTotalSellPrice."<br>";
            // echo $remainTotalBuyPrice;

        $sqlUpdateIntoProduct = "UPDATE product SET 
                                quantity        = :quantity, 
                                totalBuyPrice   = :totalBuyPrice, 
                                totalSellPrice  = :totalSellPrice
                                WHERE id        = :id";

        $query = $this->db->pdo->prepare($sqlUpdateIntoProduct);

        $query-> bindValue(':id',$productId);
        $query-> bindValue(':quantity',$remainQuantity);
        $query-> bindValue(':totalBuyPrice',$remainTotalBuyPrice); 
        $query-> bindValue(':totalSellPrice',$remainTotalSellPrice);
        $result=$query -> execute();

        if($result){
            $successMsg = "<script>alert('Product Deleted Successfully!')</script>";
            echo $successMsg;
            echo "<script>window.location = 'viewCartData.php'</script>";
        }
        else{
            $fail = "<script>alert('Product Not Deleted ')</script>";
            echo $fail;
        }
    }



    // Payment Process........
    public function updatePaymentTable($cartId, $customerId, $data){

        $getCustomerId    = (int)$customerId;
        $customerName     = $data['customerName'];
        $email            = $data['email'];
        $contact          = $data['contact'];
        $address          = $data['address'];
        $city             = $data['city'];
        $getCartId        = (int)$cartId;
        $productName      = $data['productName'];
        $quantity         = $data['quantity'];
        $price            = $data['price'];
        $cardNumber      = (int)$data['cardNumber'];
        $cardCVC         = (int)$data['cardCVC'];
        $expiryDate      = $data['expiryDate'];
        $paymentDate      = $data['paymentDate'];


        //insert Data in payment_details table........
        $sqlInsertIntoPaymentDetails ="INSERT INTO payment_details (customerId, customerName, email, contact, address, city, cartId, productName, quantity, price, cardNumber, cardCVC, expiryDate, paymentDate) VALUES(:getCustomerId, :customerName, :email, :contact, :address, :city, :getCartId, :productName, :quantity, :price, :cardNumber, :cardCVC, :expiryDate, :paymentDate)";

            $query = $this->db->pdo->prepare($sqlInsertIntoPaymentDetails);
            $query-> bindValue(':getCustomerId',$getCustomerId);
            $query-> bindValue(':customerName',$customerName);
            $query-> bindValue(':email',$email);
            $query-> bindValue(':contact',$contact);
            $query-> bindValue(':address',$address);
            $query-> bindValue(':city',$city);
            $query-> bindValue(':getCartId',$getCartId);
            $query-> bindValue(':productName',$productName);
            $query-> bindValue(':quantity',$quantity);
            $query-> bindValue(':price',$price);
            $query-> bindValue(':cardNumber',$cardNumber);
            $query-> bindValue(':cardCVC',$cardCVC);
            $query-> bindValue(':expiryDate',$expiryDate);
            $query-> bindValue(':paymentDate',$paymentDate);
            $result=$query -> execute();

            if($result){
                echo "<script>alert('Payment Successful! You\'\ll Get Soon..')</script>";
            }

    }

    // data delete from customercart table......
    public function updateCartAfterPayment($cartId){
        $sqlForDeleteFromCart = "DELETE FROM customercart WHERE cartId = :id LIMIT 1";
        $query  = $this->db->pdo->prepare($sqlForDeleteFromCart);
        $query-> bindValue(':id',$cartId);
        $query -> execute();
    }


    // viewCartData Show in Payment Form
    public function getPurchaseCustomerDetails($customerId){
        $customerId             = $customerId;

        $sqlForCurt     = "SELECT * FROM customercart WHERE customerId = '$customerId'";
        $queryForCurt   = $this->db->pdo->prepare($sqlForCurt);
        $queryForCurt-> execute();
        $resultForCurt  = $queryForCurt ->fetch(PDO::FETCH_OBJ);
        // return $resultForCurt;

        $getCustomerId = $resultForCurt->customerId;
        
        $sqlForCustomer     = "SELECT * FROM customer WHERE id = '$getCustomerId'";
        $queryForCustomer   = $this->db->pdo->prepare($sqlForCustomer);
        $queryForCustomer-> execute();
        $resultForCustomer  = $queryForCustomer ->fetch(PDO::FETCH_OBJ);
        return $resultForCustomer;


    }

    public function getPurchaseCartDetails($cartId){
        $cartId             = $cartId;

        $sqlForCurt     = "SELECT * FROM customercart WHERE cartId = '$cartId'";
        $queryForCurt   = $this->db->pdo->prepare($sqlForCurt);
        $queryForCurt-> execute();
        $resultForCurt  = $queryForCurt ->fetch(PDO::FETCH_OBJ);
        return $resultForCurt;

    


    }





    // cart product data Delete from main product table in viewCartData.php file
    public function deleteCartProductData($id){
        $sql    = "DELETE FROM customercart WHERE cartId = :id LIMIT 1";
        $query  = $this->db->pdo->prepare($sql);
        $query-> bindValue(':id',$id);
        $result =$query -> execute();
        $result;
    }


    public function searchInViewCartData($search){
        $sql = "SELECT * FROM customercart WHERE productName LIKE '%$search%'";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }


    public function searchInProductList($search){
        $sql = "SELECT * FROM product WHERE productName LIKE '%$search%'";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }


    public function searchInStock($search){
        $sql = "SELECT * FROM product WHERE productName LIKE '%$search%'";
        $query = $this->db->pdo->prepare($sql);
        $query -> execute();
        $result = $query ->fetchAll();
        return $result;
    }

}


?>