<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>

<section class ="container addSupplier">
    <h5 style="color:#282C34;" class="addSupplierInput">New Supplier Form</h5>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <label  for="name">Name</label><br>
            <input type="text" id="name" name="name" class="form-control addSupplierInput" placeholder="Example: Pratik Dav" aria-label="Example: Pratik Dav">
        </div>
        <div class="col-md-6">
            <label  for="gender">Gender</label><br>
            <select class="form-select addSupplierInput" aria-label="Default select example">
                <option selected>Male</option>
                <option value="1">Female</option>
                <option value="2">Other</option>
            </select>
        </div>
        <div class="col-md-6">
            <label class="addSupplierInput" for="number">Contact</label><br>
            <input type="text" id="number" class="form-control addSupplierInput" placeholder="Example: 01852088728" aria-label="Example: 01852088728">
        </div>
        <div class="col-md-6">
            <label class="addSupplierInput" for="email">Email</label><br>
            <input type="text" id="email" class="form-control addSupplierInput" placeholder="Example: royonup@gmail.com" aria-label="Example: royonup@gmail.com">
        </div>
        <div class="col-md-6">
            <label class="addSupplierInput" for="address">Address</label><br>
            <input type="text" id="address" name="address" class="form-control addSupplierInput" placeholder="Example: Patiya, Chittagong" aria-label="Example: Patiya, Chittagong">
        </div>
        <div class="col-md-6">
            <label class="addSupplierInput"  for="registrationDate">Registration Date</label><br>
            <input type="date" name="registrationDate" id="dob">
        </div>
    </div>
</section>

 <?php include './footer.php'?> 