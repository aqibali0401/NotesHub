<?php

include("connect.php");
if ($session_id) {
    include("after_login/header.php");
    if ($pages == "hom") {
        include("befor_login/home.php");
    } else if ($pages == "upl") {
        include("after_login/upload.php");
    } else if ($pages == "prof") {
        include("after_login/profile.php");
    } else if ($pages == "dash") {
        include("after_login/dashboard.php");
    } else if ($pages == "top_con") {
        include("befor_login/top.php");
    } else if ($pages == "contact") {
        include("befor_login/contact.php");
    } else {
        include("befor_login/home.php");
    }
    include("befor_login/footer.php");
} else if ($pages_bl == "contact") {
    include("befor_login/header.php");
    include("befor_login/contact.php");
    include("befor_login/footer.php");
} else if ($pages_bl == "home") {
    include("befor_login/header.php");
    include("befor_login/home.php");
    include("befor_login/footer.php");
} else if ($pages_bl == "top") {
    include("befor_login/header.php");
    include("befor_login/top.php");
    include("befor_login/footer.php");
}else if($pages_bl=="dashbord"){
    include("befor_login/header.php");
    include("after_login/dashboard.php");
    include("befor_login/footer.php");
} 
else {
    include("befor_login/header.php");
    include("befor_login/home.php");
    include("befor_login/footer.php");
}
