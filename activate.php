<?php
    include("connect.php");
    if(isset($_GET['tok'])){
        $token = $_GET['tok'];
        
        $update_db = "UPDATE `user_db` set `status`='active' where `token` = '$token' ";

        if(mysqli_query($link,$update_db)){
            if(isset($_SESSION['msg'])){
                $_SESSION['msg'] = "Account sucessful created ";
            }else{
                $_SESSION['msg'] = "You are Logged Out ";

            }
        }else{
            // $_SESSION['msg'] = "Verify the email to login";
            echo "";
        }


        echo "<script>window.location.href = 'http://localhost/practice/Note_Hub/';</script>";
    }

?>