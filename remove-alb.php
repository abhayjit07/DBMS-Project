<?php
include("includes/config.php");

if (isset($_POST["removeSong"])) {
    $userId = $_POST["songid"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM albums WHERE id = '$userId'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Delete the user
        $deleteUserQuery = "DELETE FROM albums WHERE id = '$userId'";
        if ($con->query($deleteUserQuery) === TRUE) {
            header("Location: remove-album.php?error=3");
        } else {
            echo "Error deleting Album: " . $con->error;
        }
    } else {
        echo "Album does not exist.";
    }
}
?>
