<?php 
Session::checkSession();
?>
<?php

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
  Session::destroy();
}
// if (isset($_GET['action']) && $_GET['action'] == 'click') {
   
//         $stuffPanelName = Session::get('stuffPanelName');
//         $customerPanelName = Session::get('customerPanelName');
//         $adminPanelName = Session::get('adminPanelName');

//         if (isset($adminPanelName) or isset($stuffPanelName) or isset($customerPanel)) {
//           header("Location: adminPanel.php");
//           header("Location: stuffPanel.php");
//           header("Location: customerPanel.php");
//        }  
// }
?>

<!-- Nav Section Start -->
<section class="mb-2">
  <nav style="margin-right:40px; background-color:#282C34;"class="navbar position-static top-0 start-0 w-100">
  <!-- <h5 class="text-white me-2 mx-auto">"Terminate The Bug,,</h5> -->
    <div  class="dropstart ms-auto">
      <a class="navbar-brand" data-bs-toggle="dropdown" aria-expanded="false">
        <img style="cursor: pointer;" src="image/user2.png" alt="" width="40" height="40">
      </a>
      <ul style="width:200px ; height:170px" class="dropdown-menu">
        <li><a class="dropdown-item fs-6" href="?action=click">
          <img src="" alt="">
          <?php 
              $userFirstName = Session::get('firstName');
              // $lastName = Session::get('lastName');
              if (isset($userFirstName)) {
                echo ucfirst($userFirstName);
              }
            ?>
        </a></li>
        <li><hr class="dropdown-divider"></li>

              <!-- my profile -->
        <li>
          <a  class="dropdown-item fs-6" href="profile.php">
          
          <img class="me-2" src="image/profile.png" alt="" width = "20px" height = "20px">
            My Profile
          </a>
        </li>


        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item fs-6" href="?action=logout">
          <img class="me-2" src="image/logout.png" alt="" width = "20px" height = "20px">
          Logout
        </a></li>
      </ul>
    </div>
  </nav>
</section>
