<!DOCTYPE html>
<html>
<head>
    <title>Modify Genre</title>
    <style>

        body {
            font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
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

button[type="submit"] {
    background-color: #07d159;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
    display: block;
    margin: 0 auto;
}

button[type="submit"]:hover {
    background-color: #05a648;
}

.goback-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #6CA6CD;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        .goback-button:hover {
            background-color: #4A708B;
        }

    </style>
</head>
<body>
    <h1>Modify Genre</h1>

    <?php
include("includes/config.php");

if (isset($_GET["songid"])) {
    $songId = $_GET["songid"];

    $songQuery = "SELECT * FROM genres WHERE id = '$songId'";
    $songResult = $con->query($songQuery);

    if ($songResult->num_rows > 0) {
        $song = $songResult->fetch_assoc();
        echo '<form method="POST" action="update-genre.php">';
        echo '<input type="hidden" name="id" value="' . $song["id"] . '">'; 
        echo 'Genre ID: ' . $song["id"] . '<br><br><br>';
        echo 'Genre Title: <input type="text" name="name" value="' . $song["name"] . '"><br>';
        echo '<button type="submit" name="updateSong">Update Genre</button>';
        echo '</form>';
    } else {
        echo "Genre not found.";
    }
}
?>

<button class="goback-button" onclick="window.location.href = 'remove-genre.php';">Go back</button>

</body>
</html>

