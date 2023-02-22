<?php
include "../../components/header.php"; 
require_once("../../config.php"); 
require_once("../../login-check.php");
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

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LZ1KAM - ИНВЕНТАР</a>
    <div>
    <a class="btn btn-primary" href="../artikuli/dashboard.php">Артикули</a>
        <a href="../logout.php" class="btn btn-danger">Изход</a>
    </div>
  </div>
</nav>

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