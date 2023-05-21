<?php
if(isset($_POST['loginButton'])) {
	//Login button was pressed
	$username = $_POST['loginUsername'];
	$password = $_POST['loginPassword'];

	$result = $account->login($username, $password);

	if($result == true) {
		$_SESSION['userLoggedIn'] = $username;
		if ($username === 'admin' && $password === 'Admin123') {
			header("Location: admin-landing.php");
		} else {
			header("Location: index.php");
		}
	}
}
?>
