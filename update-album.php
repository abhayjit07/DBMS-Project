<?php
include("includes/config.php");

if (isset($_POST["updateSong"])) {
    $songId = $_POST["songid"];
    $title = $_POST["title"];
    $artist = $_POST["artist"];
    //$album = $_POST["album"];
    $genre = $_POST["genre"];

    // Check if the artist ID, genre ID, and album ID exist in the database
    $checkArtistQuery = "SELECT * FROM artists WHERE id = '$artist'";
    $checkGenreQuery = "SELECT * FROM genres WHERE id = '$genre'";
    //$checkAlbumQuery = "SELECT * FROM albums WHERE id = '$album'";
    
    $artistResult = $con->query($checkArtistQuery);
    $genreResult = $con->query($checkGenreQuery);
    //$albumResult = $con->query($checkAlbumQuery);
    
    if ($artistResult->num_rows > 0 && $genreResult->num_rows > 0) {
        // Update the song details in the database
        $updateQuery = "UPDATE albums SET title = '$title', artist = '$artist', genre = '$genre' WHERE id = '$songId'";
        
        if ($con->query($updateQuery) === TRUE) {
            // Song updated successfully, redirect to remove-song.php
            header("Location: remove-album.php?success");
            exit(); // Make sure to exit after redirecting
        } else {
            // Error updating song, redirect to remove-song.php with an error message
            header("Location: remove-album.php?error=1");
            exit(); // Make sure to exit after redirecting
        }
    } else {
        // Invalid artist ID, genre ID, or album ID, redirect to remove-song.php with an error message
        header("Location: remove-album.php?error=2");
        exit(); // Make sure to exit after redirecting
    }
}
?>


