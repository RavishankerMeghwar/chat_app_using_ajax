<?php 
require_once('connection.php');
if (isset($_REQUEST['register'])) {
    extract($_REQUEST);
    $files = $_FILES['image_path']; 
    $dir = "images";
    if (!is_dir($dir)) 
    {
    	echo "Directory Created";
    	mkdir($dir);
    }
    $file_name = $files['name'];
        $file_tmp_name = $files['tmp_name'];
        // $path_extension = pathinfo($file_name,PATHINFO_EXTENSION);
    $path = $dir."/".$file_name;
   if(move_uploaded_file($file_tmp_name,$path))
	{    
    $query = "INSERT INTO users (first_name,last_name,email,password,image_path) VALUES('".$_REQUEST['first_name']."','".$_REQUEST['last_name']."','".$_REQUEST['email']."','".$_REQUEST['password']."','".$path."')";
    $result = mysqli_query($connection,$query);
    }
    if($result)
    {
        header("location:index.php?msg=Created Account Successfully") ;
    }
   else{
         header("location:create_account.php?msg=Created Account Successfully") ;
   }    
    ?>
    <?php
}

?>