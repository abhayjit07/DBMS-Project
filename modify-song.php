


<!DOCTYPE html>
<html>
<head>
    <title>Modify Song</title>
    <style>
        /* body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        } */

        body {
            font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            /* margin: 0;
            padding: 0; */
            background-color: #181818;
            font-size: 14px;
            min-width: 720px;
            color: #fff; 
        }

        h1 {
            text-align: center;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            background-color: #181818;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            background-color: #181818;
            color: #fff;
        }

        /* button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        } */

        button[type="submit"] {
            background-color: #07d159;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #05a648;
        }

        /* .error-message {
            color: #ff0000;
            margin-bottom: 10px;
        } */
    </style>
</head>
<body>
    <h1>Modify Song</h1>

    <?php
include("includes/config.php");

if (isset($_GET["songid"])) {
    $songId = $_GET["songid"];

    // Retrieve the song details from the database
    $songQuery = "SELECT * FROM songs WHERE id = '$songId'";
    $songResult = $con->query($songQuery);

    if ($songResult->num_rows > 0) {
        $song = $songResult->fetch_assoc();

        // Display the song details for modification
        echo '<form method="POST" action="update-song.php">';
        echo '<input type="hidden" name="songid" value="' . $song["id"] . '">';
        echo 'Song Title: <input type="text" name="title" value="' . $song["title"] . '"><br>';
        echo 'Artist: <input type="text" name="artist" value="' . $song["artist"] . '"><br>';
        echo 'Album: <input type="text" name="album" value="' . $song["album"] . '"><br>';
        echo 'Genre: <input type="text" name="genre" value="' . $song["genre"] . '"><br>';
        echo '<button type="submit" name="updateSong">Update Song</button>';
        echo '</form>';
    } else {
        echo "Song not found.";
    }
}
?>

    <!-- <form method="POST" action="update-song.php">
        <input type="hidden" name="songid" value="<?php echo $song['id']; ?>">
        <label>Song Title:</label>
        <input type="text" name="title" value="<?php echo $song['title']; ?>">
        <label>Artist:</label>
        <input type="text" name="artist" value="<?php echo $song['artist']; ?>">
        <label>Album:</label>
        <input type="text" name="album" value="<?php echo $song['album']; ?>">
        <label>Genre:</label>
        <input type="text" name="genre" value="<?php echo $song['genre']; ?>">
        <button type="submit" name="updateSong">Update Song</button>
    </form> -->
</body>
</html>

