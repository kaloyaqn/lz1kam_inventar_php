<?php include "components/header.php" ?>

<?php require_once ("config.php"); ?>

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