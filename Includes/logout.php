<?php 
session_start();
unset($_SESSION['name']);
unset($_SESSION['user']);
unset($_SESSION['id']);
unset($_SESSION['error']);
	header ("location:../admin.php");
	exit;
	
?>