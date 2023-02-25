<?php 
require_once("../../login-check.php");
include "../../components/header.php"; 
require_once("../../config.php"); 

$isAdmin = false;
if (isset($_SESSION["role"]) && $_SESSION["role"] === "admin") {
    $isAdmin = true;
}

$username = $_SESSION['username'];

$sql = "SELECT ID, ime, firma, lokaciq,lice, date, broi, stoinost, obshto, datetime,total_cena, total_produkti FROM produkti ORDER BY ID DESC";
$result = mysqli_query($conn, $sql);
$izvedi = mysqli_fetch_assoc($result);
$total_cena = $izvedi['total_cena'];
$total_produkti = $izvedi['total_produkti'];
?>
  
  <div class="d-flex sidebar flex-column flex-shrink-0 p-3 bg-light" style="width: 280px;">
      <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <span class="fs-4">LZ1KAM</span>
      </a>
      <hr>
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="#" class="nav-link active" aria-current="page">
            <svg class="bi pe-none me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
            Артикули
          </a>
        </li>
        <li>
          <a href="../izdadeni/index.php" class="nav-link link-dark">
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


<!--<nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">LZ1KAM - ИНВЕНТАР</a>
    <div>
        <a class="btn btn-primary" href="../izdadeni/index.php">Издадени</a>
        <?php if ($isAdmin): ?>
        <a class="btn btn-success" href="create.php">Добави потребител</a>
        <?php endif; ?>
        <a href="../logout.php" class="btn btn-danger">Изход</a>
    </div>
  </div>
</nav>
        -->

<b class="page-title d-flex justify-content-center mt-3">АРТИКУЛИ</b>
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
                    echo '<a href="given.php?id=' . $row["ID"] . '" class="btn btn-success"><i class="bi bi-receipt"></i></a>';            
                    echo '<a href="delete.php?id=' . $row["ID"] . '" class="btn btn-danger ikona"><i class="bi bi-trash3-fill"></i></a></td>';            
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