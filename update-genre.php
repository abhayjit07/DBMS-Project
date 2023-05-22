<?php
include("includes/config.php");

if (isset($_POST["updateSong"])) {
    $songId = $_POST["id"];
    $title = $_POST["name"];
    // $artist = $_POST["artist"];
    // $album = $_POST["album"];
    // $genre = $_POST["genre"];

    // Check if the artist ID, genre ID, and album ID exist in the database
    // $checkArtistQuery = "SELECT * FROM artists WHERE id = '$artist'";
    $checkGenreQuery = "SELECT * FROM genres WHERE name = '$title'";
    // $checkAlbumQuery = "SELECT * FROM albums WHERE id = '$album'";
    
    //$artistResult = $con->query($checkArtistQuery);
    $genreResult = $con->query($checkGenreQuery);
    //$albumResult = $con->query($checkAlbumQuery);
    
    if ($genreResult->num_rows === 0) {
        // Update the song details in the database
        $updateQuery = "UPDATE genres SET name = '$title' WHERE id = '$songId'";
        
        if ($con->query($updateQuery) === TRUE) {
            // Song updated successfully, redirect to remove-song.php
            header("Location: remove-genre.php?success");
            exit(); // Make sure to exit after redirecting
        } else {
            // Error updating song, redirect to remove-song.php with an error message
            header("Location: remove-genre.php?error=1");
            exit(); // Make sure to exit after redirecting
        }
    } else {
        // Genre name already exists
        header("Location: remove-genre.php?error=2");
        exit(); // Make sure to exit after redirecting
    }
}
?>


