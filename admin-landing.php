<!-- <?php
	// include("includes/config.php");
	// include("includes/classes/Account.php");
	// include("includes/classes/Constants.php");

	// include("includes/handlers/register-handler.php");
	// include("includes/handlers/login-handler.php");

    // $sql = "SELECT * FROM users WHERE firstname <> 'admin'";
    // $result = $con->query($sql);

    // if ($result->num_rows > 0) {
    //     echo "<table>";
    //     echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";
        
    //     while ($row = $result->fetch_assoc()) {
    //         echo "<tr>";
    //         echo "<td>" . $row["id"] . "</td>";
    //         echo "<td>" . $row["email"] . "</td>";
    //         echo "<td>" . $row["username"] . "</td>";


    //         echo "</tr>";
    //     }
        
    //     echo "</table>";
    // } else {
    //     echo "No users found.";
    // }

    // while ($row = $result->fetch_assoc()) {
    //     echo "<tr>";
    //     echo "<td>" . $row["id"] . "</td>";
    //     echo "<td>" . $row["email"] . "</td>";
    //     echo "<td>" . $row["username"] . "</td>";
    //     echo "<td>";
    //     echo '<form method="POST" action="remove-user.php">';
    //     echo '<input type="hidden" name="userId" value="' . $row["id"] . '">';
    //     echo '<button type="submit" name="removeUser">Remove User</button>';
    //     echo '</form>';
    //     echo "</td>";
    //     echo "</tr>";
    // }
    

?>

<html>
<head>
    <title>Admin Page</title>

    <link rel="stylesheet" href="admin/adminstyles.css">
</head>
<body>


    <h1>HI ADMIN</h1>

    <button>Add User</button>
    <button>Remove User</button>

    
</body>
</html> -->


<?php
include("includes/config.php");
include("includes/classes/Account.php");
include("includes/classes/Constants.php");

include("includes/handlers/register-handler.php");
include("includes/handlers/login-handler.php");

$sql = "SELECT * FROM users WHERE firstname <> 'admin'";
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
            <th>Email</th>
            <th>Username</th>
            <th>Password</th>
            <th>Sign Up Date</th>
            <th>Action</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["username"] . "</td>";
            echo "<td>" . $row["password"] . "</td>";
            echo "<td>" . $row["signUpDate"] . "</td>";
            echo "<td>";
            echo '<form method="POST" action="remove-user.php">';
            echo '<input type="hidden" name="username" value="' . $row["username"] . '">';
            echo '<button type="submit" name="removeUser">Remove User</button>';
            echo '</form>';
            echo "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>