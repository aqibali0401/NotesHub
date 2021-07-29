<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="css/myadd/top.css">
    <link rel="stylesheet" href="css/myadd/mystyle.css">
    <link rel="icon" href="img/fabicon.png" type="image/png">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet"
        id="bootstrap-css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!-- search select -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.min.css"> -->
    <link rel="stylesheet" href="css/search_bar.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.5.1/chosen.jquery.min.js"></script>
    <!-- search select -->
    <!-- drag and drop -->
    <link rel="stylesheet" href="css/drag_style.css">
    <!-- drag and drop -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <title>Notes Hub</title>

</head>

<body style="margin-top: 80px;">

    <!--================Header Menu Area =================-->
    <header class="header_area">
        <div class="main_menu" style="background-color: #1F2338;">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">

                    <a class="navbar-brand logo_h nh_logo" href="?page=hom"><img src="img/logo.png" alt=""
                            style="max-width: 70%;"></a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>


                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="?page=hom">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="?page=dash">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="?page=upl">Uploads</a></li>

                            <li class="nav-item"><a class="nav-link" href="?page=prof">Profile</a></li>
                            <li class="nav-item"><a class="nav-link" href="?page=top_con">Top Contributors</a></li>
                            <?php if($session_id){   ?>
                            <li class="nav-item"><a class="nav-link" href="?page=contact">Contact</a></li>
                            <?php } else { ?>
                            <li class="nav-item"><a class="nav-link" href="?page_bl=contact">Contact</a></li>
                            <?php } ?>
                            <li class="nav-link"
                                style="border: 2px solid white; border-radius: 5px; background-color: white; padding: 6px 12px;">
                                <?php if(!$session_id){ ?>
                                <a data-bs-toggle="modal" id="signout" data-bs-target="#exampleModal"
                                    style="font-size: 17px; font-weight: bold;" href="">Sign Up / Login</a>
                                <?php } else { ?>
                                <a id="Log_out" style="font-size: 17px; font-weight: bold;" href="?function=logout">Log
                                    Out</a>
                                <?php } ?>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <?php
    $query = "SELECT * FROM `user_db` WHERE `id` = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);
    $user = mysqli_fetch_assoc($result);   
    ?>