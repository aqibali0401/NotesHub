<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';


if (isset($_POST['create_acc'])) {
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $email = mysqli_real_escape_string($link, $_POST['email']);
    $cours = mysqli_real_escape_string($link, $_POST['course']);
    $branch = mysqli_real_escape_string($link, $_POST['branch']);
    $password = mysqli_real_escape_string($link, $_POST['pass']);
    $repass = mysqli_real_escape_string($link, $_POST['rpass']);


    $token = bin2hex(random_bytes(10));

    if ($_POST['course'] == "") {
        echo "<script> alert('Please select your stream'); </script>";
    } else {
        $query1 = "SELECT * FROM `user_db` WHERE `email` = '" . $email . "' LIMIT 1";
        $res = mysqli_query($link, $query1);
        $fetch = mysqli_fetch_assoc($res);
        if (!$fetch) {
            if ($password == $repass) {
                $encrept_pass = md5(md5($name . $password) . $email);
                $query = "INSERT INTO `user_db` (`name`,`email`,`stream`,`password`,`branch`,`token`,`status`) VALUES (
                        '" . $name . "','" . $email . "','" . $cours . "','" . $encrept_pass . "','" . $branch . "','" . $token . "','inactive')";
                if (mysqli_query($link, $query)) {
                    $_SESSION['msg'] = mysqli_insert_id($link);

                    $body = "Hi, $name. Click hear to activate your account http://localhost/practice/Note_Hub/activate.php?tok=$token";

                    $mail = new PHPMailer(true);

                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.hostinger.in';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'admin@notes-hub.xyz';                     //SMTP username
                    $mail->Password   = '9876543210@An';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                    //Recipients
                    $mail->setFrom('admin@notes-hub.xyz', 'NOTES HUB');
                    $mail->addAddress($email);     //Add a recipient
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Active your account';
                    $mail->Body    = $body;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $_SESSION['msg'] = "Check your mail to activate your account $name";
                } else {
                    echo "<script> alert('Somthing went wrong'); </script>";
                }
            } else {
                echo "<script> alert('password not'); </script>";
            }
        } else {
            echo "<script> alert('The Email is alrady created'); </script>";
        }
    }
}

if (isset($_POST['button'])) {
    $email = mysqli_real_escape_string($link, $_POST['emaila']);
    $password = mysqli_real_escape_string($link, $_POST['passa']);

    if ($email == "") {
        echo "<script> alert('Please Enter your Email'); </script>";
    } elseif ($password == "") {
        echo "<script> alert('Please Enter your Password'); </script>";
    } else {
        $query1 = "SELECT * FROM `user_db` WHERE `email` = '" . $email . "' and `status` = 'active' ";
        $res = mysqli_query($link, $query1);
        $fetch = mysqli_fetch_assoc($res);
        if ($fetch['password'] == md5(md5($fetch['name'] . $password) . $email)) {

            $_SESSION['id'] = $fetch['id'];
            echo "<script>window.location.href = 'http://localhost/practice/Note_Hub/';</script>";
        } else {
            echo " <script> alert('Enter correct username/password'); </script>";
        }
    }
}
if ($_SESSION) {
    $doc_like_count = mysqli_query($link, "SELECT `likes` FROM `all_notes` where `user_id` = '" .mysqli_real_escape_string($link,$_SESSION['id']). "' ");
    $total_doc_likes = 0;
    
    if (mysqli_num_rows($doc_like_count) > 0) {
        while ($total_likes = mysqli_fetch_assoc($doc_like_count)) {
            $x = $total_likes['likes'];
            $total_doc_likes = $total_doc_likes +$x;
        }
    }
    $update_doc_like_count = mysqli_query($link, "UPDATE `user_db` SET `total_likes` = '.$total_doc_likes.' WHERE `id`='" .mysqli_real_escape_string($link,$_SESSION['id']). "' LIMIT 1");
}


?>

<!-- ================ start footer Area ================= -->

<style>
    #scrollUp,
    #back-top {
        height: 40px;
        width: 30px;
        right: 10px;
        bottom: 10px;
        position: fixed;
        font-size: 35px;
        text-align: center;
        border-radius: 60%;
    }
