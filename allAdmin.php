<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>

<div id="stockTable" class="mt-3 mb-3">
    <h5 class="fw-bold fs-5" style="color:#334155" >All Admin</h5>
    <hr>
</div>
<table id="stockTable" class="table">
  <thead>
    <tr>
      <th class="text-center" scope="col">Serial No.</th>
      <th class="text-center" scope="col">Name</th>
      <th class="text-center" scope="col">E-mail</th>
      <th class="text-center" scope="col">Contact</th>
      <th class="text-center" scope="col">NID</th>
      <th class="text-center" scope="col">Reg. Date</th>
      <th class="text-center" scope="col">Manage</th>
    </tr>
  </thead>
<?php
  $adminData = $registration->getAllAdmin();

    if ($adminData){
      $i = 0;
      foreach ($adminData as $adminData) {
          $i++;
?>
  <tbody>
    <tr>
      <th class="text-center" scope="row"><?php echo $i;?></th>
      <td class="text-center" ><?php echo ucfirst($adminData['firstName']);?> <?php echo ucfirst($adminData['lastName']);?></td>
      <td class="text-center" ><?php echo $adminData['email'];?></td>
      <td class="text-center" ><?php echo $adminData['contact'];?></td>
      <td class="text-center" ><?php echo $adminData['nid'];?></td>
      <td class="text-center" ><?php echo $adminData['registrationDate'];?></td>
      <td class="text-center" >
        <a href="profile.php?id=<?php echo $adminData['id']?>" class="btn border-success text-center fw-bold " type="submit">
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
              <h2>No Admin Registered!</h2>
          </td>
      </tr>
  <?php }?>
  </tbody>
</table>

<?php include './footer.php'?>