<?php
require_once("../../login-check.php");
include "../../components/header.php"; 
require_once("../../config.php"); 
 ?>

<script>


function DobaviProdukt() {
  window.location = "create.php";
}

$(document).ready(function() {
  $("#search").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("tbody tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

<style>

</style>

<div class="d-flex sidebar flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">LZ1KAM</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="../artikuli/dashboard.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            Артикули
          </a>
        </li>
        <li>
          <a href="../izdadeni/index.php" class="nav-link active ">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#table"/></svg>
            Издадени
          </a>
        </li>
        <li>
          <a href="#" class="nav-link link-dark">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
            Потребители
          </a>
        </li>
      </ul>
      <hr>
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
          <strong><?php echo "$username"?></strong>
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item" href="#">New project...</a></li>
          <li><a class="dropdown-item" href="#">Settings</a></li>
          <li><a class="dropdown-item" href="#">Profile</a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
  </div>

<b class="page-title d-flex justify-content-center mt-3">ИЗДАДЕНИ</b>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
                <!--
                                <h5>Капитал: <?php echo $total_cena . " лв. "; ?></h5> 
            <h5>Брой артикули: <?php echo $total_produkti . " бр. "; ?></h5> 
                -->
        </div>
    </div>
</div>
<div class="container">
    <div class="row mt-5 mb-3">
        <div class="col-sm-12">
            <div class="input-group">
                <input type="text" id="search" class="form-control" placeholder="Потърси...">
            </div>
        </div>
    </div>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>№</th>
                <th>Име</th>
                <th>Фирма</th>
                <th>Локация</th>
                <th>Лице</th>
                <th>Дата на производство</th>
                <th>Брой</th>
                <th>Стойност</th>
                <th>Общо</th>
                <th>Време на последен запис</th>
                <th>Действия</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 

            $sql = "SELECT izdadeno_id,izdadeno_ime,izdadeno_lokaciq,izdadeno_firma,izdadeno_lice,izdadeno_date,izdadeno_broi,izdadeno_stoinost,izdadeno_obshto,izdadeno_datetime FROM izdadeni";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . ("#" . $row["izdadeno_id"]) . "</td>";
                    echo "<td>" . $row["izdadeno_ime"] . "</td>";
                    echo "<td>" . $row["izdadeno_firma"] . "</td>";
                    echo "<td>" . $row["izdadeno_lokaciq"] . "</td>";
                    echo "<td>" . $row["izdadeno_lice"] . "</td>";
                    echo "<td>" . $row["izdadeno_date"] . "</td>";
                    echo "<td>" . ($row["izdadeno_broi"] ? $row["izdadeno_broi"] . " бр." : "") . "</td>";
                    echo "<td>" . ($row["izdadeno_stoinost"] ? $row["izdadeno_stoinost"] . " лв." : "") . "</td>";
                    echo "<td>" . ($row["izdadeno_obshto"] ? $row["izdadeno_obshto"] . " лв." : "") . "</td>";
                    echo "<td>" . $row["izdadeno_datetime"] . "</td>";
                    echo '<td class="d-flex justify-content-center"><a href="delete.php?id=' . $row["izdadeno_id"] . '" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a></td>';         
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Няма намерени резултати!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include "../../components/footer.php" ?>