<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit();
}
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="indexstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="indexstlye.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Beadando</h1>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
        <a href="comments.php">Comments</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2>Home Page</h2>
			<p>Welcome , <?=$_SESSION['name']?>!</p>

		</div>
	</body>
</html>
