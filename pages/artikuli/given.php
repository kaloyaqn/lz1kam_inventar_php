<?php
require_once("../../config.php");
require_once("../../login-check.php");
include "../../components/header.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $ime = isset($_POST["ime"]) ? $_POST["ime"] : '';
    $firma = isset($_POST["firma"]) ? $_POST["firma"] : '';
    $lokaciq = $_POST["lokaciq"];
    $lice = $_POST["lice"];
    $date = isset($_POST["date"]) ? $_POST["date"] : '';
    $broi = $_POST["broi"];
    $stoinost = isset($_POST["stoinost"]) ? $_POST["stoinost"] : '';
    $vzet = $_POST["vzet"];

    $sql = "UPDATE produkti SET lokaciq='$lokaciq', lice='$lice', broi=($broi-$vzet) WHERE ID=$id;";
    $sql .= "INSERT INTO izdadeni (izdadeno_ime,izdadeno_lokaciq,izdadeno_firma,izdadeno_lice,izdadeno_date,izdadeno_broi,izdadeno_stoinost)
    VALUES ('$ime','$lokaciq','$firma','$lice','$date','$vzet','$stoinost');";
    $result = mysqli_multi_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Успешно обновихте записа.');</script>";
        header("Location: dashboard.php");
    } else {
        echo "<script>alert('Грешка при обновяване на записа.');</script>";
    }
} else {
    $id = $_GET["id"];

    $sql = "SELECT * FROM produkti WHERE ID=$id";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Грешка: Невалиден идентификатор на запис.";
        exit;
    }
}


?>

<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LZ1KAM - ИНВЕНТАР</a>
    <a href="../logout.php" class="btn btn-danger">Изход</a>
  </div>
</nav>


<div class="container-sm d-flex justify-content-center align-items-center vh-100 flex-column">
    <h2>Изписване на артикул: <b><?php echo $row["ime"] ?></b></h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row["ID"] ?>">
        <div class="form-group">
            <input type="hidden" class="form-control" id="ime" name="ime" value="<?php echo $row["ime"] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="firma" name="firma" value="<?php echo $row["firma"] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="date" name="date" value="<?php echo $row["date"] ?>">
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" id="stoinost" name="stoinost" value="<?php echo $row["stoinost"] ?>">
        </div>
        <!-- -->
        <div class="form-group">
            <label for="lice">Лице:</label>
            <input type="text" class="form-control" id="lice" name="lice" value="<?php echo $row["lice"] ?>">
        </div>
        <div class="form-group">
            <label for="lokaciq">Локация:</label>
            <input type="text" class="form-control" id="lokaciq" name="lokaciq" value="<?php echo $row["lokaciq"] ?>">
        </div>
        <div class="form-group">
            <label for="broi">Брой:</label>
            <input type="number" class="form-control" id="broi" name="broi" value="<?php echo $row["broi"] ?>" readonly>
        </div>
        <div class="form-group">
            <label for="broi">Взет брой:</label>
            <input class="form-control" type="number" name="vzet" id="vzet" value="" placeholder="Бройки взети">
        </div>

        

        <button type=submit class="btn btn-success mt-3 w-100" name="submit">Изпиши</button>
</form>
</div>
