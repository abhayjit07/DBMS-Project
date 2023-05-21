<?php
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");

	// $account = new Account($con);

	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	// function getInputValue($name) {
	// 	if(isset($_POST[$name])) {
	// 		echo $_POST[$name];
	// 	}
	// }

    $sql = "SELECT * FROM artists";
    $result = $con->query($sql);

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

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>";
        echo '<form method="POST" action="remove-artist.php">';
        echo '<input type="hidden" name="userId" value="' . $row["id"] . '">';
        echo '<button type="submit" name="removeUser">Remove Artist</button>';
        echo '</form>';
        echo "</td>";
        echo "</tr>";
    }
    

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
</html>