<?php 
include './header.php';

?>
<?php

$registration = new Registration();

if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])){
    
    $adminUserLogin     = $registration->adminUserLogin($_POST);
    $stuffUserLogin     = $registration->stuffUserLogin($_POST);
    $customerUserLogin  = $registration->customerUserLogin($_POST);
}


?> 

<form method="POST" class="container mt-5">
    <?php
        if (isset($userLogin)) {
            echo $userLogin;
        }
            
    ?>
    
    <div class="form-floating mb-3 ">
        <input name="email" type="email" class="form-control w-50" id="floatingInput" placeholder="name@example.com">
        <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
        <input name="pass" type="password" class="form-control w-50" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>
    <button name="login" class="btn btn-primary mt-2" type="submit">Login</button>
</form>
<?php include './footer.php'?>


