<?php
include("includes/config.php");

if (isset($_POST["removeUser"])) {
    $userName = $_POST["username"];

    // Check if the user exists
    $checkUserQuery = "SELECT * FROM users WHERE username = '$userName'";
    $checkUserResult = $con->query($checkUserQuery);

    if ($checkUserResult->num_rows > 0) {
        // Get the user ID
        $userRow = $checkUserResult->fetch_assoc();
        $userId = $userRow['id'];

        // Delete the songs in the playlists
        $deleteSongsQuery = "DELETE FROM playlistsongs WHERE playlistId IN (SELECT id FROM playlists WHERE owner = '$userName')";
        if ($con->query($deleteSongsQuery) === TRUE) {
            // Delete the corresponding playlists
            $deletePlaylistsQuery = "DELETE FROM playlists WHERE owner = '$userName'";
            if ($con->query($deletePlaylistsQuery) === TRUE) {
                // Delete the user
                $deleteUserQuery = "DELETE FROM users WHERE username = '$userName'";
                if ($con->query($deleteUserQuery) === TRUE) {
                    echo "User, corresponding playlists, and associated songs deleted successfully.";
                } else {
                    echo "Error deleting user: " . $con->error;
                }
            } else {
                echo "Error deleting playlists: " . $con->error;
            }
        } else {
            echo "Error deleting songs: " . $con->error;
        }
    } else {
        echo "User does not exist.";
    }
}
?>