<?php 
include "../../components/header.php";
require_once("../../login-check.php");
require_once("../../config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM izdadeni WHERE izdadeno_id = $id";
    if(mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">Успешно изтрихте продукт!</div>';
        header('Location: index.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

include "../../components/footer.php";

?>
