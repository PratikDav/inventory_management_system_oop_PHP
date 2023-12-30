<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>
<?php

$registration = new Registration();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addCustomer'])){
    $customerRegistration = $registration->customerRegistrations($_POST);
}

?> 

<section class ="container addCustomers">
    <h5 style="color:#282C34;" class="addCustomersInput">New Customer Form</h5>
    <hr>

    <?php
        if (isset($customerRegistration)) {
            echo $customerRegistration;
        }
            
    ?>

    <form method ="POST" class="row">
        <div class="col-md-6">
            <label for="firstName">First Name</label><br>
            <input type="text" id="firstName" name="firstName" class="form-control addCustomersInput" placeholder="Example: Pratik Dav" aria-label="Example: Pratik Dav" required>
        </div>
        <div class="col-md-6">
            <label for="lastName">Last Name</label><br>
            <input type="text" id="lastName" name="lastName" class="form-control addCustomersInput" placeholder="Example: Pratik Dav" aria-label="Example: Pratik Dav" required>
        </div>
        <div class="col-md-6">
            <label  for="gender">Gender</label><br>
            <select name="gender" class="form-select addCustomersInput" aria-label="Default select example">
                <option selected>Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="number">Contact</label><br>
            <input type="text" name="number" id="number" class="form-control addCustomersInput" placeholder="Example: 01852088728" aria-label="Example: 01852088728" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="email">Email</label><br>
            <input type="email" name="email" id="email" class="form-control addCustomersInput" placeholder="Example: royonup@gmail.com" aria-label="Example: royonup@gmail.com" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="password">Password</label><br>
            <input type="password" name="password" id="password" class="form-control addCustomersInput" placeholder="Password" aria-label="Example: royonup@gmail.com" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="address">Address</label><br>
            <input type="text" id="address" name="address" class="form-control addCustomersInput" placeholder="Example: Patiya, Chittagong" aria-label="Example: Patiya, Chittagong" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput"  for="registrationDate">Registration Date</label><br>
            <input type="date" name="registrationDate" class="form-control addCustomersInput" id="regDate" required>
        </div><br>
        <button name="addCustomer" class="w-25 mt-3 ms-2 btn btn-primary" type="submit">Add Customer</button>
    </form>
</section>

 <?php include './footer.php'?> 