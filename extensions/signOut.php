<?php
	session_start();
	$_SESSION["userID"] = NULL;
	$_SESSION["userType"] = NULL;
	header("Location: ../signIn.php");
?>