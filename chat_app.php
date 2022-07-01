<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat App</title>
    <style>
        #show_message{
            margin-top: -20px;
            width: 620px;
            height: 400px;
            border: 1PX solid black;
            background-color: lightgray;
            overflow-y: auto;
        }
        #show_users{
            margin-top: -20px;
            width: 200px;
            height: 400px;
            border: 1PX solid black;
            overflow-y: auto;
        }
        .current_user{
            width: 50%;
            /* margin-top: 1px; */
            background-color: teal;
            color: white;
        }
        .chat_area{
            width: 90%;
            border: 2px solid teal;
            margin-top: 20px;
            height: 100px;
        }
        table{
            overflow-y: auto;
        }
    </style>
</head>
<body>
    
    <h2 class="current_user"><span> <img style="width: 60px; border-radius:50%; height:60px" src="<?php echo $_SESSION['user']['image_path'] ?>" alt=""></span><?php echo $_SESSION['user']['first_name']." ".$_SESSION['user']['last_name']; ?> <span> <a  style="color: red; float:right; margin-top:30px" href="logout.php"> Logout</a> </span> </h2>
        <table cellspacing='0' cellpadding='0'>
            <tr>         
                <td class="msg">             
                    <div id="show_message"></div>                  
                </td> 
                <td class="user" > 
                   
                <div id="show_users"></div>
                </td>
                </tr>
                <tr>
                    <td>
                        <input style="width: 80%; height:30px; border: 2px solid teal; border-radius:20px" type="text" id="enter_message">
                        <button  style="width: 80px; height:34px; background-color: teal; color:white; font-weight:bolder;" onclick="add_message()
                         ">Send</button>
                    </td>
                </tr>
        </table>
    </center>
    <script>
        // var enter_message = document.getElementById("enter_message").value="";
        var set_interval= setInterval(show_message, 1000)
        var set_interval= setInterval(show_users, 1000)
        
        show_message()
        show_users()
        function add_message(){
            var enter_message = document.getElementById('enter_message').value;
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						
                            show_message();
                            clear();
                            
					}
				}
				ajax_object.open("POST","ajax_process.php");
                ajax_object.setRequestHeader("Content-type","application/x-www-form-urlencoded");
				ajax_object.send("action=add_message&enter_message="+enter_message);
        }
        function clear()
        {
            document.getElementById("enter_message").value = "";
        }
        function show_message(){
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"show_message").innerHTML = ajax_object.responseText;
                            // show_message()
					}
				}
				ajax_object.open("GET","ajax_process.php?action=show_message");
				ajax_object.send();
        }
        function show_users(){
            var ajax_object = null;
            if(window.XMLHttpRequest){
					ajax_object = new XMLHttpRequest();
				}
				else{
					ajax_object = new ActiveXObject("Microsoft.XMLHTTP");
				}
				ajax_object.onreadystatechange = function(){
					if(ajax_object.readyState == 4 && ajax_object.status == 200){
						document.getElementById(
							"show_users").innerHTML = ajax_object.responseText;
                            // show_message()
					}
				}
				ajax_object.open("GET","ajax_process.php?action=show_users");
				ajax_object.send();
        }
        
    </script>
</body>
</html>