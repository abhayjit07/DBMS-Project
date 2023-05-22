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
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . $con->error;
        }
    } else {
        echo "User does not exist.";
    }
}

?>
