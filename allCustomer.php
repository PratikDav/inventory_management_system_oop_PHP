<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>
<?php

?>
<div id="stockTable" class="mt-3 mb-3 d-flex">
    <h5 class="fw-bold fs-5 w-75 mt-2" style="color:#334155" >All Customer</h5>
    <a href="adminPanel.php" class="btn fw-bold border w-25" type="submit">
        <img class="me-1" src="image/back.png" alt="" width="25px" height="25px">
        Back
    </a>
</div>
<hr id="stockTable">
<table id="stockTable" class="table">
  <thead>
    <tr>
      <th class="text-center" scope="col">Serial No.</th>
      <th class="text-center" scope="col">Name</th>
      <th class="text-center" scope="col">E-mail</th>
      <th class="text-center" scope="col">Contact</th>
      <th class="text-center" scope="col">Reg. Date</th>
      <th class="text-center" scope="col">Manage</th>
    </tr>
  </thead>
<?php
  $customerData = $registration->getAllCustomer();

    if ($customerData){
      $i = 0;
      foreach ($customerData as $customerData) {
          $i++;
?>


  <tbody>
    <tr>
    <th class="text-center" scope="row"><?php echo $i;?></th>
      <td class="text-center" ><?php echo ucfirst($customerData['firstName']);?> <?php echo ucfirst($customerData['lastName']);?></td>
      <td class="text-center" ><?php echo $customerData['email'];?></td>
      <td class="text-center" ><?php echo $customerData['contact'];?></td>
      <td class="text-center" ><?php echo $customerData['registrationDate'];?></td>
      <td class="text-center" >
        <?php 
        if (isset($_GET['action']) && $_GET['action'] == 'update'){
            $customerSession = Session::get('customerPanelName');
            if(isset($customerSession)){
                // echo "<script>window.location = 'profile.php'</script>";
                
            }
        }
        ?>
        <a href="?action=update&id=<?php echo $customerData['id']; ?>" class="btn border-success text-center fw-bold" type="submit">
                <img class="me-1" src="image/updatedB.png" alt="" width="25px" height="25px">
                Update
            </a>
      </td>
    </tr>
    <?php
        
    }
  }
  else{?>
      <tr>
          <td class="text-center" colspan="4">
              <h2>No Customer Registered!</h2>
          </td>
      </tr>
  <?php }?>
  </tbody>
</table>


<?php include './footer.php'?>