<?php
include("includes/config.php");

if (isset($_POST["removeUser"])) {
    $userId = $_POST["id"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM users WHERE id = '$userId'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Delete the user
        $deleteUserQuery = "DELETE FROM users WHERE id = '$userId'";
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
