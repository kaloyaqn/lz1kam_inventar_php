<?php 
include "components/header.php" ;
require_once ("config.php"); 


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        header("Location: pages/dashboard.php");
        exit();
    } else {
        echo "
        <div class='alert alert-danger' role='alert'>
        Грешно потребителско име или парола! Моля върнете се обратно или опитайте по-късно.
        </div>

        <button class='btn btn-primary w-100'><a class='text-white text-decoration-none' href='index.php'>Върни се обратно</a></button>
        ";        }
}

mysqli_close($conn);
?>

    <div class="container-sm vh-100 d-flex justify-content-center align-items-center">
        <form action="login.php" method="post">
            <label for="username" class="form-label">Потребителско име:</label>
            <input type="text" class="form-control" name="username">
            <br>
            <label for="password" class="form-label">Парола:</label>
            <input type="password" class="form-control mb-3" name="password">

            <button type="submit" class="btn btn-primary w-100">Влез</button>
        </form>
    </div>

<?php include "components/footer.php" ?>