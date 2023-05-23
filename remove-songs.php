<?php
include("includes/config.php");

if (isset($_POST["removeSong"])) {
    $userId = $_POST["songid"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM songs WHERE id = '$userId'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Delete the user
        $deleteUserQuery = "DELETE FROM songs WHERE id = '$userId'";
        if ($con->query($deleteUserQuery) === TRUE) {
            header("Location: remove-son.php?error=3");
        } else {
            echo "Error deleting user: " . $con->error;
        }
    } else {
        echo "User does not exist.";
    }
}

?>
