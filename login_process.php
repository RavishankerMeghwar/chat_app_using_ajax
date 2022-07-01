<?php
session_start();
require_once('connection.php');
if(isset($_REQUEST['login'])){
    extract($_REQUEST);
    $query = "SELECT * FROM users where email='".$email."' AND password= '".$password."'";
    $result = mysqli_query($connection,$query);
    if($result->num_rows){
        $user= mysqli_fetch_assoc($result);
        $_SESSION['user']=$user;
        $query = "UPDATE users SET is_online= 1 WHERE user_id=".$_SESSION["user"]["user_id"];
        $result = mysqli_query($connection,$query);
        header("location:chat_app.php");
    }
    else
    {
        header("location:index.php?msg=Invalid Email/Password");
    }
}  
?>