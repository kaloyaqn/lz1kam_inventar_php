<?php include "../components/header.php"; require_once("../config.php"); 


$sql = "SELECT ID, ime, firma, lokaciq,lice, date, broi, stoinost, obshto, datetime,total_cena, total_produkti FROM produkti";
$result = mysqli_query($conn, $sql);
$izvedi = mysqli_fetch_assoc($result);
$total_cena = $izvedi['total_cena'];
$total_produkti = $izvedi['total_produkti'];


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

<h1 class="text-center">АРТИКУЛИ</h1>
<div class="container">
    <div class="row mt-3">
        <div class="col-md-6">
            <a class="btn btn-success" href="izdadeni/index.php">Издадени</a>
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



            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . ("#" . $row["ID"]) . "</td>";
                    echo "<td>" . $row["ime"] . "</td>";
                    echo "<td>" . $row["firma"] . "</td>";
                    echo "<td>" . $row["lokaciq"] . "</td>";
                    echo "<td>" . $row["lice"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . ($row["broi"] ? $row["broi"] . " бр." : "") . "</td>";
                    echo "<td>" . ($row["stoinost"] ? $row["stoinost"] . " лв." : "") . "</td>";
                    echo "<td>" . ($row["obshto"] ? $row["obshto"] . " лв." : "") . "</td>";
                    echo "<td>" . $row["datetime"] . "</td>";
                    echo '<td><a href="edit.php?id=' . $row["ID"] . '" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a> ';
                    echo '<a href="delete.php?id=' . $row["ID"] . '" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></a>';            
                    echo '<a href="given.php?id=' . $row["ID"] . '" class="btn btn-success ikona"><i class="bi bi-receipt"></i></a></td>';            
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>Няма намерени резултати!</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>



<?php include "../components/footer.php" ?>