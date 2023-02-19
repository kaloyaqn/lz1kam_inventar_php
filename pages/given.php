<?php
require_once("../config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $lokaciq = $_POST["lokaciq"];
    $lice = $_POST["lice"];
    $broi = $_POST["broi"];


    $sql = "UPDATE produkti SET lokaciq='$lokaciq', lice='$lice', broi=$broi WHERE ID=$id";
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
    <h2>Изписване на артикул</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="hidden" name="id" value="<?php echo $row["ID"] ?>">
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
            <input type="number" class="form-control" id="broi" name="broi" value="<?php echo $row["broi"] ?>">
        </div>


        <button type=submit class="btn btn-success mt-3 w-100" name="submit">Изпиши</button>
</div>
