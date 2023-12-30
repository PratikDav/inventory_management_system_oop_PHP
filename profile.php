<?php include './header.php'?>
<?php include_once "./nav.php";
Session::checkSession();
?>
<!-- offcanvas Section Start -->
<section class="offcanvas offcanvas-start show" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
    <div class="offcanvas-header mx-5">
      <img  src="image/logo.jpg" alt="" width="60" height="60" align-items: center;>
    </div>
    <div class="offcanvas-body">
        <a style="font-size:15px" class="ms-3 mt-2 dropButton btn" href="">
          Contact
        </a>
        <a style="font-size:15px" class="ms-3 mt-2 dropButton btn" href="">
          Help
        </a>
    </div>
  </section>
  <!-- offcanvas Section End -->
<?php
    $loginMSG = Session::get('loginMSG');
    $stuffPanelName = Session::get('stuffPanelName');
    $customerPanelName = Session::get('customerPanelName');
    $adminPanelName = Session::get('adminPanelName');
    if (isset($loginMSG)) {
   
?>
    <?php 
            $firstName = Session::get('firstName');
            $lastName = Session::get('lastName');
            if (isset($firstName)) {
             
    ?> 
<div style="margin-top:60px;" class="container">
    <div class="">
        <h3 class="text-center text-bg-secondary p-3 fw-bold rounded">
            <?php echo ucfirst($firstName)."'s"; ?> 
            Profile(
                <?php
                 if (isset($customerPanelName) or isset($stuffPanelName) or isset($adminPanelName)) {
                    echo $customerPanelName;
                    echo $stuffPanelName;
                    echo $adminPanelName;
        
                 } 
                ?>
            )
        </h3>
        
    </div>
    
    
   

  <form method ="POST" class="row position-absolute top-50 start-50 translate-middle mt-5">
        <div class="col-md-6">
            <label for="firstName">First Name</label><br>
            <input type="text" id="firstName" name="firstName" class="form-control addCustomersInput" value="<?php echo $firstName;}?>" aria-label="Example: Pratik Dav" required>
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
        <button name="update" class="w-25 mt-3 ms-2 btn btn-info fw-bold" type="submit">Update</button>
    </form>

    <div class="body">
    <?php 
        echo $loginMSG;
    };
    Session::set('loginMSG', NULL);
    ?>
  </div>
 
</div>

<?php include './footer.php'?>