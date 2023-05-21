<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

$sql = "SELECT * FROM songs";
$result = $con->query($sql);
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Page</title>    
    <style> 
      body {
            font-family: "Helvetica Neue", "Helvetica", "Arial", sans-serif;
            margin: 0;
            padding: 0;
            background-color: #181818;
            font-size: 14px;
            min-width: 720px;
            color: #f2f2f2;
        }

        h1 {
            text-align: center;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table th,
        table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ccc;
        }

        table th {
            background-color: #f2f2f2;
        }

        form {
            display: inline-block;
        }

        button {
            background-color: #07d159;
            color: #fff;
            border: none;
            padding: 8px 16px;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #05a648;
        }

        .container {
            display: flex;
            justify-content: space-between;
        }

        .left-section {
            width: 15%;
            background-color: black;
            padding: 20px;
            min-height: 100vh;
        }

        .right-section {
            flex-grow: 1;
            padding: 20px;
        }

        .linkContainer {
            font-size: 14px;
            font-weight: 700;
            display: block;
            letter-spacing: 1px;
            position: relative;
        }

        .links {
            list-style: none;
            padding: 10px;
        }

        .links a {
            color: #f2f2f2;
            text-decoration: none;
        }

        .links a:hover {
            color: #07d159;
        }

        .heading {
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">

        <div class="left-section">
            <ul class="linkContainer">
                <li class="links"><a href="remove-son.php">Songs</a></li>
                <li class="links"><a href="admin-landing.php">Users</a></li>
                <li class="links"><a href="remove-art.php">Artists</a></li>
            </ul>
        </div>
        <div class="right-section">
            <h1>ADMIN</h1>
            <h2>Song Table</h2>
            <table>
                <tr>
                    <th class="heading">ID</th>
                    <th class="heading">Title</th>
                    <th class="heading">Artist</th>
                    <th class="heading">Album</th>
                    <th class="heading">Genre</th>
                    <th class="heading">Action</th>
                </tr>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["artist"] . "</td>";
                    echo "<td>" . $row["album"] . "</td>";
                    echo "<td>" . $row["genre"] . "</td>";
                    echo "<td>";
                    echo '<form method="POST" action="remove-songs.php">';
                    echo '<input type="hidden" name="id" value="' . $row["id"] . '">';
                    echo '<button type="submit" name="removeSong">Remove Song</button>';
                    echo '</form>';
                    echo "</td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </div>
</body>

</html>