</style>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" style="margin-top: 15px; align-items: flex-end;" aria-label="Close"></button> -->

            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel">Sign Up</h3>
            </div>
            <div class="modal-body">

                <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
                <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

                <!-- YEAH MAINE ADD KIYA HAI -->
                <link href="http://fonts.googleapis.com/css?family=Nunito:400,600,800&display=swap" rel="stylesheet">
                <!------ Include the above in your HEAD tag ---------->

                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

                <div class="container">
                    <div class="card bg-light">
                        <article class="card-body mx-auto" style="max-width: 400px;">
                            <h4 class="card-title mt-3 text-center" id="craccount">Create Account</h4>
                            <!-- <p>
                                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-google"></i>   Login via
                                    Google</a>
                                <a href="" class="btn btn-block btn-twitter"> <i class="fab fa-linkedin"></i>   Login
                                    via Linkdin</a>
                            </p>
                            <p class="divider-text">
                                <span class="bg-light">OR</span>
                            </p> -->
                            <div>
                                <p class="bg-success text-white px-4">
                                    <?php
                                    if (isset($_SESSION['msg'])) {
                                        echo $_SESSION['msg'];
                                    } else {
                                        // echo $_SESSION['msg']="You are logged Out. Please login again.";
                                        echo "";
                                    }
                                    ?>
                                </p>
                            </div>
                            <!-- for signup -->
                            <form method="POST" id="activeSignup" name="activeSignup" enctype="multipart/form-data">
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                                    </div>
                                    <input name="name" class="form-control" placeholder="Full name" type="text">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="email" class="form-control" placeholder="Email address" type="email">
                                </div>
                                <div class="form-group input-group">
                                    <div class class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select id="course" class="form-control" style="text-align-last: center; font-weight: light;" name="course">
                                        <option disabled selected>Select Stream</option>
                                        <option value="B.Tech">B.TECH</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                </div>
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                                    </div>
                                    <select id="branch_dt_select1" class="form-control" style="text-align-last: center; font-weight: light;" name="branch">
                                        <option value="branch" disabled selected>Branch</option>
                                        <option value="CSE">Computer Science & Engineering</option>
                                        <option value="ME">Mechanical Engineering</option>
                                        <option value="EE">Electrical Engineering</option>
                                        <option value="ECE">Electronics & Communication Engineering</option>
                                        <option value="CE">Civil Engineering</option>
                                    </select>
                                    <select id="branch_dt_select2" class="form-control" style="text-align-last: center; font-weight: light;" name="branch">
                                        <option value="branch" disabled selected>Branch</option>
                                        <option value="BBA_gen">BBA-I(General)</option>
                                        <option value="BBA_ind">BBA-II(Ind.)</option>
                                    </select>
                                </div>
                                <!-- form-group end.// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="pass" class="form-control" placeholder="Create password" type="password" minlength="8">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input name="rpass" class="form-control" placeholder="Repeat password" type="password" minlength="8">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <button name="create_acc" type="submit" class="btn btn-primary btn-block"> Create
                                        Account </button>
                                </div> <!-- form-group//?page=login -->
                                <p class="text-center">Already have an account? <a href="#" id="loginbt" name="loginbt">Log In</a> </p>
                            </form>
                            <!-- for login -->
                            <form method="POST" id="activeLogin" name="activeLogin">
                                <div class="form-group input-group"></div> <!-- form-group// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                                    </div>
                                    <input name="emaila" class="form-control" placeholder="Email address" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group input-group"></div>
                                <!-- form-group// -->
                                <!-- form-group end.// -->
                                <div class="form-group input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                                    </div>
                                    <input class="form-control" placeholder="Enter your password" type="password" name="passa">
                                </div> <!-- form-group// -->

                                <div class="form-group">
                                    <button type="submit" id="login_btn" class="btn btn-primary btn-block" name="button"> Log in </button>
                                    <p class="text-center">Don't have an account? <a href="#" id="Signupbt" name="Signupbt">Signup</a> </p>
                                </div>
                            </form>
                        </article>
                    </div> <!-- card.// -->
                </div>
            </div>
        </div>
    </div>
</div>

<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-arrow-up"></i></a>
</div>
<!-- ================ End footer Area ================= -->
<script>
    $('#back-top a').on("click", function() {
        $('body,html').animate({
            scrollTop: 0
        }, 100);
        return false;
    });
    $(document).ready(function() {
        $("#course_sel").change(function() {
            $("#doc_hide").hide();
            if ($("#course_sel").val() == "def") {
                $("#doc_hide").show();
            }
        }).change();
    });
    $(document).ready(function() {
        $("#contact_sel").change(function() {
            $("#doc_hide").hide();
            if ($("#contact_sel").val() == "def123") {
                $("#doc_hide").show();
            }
        }).change();
    });
    //   ------------------------
    $(document).ready(function() {
        $("#table2").hide();
        $("#monthly-1").click(function() {
            $("#monthly-1").change(function() {
                $("#table1").show();
                $("#table2").hide();
            }).change();
        });
        $("#yearly-1").click(function() {
            $("#yearly-1").change(function() {
                $("#table1").hide();
                $("#table2").show();
            }).change();
        });
    });
</script>
<script src="js/top.js"></script>
<script src="js/logsign.js"></script>
<script src="js/branch.js"></script>
<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/5ffc75fc0e.js" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
</script>


</body>


</html>