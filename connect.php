<?php

if (!isset($_SESSION)) {
  session_start();
}



$session_id = isset($_SESSION['id']) ? $_SESSION['id'] : '';
$function = isset($_GET['function']) ? $_GET['function'] : '';
$pages = isset($_GET['page']) ? $_GET['page'] : '';
$dash = isset($_GET['da']) ? $_GET['da'] : '';
$lik = isset($_GET['li']) ? $_GET['li'] : '';
$pages_bl = isset($_GET['page_bl']) ? $_GET['page_bl'] : '';

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "notes_hub";

// Create connection
$link = mysqli_connect($servername, $username, $password, $database_name);

// Check connection
if (mysqli_connect_errno()) {
  print_r(mysqli_connect_error());
  echo "connection fail";
  exit();
}


if ($function == "logout") {

  session_unset();
  header("Location: http://localhost/practice/Note_Hub/");
  exit();
}
