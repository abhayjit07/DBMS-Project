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




?>

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
                    <th class="heading">Artist</th>
                    <th class="heading">Remove</th>
                </tr>

                <?php
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
            </table>
        </div>



    </div>





</body>

</html>
