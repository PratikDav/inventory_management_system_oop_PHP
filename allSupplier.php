<?php include './header.php'?>
<?php include_once "./nav.php";?>
<?php include "./sidenav.php";
Session::checkSession();?>

<div id="stockTable" class="mt-3 mb-3">
    <h5 class="fw-bold fs-5" style="color:#334155" >All Supplier</h5>
    <hr>
</div>
<table id="stockTable" class="table">
  <thead>
    <tr>
      <th class="text-center" scope="col">Serial No.</th>
      <th class="text-center" scope="col">First</th>
      <th class="text-center" scope="col">Last</th>
      <th class="text-center" scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th class="text-center" scope="row">1</th>
      <td class="text-center" >Mark</td>
      <td class="text-center" >Otto</td>
      <td class="text-center" >@mdo</td>
    </tr>
  </tbody>
</table>

<?php include './footer.php'?>