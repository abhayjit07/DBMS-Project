<?php
include("includes/config.php");

if (isset($_POST["removeSong"])) {
    $userId = $_POST["songid"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM genres WHERE id = '$userId'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        
        $deleteUserQuery = "DELETE FROM genres WHERE id = '$userId'";
        if ($con->query($deleteUserQuery) === TRUE) {
            header("Location: remove-genre.php?error=3");
        } else {
            echo "Error deleting Genre: " . $con->error;
        }
    } else {
        echo "Genre does not exist.";
    }
}

?>
