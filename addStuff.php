<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>
<?php

$registration = new Registration();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addStuff'])){
    $stuffRegistration = $registration->stuffRegistrations($_POST);
}

?> 

<section class ="container addStuff">
    <h5 style="color:#282C34;" class="addStuffInput">New Stuff Form</h5>
    <hr>

    <?php
        if (isset($stuffRegistration)) {
            echo $stuffRegistration;
        }
            
    ?>

    <form method="post" action="addStuff.php" class="row">
        <div class="col-md-6">
            <label  for="name">First Name</label><br>
            <input type="text" id="firstName" name="firstName" class="form-control addStuffInput" placeholder="Example: Pratik" aria-label="Example: Pratik" required>
        </div>
        <div class="col-md-6">
            <label  for="name">Last Name</label><br>
            <input type="text" id="lastName" name="lastName" class="form-control addStuffInput" placeholder="Example: Dav" aria-label="Example: Dav" required>
        </div>
        <div class="col-md-6 mt-2">
            <label  for="gender">Gender</label><br>
            <select name="gender" class="form-select addStuffInput" aria-label="Default select example" required>
                <option selected>Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
        </div>
        <div class="col-md-6 mt-2">
            <label class="addStuffInput" for="number">Contact</label><br>
            <input type="text" name="number" id="number" class="form-control addStuffInput" placeholder="Example: 01852088728" aria-label="Example: 01852088728" required>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput" for="email">Email</label><br>
            <input type="text" name="email" id="email" class="form-control addStuffInput" placeholder="Example: royonup@gmail.com" aria-label="Example: royonup@gmail.com" required>
        </div>
        <div class="col-md-6">
            <label class="addCustomersInput" for="password">Password</label><br>
            <input type="password" name="password" id="password" class="form-control addCustomersInput" placeholder="Password" aria-label="Example: royonup@gmail.com" required>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput" for="address">Address</label><br>
            <input type="text" id="address" name="address" class="form-control addStuffInput" placeholder="Example: Patiya, Chittagong" aria-label="Example: Patiya, Chittagong" required>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput"  for="birthDate">Date of Birth</label><br>
            <input type="date" name="birthDate" id="dob" required>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput" for="nid">National Identification (NID)</label><br>
            <input type="text" name="nid" id="nid" class="form-control addStuffInput" placeholder="Example: 01852088728" aria-label="Example: 17586958974563" required>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput" for="religion">Religion</label><br>
            <select name="religion" class="form-select addStuffInput" aria-label="Default select example" required>
                <option selected>Hindu</option>
                <option value="1">Islam</option>
                <option value="2">Other</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="addStuffInput"  for="registrationDate">Registration Date</label><br>
            <input type="date" name="registrationDate" id="dob" required>
        </div>
        <button name="addStuff" class="w-25 mt-3 ms-2 btn btn-primary" type="submit">Add Stuff</button>
    </form>
</section>

 <?php include './footer.php'?> 