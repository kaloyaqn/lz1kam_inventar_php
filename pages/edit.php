<?php
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $ime = $_POST["ime"];
    $firma = $_POST["firma"];
    $lokaciq = $_POST["lokaciq"];
    $lice = $_POST["lice"];
    $date = $_POST["date"];
    $broi = $_POST["broi"];
    $stoinost = $_POST["stoinost"];

    $sql = "UPDATE produkti SET ime='$ime', firma='$firma', lokaciq='$lokaciq', lice='$lice', date='$date', broi=$broi, stoinost=$stoinost WHERE ID=$id";
    $result = mysqli_query($conn, $sql);

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

include "../components/header.php";
?>

<div class="container-sm d-flex justify-content-center align-items-center vh-100 flex-column">
    <h2>Редактиране на артикул</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row["ID"] ?>">
        <div class="form-group">
            <label for="ime">Име:</label>
            <input type="text" class="form-control" id="ime" name="ime" value="<?php echo $row["ime"] ?>">
        </div>
        <div class="form-group">
            <label for="firma">Фирма:</label>
            <input type="text" class="form-control" id="firma" name="firma" value="<?php echo $row["firma"] ?>">
        </div>
        <div class="form-group">
            <label for="lokaciq">Локация:</label>
            <input type="text" class="form-control" id="lokaciq" name="lokaciq" value="<?php echo $row["lokaciq"] ?>">
        </div>
        <div class="form-group">
            <label for="lice">Лице:</label>
            <input type="text" class="form-control" id="lice" name="lice" value="<?php echo $row["lice"] ?>">
        </div>
        <div class="form-group">
            <label for="date">Дата на производство:</label>
            <input type="date" class="form-control" id="date" name="date" value="<?php echo $row["date"] ?>">
        </div>
        <div class="form-group">
            <label for="broi">Брой:</label>
            <input type="number" class="form-control" id="broi" name="broi" value="<?php echo $row["broi"] ?>">
        </div>
        <div class="form-group">
            <label for="stoinost">Стойност:</label>
            <input type="number" class="form-control" id="stoinost" name="stoinost" value="<?php echo $row["stoinost"] ?>">
        </div>

        <button type=submit class="btn btn-warning mt-3 w-100" name="submit">Редактирай</button>
</div>