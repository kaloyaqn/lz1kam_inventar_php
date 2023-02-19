<?php
// Check if the form has been submitted
include "../components/header.php";

if (isset($_POST['submit'])) {
    // Retrieve the form data
    $lice = $_POST['lice'];
    $broi = $_POST['broi'];
    $lokaciq = $_POST['lokaciq'];
    $new_quantity = $_POST['new_quantity'];

    // Validate the new quantity value
    if (!is_numeric($new_quantity) || $new_quantity < 0) {
        $error = "Please enter a valid number for the new quantity.";
    } else {
        // Subtract the new quantity from the existing quantity
        $new_broi = $broi - $new_quantity;

        // Build the SQL query to update the database
        $sql = "UPDATE table_name SET broi = '$new_broi', lice = '$lice', lokaciq = '$lokaciq' WHERE id = '$id'";

        // Execute the query
        if (mysqli_query($conn, $sql)) {
            $success = "Record updated successfully.";
        } else {
            $error = "Error updating record: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>

<!-- Display any errors or success messages -->
<?php if (isset($error)): ?>
    <div class="alert alert-danger" role="alert"><?php echo $error; ?></div>
<?php endif; ?>

<?php if (isset($success)): ?>
    <div class="alert alert-success" role="alert"><?php echo $success; ?></div>
<?php endif; ?>

<!-- Create the form -->
<form method="post">
    <div class="form-group">
        <label for="lice">Lice:</label>
        <input type="text" class="form-control" id="lice" name="lice" value="<?php echo $lice; ?>">
    </div>
    <div class="form-group">
        <label for="broi">Broi:</label>
        <input type="text" class="form-control" id="broi" name="broi" value="<?php echo $broi; ?>" readonly>
    </div>
    <div class="form-group">
        <label for="lokaciq">Lokaciq:</label>
        <input type="text" class="form-control" id="lokaciq" name="lokaciq" value="<?php echo $lokaciq; ?>">
    </div>
    <div class="form-group">
        <label for="new_quantity">New Quantity:</label>
        <input type="text" class="form-control" id="new_quantity" name="new_quantity">
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
</form>

<?php include "../components/footer.php"; ?>
