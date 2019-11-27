<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: home.php');
	exit();
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	die ('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT password, username FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profiles</title>
		<link href="indexstyle.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="indexstlye.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Beadando</h1>
        <a href="home.php">Home</a>
			</div>
		</nav>
		<div class="content">
			<h2></h2>
			<p>username: <?=$_SESSION['name']?>!</p>
			<p>password: <?=$password?></p>
		</div>
	</body>
</html>
