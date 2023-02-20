<?php include "../../components/header.php"; require_once("../../config.php"); ?>

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

<h1 class="text-center">ИЗДАДЕНИ</h1>

<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <a class="btn btn-success" href="../dashboard.php">Артикули</a>
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
    <div class="col-sm-1">
        <button type="button" class="btn btn-primary" onclick="DobaviProdukt()">Добави</button>
        </div>
        <div class="col-sm-11">
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
                    echo '<td><a href="edit.php?id=' . $row["izdadeno_id"] . '" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a> ';
                    echo '<a href="delete.php?id=' . $row["izdadeno_id"] . '" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>';            
                    echo '<a href="given.php?id=' . $row["izdadeno_id"] . '" class="btn btn-success ikona"><i class="bi bi-receipt"></i></a></td>';            
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