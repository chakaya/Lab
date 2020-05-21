<?php
  session_start();
  if(!isset($_SESSION['username'])){
  	header("Location:login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Title Goes Here</title>
	<script type="text/javascript" src="validate.js"></script>
	<link rel="stylesheet" type="text/css" href="validate.css">
</head>
<body>
	<p>THIS IS A PRIVATE PAGE</p>
	<P>WE WANT TO PROTECT IT</P>
	<P><a href="logout.php">Logout</a></P>
</body>
</html>