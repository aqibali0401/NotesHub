<?php
include("C:/xampp/htdocs/practice/Note_Hub/connect.php");
// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// $mail = new PHPMailer(true);

// $output = '';


if (isset($_POST['submit'])) {
  echo "hello";
  $name =mysqli_real_escape_string($link,$_POST['name']);
  $email =mysqli_real_escape_string($link,$_POST['email']);
  $p_select =mysqli_real_escape_string($link,$_POST['p_select']);


  $message =mysqli_real_escape_string($link,$_POST['message']);
  if (isset($_POST['fd_name'])) {
    $fd_name =mysqli_real_escape_string($link,$_POST['fd_name']);
  } else {
    $fd_name = 'none';
  }
  if (isset($_POST['sd_name'])) {
    $sd_name =mysqli_real_escape_string($link,$_POST['sd_name']);
  } else {
    $sd_name = 'none';
  }

  $query = mysqli_query($link, "INSERT INTO `contact_us` (`name`,`email`,`p_select`,`fd_select`,`sd_select`,`message`) VALUES ('" . $name . "','" . $email . "','" . $p_select . "','" . $fd_name . "','" . $sd_name . "','" . $message . "')");

  // if (mysqli_query($link, $sql)) {
  //   echo "sucess";
  // } else {
  //   echo "fail";
  // }
  // try {
  // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  // $mail->isSMTP();                                            //Send using SMTP
  // $mail->Host       = 'smtp.hostinger.in';                     //Set the SMTP server to send through
  // $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
  // $mail->Username   = 'admin@notes-hub.xyz';                     //SMTP username
  // $mail->Password   = '9876543210@An';                               //SMTP password
  // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
  // $mail->Port       = 587;

  // // Email ID from which you want to send the email
  // $mail->setFrom('admin@notes-hub.xyz', 'NOTES HUB');
  // $mail->addAddress('admin@notes-hub.xyz', 'NOTES HUB');

  // $mail->isHTML(true);
  // $mail->Subject = 'Form Submission';
  // $mail->Body = "<h3>Name : $name <br>Email : $email <br>Message : $message</h3>";
  // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

  // $mail->send();
  // $output = '<div class="alert alert-success">
  //             <h5>Thankyou! for contacting us, We\'ll get back to you soon!</h5>
  //           </div>';
  // } catch (Exception $e) {
  //   $output = '<div class="alert alert-danger">
  //               <h5>' . $e->getMessage() . '</h5>
  //             </div>';
  // }
}

?>

<style>
  html,
  body {
    height: 100%;
  }

  .form-wrapper {
    background: #acb6e5;
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #86fde8, #acb6e5);
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #86fde8, #acb6e5);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


    /* height: 130% !important; */
    height: 1100px;
    position: relative;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
  }

  .form-wrapper .form-control-lg,
  .form-wrapper .btn-lg {
    border-radius: .9rem;
  }

  .form-wrapper h1 {
    color: #3d3d3d;
  }

  .form-wrapper .form-page-center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
  }

  @media (min-width: 768px) {
    .form-wrapper form .form-group.w-md-25 {
      width: 20%;
    }

    .form-wrapper {
      margin: 79px 0px 0px 0px;
      /* padding: 200px 0px; */
    }

  }
</style>
<div class="form-wrapper">
  <div class="container form-page-center">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <h1 class="pb-5 text-center">We Are Here To Help.</h1>

        <!-- <p>We'll get back to you in about 6 hours. Pinky promise!</p> -->
        <form method="POST">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Enter your Name" name="name" required>
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <input type="text" class="form-control form-control-lg" placeholder="Email Address" name="email" required>
              </div>
            </div>
            <div class="col-md-12" style="margin-top: 50px;">
              <h4>What do you need help with?</h4>
              <h5>This helps make sure you get the right answer fast.</h5>
              <div class="form-group" style="margin-top: 20px; text-align-last: center;">
                <select class="form-control-lg" style="text-indent: 65px; font-weight: light;" id="contact_sel" name="p_select">
                  <option disabled selected>Please Select one*</option>
                  <option value="def123">I have seen same document on multiple uploads</option>
                  <option value="1">I want to request a feature</option>
                  <option value="2">I think something is broken</option>
                  <option value="3">I want to help launch NotesHub in my university/course</option>
                  <option value="4">I want to work with NotesHub</option>
                  <option value="5">I cannot access my account</option>
                  <option value="6">Other problem</option>
                </select>
              </div>
            </div>
            <br>
            <br>
            <!-- seen duplicate elements  -->
            <div class="same" id="doc_hide">
              <h3 style="margin-bottom: 20px;">Enter name of both documents </h3>
              
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>First document name </h5>
                      <input type="text" class="form-control form-control-lg" id="fname" placeholder="eg   notes 1" name="fd_name" >
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <h5>Second document name</h5>
                      <input type="text" class="form-control form-control-lg" id="lname" placeholder="eg  notes 2" name="sd_name" >
                    </div>
                  </div>
                  
                </div>
              
            </div>

            <!-- seen duplicate elements  -->

            <div class="col-md-12" style="margin-top: 50px;">
              <h4>What’s your question, comment, or issue?</h4>
              <h6>Share all the details. The more we know, the better we can help you.</h6>
              <div class="form-group" style="margin-top: 20px;">
                <textarea class="form-control form-control-lg" name="message" id="desx" cols="10" rows="5" placeholder="Enter any message "></textarea>
              </div>
            </div>

            
          </div>
          <div class="col-lg-12 mb-3">
              <button type="submit" name="submit" class="btn btn-success btn-block btn-lg text-uppercase">Submit this support request</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>