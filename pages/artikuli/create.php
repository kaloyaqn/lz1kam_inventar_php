<?php
session_start();
include "../../components/header.php"; 
require_once("../../config.php"); 
require_once("../../login-check.php");

if(isset($_POST['submit']))
{    
    $ime = $_POST['ime'];
    $lokaciq = $_POST['lokaciq'];
    $firma = $_POST['firma'];
    $lice = $_POST['lice'];
    $date = $_POST['date'];
    $broi = $_POST['broi'];
    $stoinost = $_POST['stoinost'];

    $sql = "INSERT INTO produkti (ime,lokaciq,firma,lice,date,broi,stoinost)
    VALUES ('$ime','$lokaciq','$firma','$lice','$date','$broi','$stoinost')";
    if (mysqli_query($conn, $sql)) {
    header("Location: dashboard.php");

    } else {
    echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LZ1KAM - ИНВЕНТАР</a>
    <a href="../logout.php" class="btn btn-danger">Изход</a>
  </div>
</nav>

<div class="container-sm d-flex justify-content-center align-items-center vh-100 flex-column">

    <h2>Добавяне на <b>артикул</b></h2>

    <form method="post">
        <label for="ime" class="form-label">Име на артикул</label>
        <input type="text" class="form-control" name="ime" required>

        <label>Локация</label>
        <input type="text" name="lokaciq" class="form-control" >

        <label>Фирма</label>
        <input type="text" name="firma" class="form-control" >

        <label>Лице</label>
        <input type="text" name="lice" class="form-control" >

        <label>Дата на производство</label>
        <input type="date" name="date" class="form-control" >

        
        <label>Брой</label>
        <input type="number" name="broi" class="form-control" >

        <label>Стойност (в левове)</label>
        <input type="number" min="1" step="any" name="stoinost" class="form-control" >

        <button type=submit class="btn btn-primary mt-3 w-100" name="submit">Добави</button>
    </form>
</div>




<?php include "../../components/footer.php" ?>


 