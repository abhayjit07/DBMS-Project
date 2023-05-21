
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
    <link rel="stylesheet" href="admin/adminstyles.css">
</head>
<body>
    <h1>ADMIN</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Tile</th>
            <th>Username</th>
            <th>Password</th>
            <th>Sign Up Date</th>
            <th>Action</th>
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
            echo '<button type="submit" name="removeUser">Remove Song!</button>';
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>