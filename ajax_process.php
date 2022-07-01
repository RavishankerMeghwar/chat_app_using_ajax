<?php 
session_start();
require_once('connection.php');
if(isset($_REQUEST['action']) && $_REQUEST['action'] == "add_message")
{
    // date_default_timezone_get('Asia/Karachi');
    
    $query = "INSERT INTO chat ( message, added_on, user_id) VALUES('".$_REQUEST['enter_message']."','".time()."','".$_SESSION['user']['user_id']."')";
    $result = mysqli_query($connection,$query);
}
elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == "show_message")
{?>
    <head>
        <style>
            p{
                background-color: gray;
                border-radius: 10px;
                margin-right: 100px;
                font-size: 20px;
                overflow-y: auto;
            }
            img{
                width: 30px;
                border-radius: 50%;
            }
        </style>
    </head>
    <?php
        $query = "SELECT * FROM users,chat WHERE users.user_id = chat.user_id";
        $result = mysqli_query($connection,$query);
        if($result->num_rows)
        {
            date_default_timezone_set('Asia/Karachi');
             ?>
           <?php
            while($message= mysqli_fetch_assoc($result))
            {
            if($message['user_id'] == $_SESSION['user']['user_id'])
            {?>
              <p style="clear: both; float: right; display: flex;" > <span> <img src="<?php echo $_SESSION['user']['image_path'] ?>" alt=""></span> <span style="color: greenyellow;"> <?php echo $message['first_name']." ".$message['last_name'].' '; ?> </span> <span style="color:white" > <?php echo $message['message'] ?> </span>  <span style="float:right"> <?php echo date('h:i A',$message['added_on']) ?> </span> </p>          
        <?php }else {?>
            <p style="clear: both; float: left; display: flex;"> <span> <img src="<?php echo $_SESSION['user']['image_path'] ?>" alt=""></span> <span style="color: greenyellow;"> <?php echo $message['first_name']." ".$message['last_name']; ?> </span> <span style="color:white" > <?php echo $message['message'] ?> </span>  <span style="float:right"> <?php echo date('h:i A',$message['added_on']) ?> </span> </p>             
        <?php

        }} ?>
    <?php
         }
}      
elseif(isset($_REQUEST['action']) && $_REQUEST['action'] == "show_users")
{?>
    <head>
        <style>
            p{
                background-color: gray;
                border-radius: 10px;
                margin-right: 100px;
                font-size: 20px;
                overflow-y: auto;
            }
            img{
                width: 30px;
                border-radius: 50%;
            }
        </style>
    </head>
    <?php
        $query = "SELECT * FROM users where user_id != ".$_SESSION['user']['user_id'];
        $result = mysqli_query($connection,$query);
        if($result->num_rows)
        {
             ?>
           <?php
            while($user= mysqli_fetch_assoc($result))
            {?>
             <div style="display:flex;">
             <img src="<?= $user['image_path'] ?>" alt="">
             <p style="margin:15px;"> <?= $user['first_name']." ".$user['last_name'] ?></p>
             <span style="color: <?php echo $user['is_online']?"green":"red"; ?>;margin-top:20px;" >*</span>
             </div>       
        <?php } ?>
    <?php
         }
}      
        
?>
