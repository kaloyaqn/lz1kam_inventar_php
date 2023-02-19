<?php 
include "../components/header.php";

require_once("../config.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM produkti WHERE ID = $id";
    if(mysqli_query($conn, $sql)) {
        echo '<div class="alert alert-success" role="alert">Успешно изтрихте продукт!</div>';
        header('Location: dashboard.php');
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

include "../components/footer.php";

?>
