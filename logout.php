<?php 
require_once("connection.php");
	session_start();
	if(isset($_SESSION['user']['user_id'])){
	// echo $user_id;
    $_SESSION['user'];
    $query = "UPDATE users SET is_online= 0 WHERE user_id=".$_SESSION["user"]["user_id"];
    $result = mysqli_query($connection,$query);
	}
	if(isset($_SESSION['user']))
	{
				
		session_destroy();
		header("location:index.php?msg=Logout Successfull&class=green");
	}

?>