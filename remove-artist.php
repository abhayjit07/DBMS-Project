<?php
include("includes/config.php");

if (isset($_POST["removeUser"])) {
    $userId = $_POST["userId"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM artists WHERE id = '$userId'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Delete the user
        $deleteUserQuery = "DELETE FROM artists WHERE id = '$userId'";
        if ($con->query($deleteUserQuery) === TRUE) {
            header("Location: remove-art.php?success");
        } else {
            echo "Error deleting user: " . $con->error;
        }
    } else {
        echo "User does not exist.";
    }
}
?>
