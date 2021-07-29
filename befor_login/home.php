<?php
if (isset($_POST['submit'])) {
    $doc_file_name = $_FILES['doc_file']['name'];
    $doc_file_location = $_FILES['doc_file']['tmp_name'];
    move_uploaded_file($doc_file_location, "temp_doc/" . $doc_file_name);
    header('Location: http://localhost/practice/Note_Hub/after_login/pdf_viewer.php?fn=' . $doc_file_name . '&pdf=temp');
}
?>


<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner d-flex ">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-6 col-xl-5 offset-xl-7">
                    <div class="banner_content" style="text-align: left;">
                        <span style="font-size: 80px; font-weight: bold;">N O T E S <br> H U B </span><br>
                        <span style="font-size: 20px;"> A study material sharing platform </span><br><br>

                        <select class="chosen" style="width:80%; height: 20px; ">
                            <option disabled selected>Select Your Subject</option>
                            <option>Chemistry</option>
                            <option>English</option>
                            <option>Mathematics-1 (Calculus and Linear Algebra)</option>
                            <option>Basic Electrical Engineering</option>
                            <option>Physics(Semiconductor Physics)</option>
                            <option>Mathematics-2 (Probability and Statistics)</option>
                            <option>Programming for Problem solving</option>
                            <option>Analog Electronic Circuits </option>
                            <option>Data Structures & Algorithms </option>
                            <option>Digital Electronics</option>
                            <option>Mathematics- III (Calculus and Ordinary Differential Equations)</option>
                            <option>Effective Technical Communication</option>
                            <option>IT Workshop(MATLAB)</option>
                            <option>Discrete Mathematics </option>
                            <option>Computer Organization & Architecture</option>
                            <option>Operating System</option>
                            <option>Design & Analysis of Algorithms </option>
                            <option>Organizational Behaviour/ Finance & Accounting</option>
                            <option>Environmental Sciences</option>
                            <option>Signals & Systems</option>
                            <option>Database Management Systems </option>
                            <option>Formal Languages & Automata</option>
                            <option>Object Oriented Programming </option>
                            <option>Economics for Engineers </option>
                            <option>Constitution of India</option>
                            <option>Universal Human Values</option>
                            <option>Compiler Design</option>
                            <option>Computer Networks </option>
                            <option>Data Analysis Using Python</option>
                            <option>Data Mining</option>
                            <option>Soft Computing</option>
                            <!---cse ke 7th or 8th sem k sub missing h--->
                            <option>Elements of Electronics Engg.</option>
                            <option>Basics of Mechanical Engg.</option>
                            <option>Physics-II </option>
                            <option>Interactive English</option>
                            <option>Fluid Mechanics</option>
                            <option>Thermodynamics </option>
                            <option>Manufacturing Processes</option>
                            <option>Numerical Methods</option>
                            <option>Mandatory Audit Course–I</option>
                            <option>Kinematics of Machines</option>
                            <option>Material Science and Engineering</option>
                            <option>IC Engines</option>
                            <option>Fluid Machines</option>
                            <option>Manufacturing Technology and Metrology</option>
                            <option>Advanced Strength of Materials</option>
                            <option>Mandatory Audit Course–II</option>
                            <option>Dynamics of Machines</option>
                            <option>Refrigeration and Air Conditioning</option>
                            <option>Industrial Engineering </option>
                            <option>Machine Design–I</option>
                            <option>Discipline Specific Elective Course-I</option>
                            <option>General Elective Course-I </option>
                            <option>Heat and Mass Transfer</option>
                            <option>Computer Aided Design</option>
                            <option>CAM and Automation</option>
                            <option>Machine Design–II</option>
                            <option>Discipline Specific Elective Course-II</option>
                            <option>General Elective Course-II </option>
                            <option>Discipline Specific Elective Course-III</option>
                            <option>Operations Research </option>
                            <option>Discipline Specific Elective Course-IV </option>
                            <option>Discipline Specific Elective Course-V</option>
                            <option>General Elective Course-III </option>
                            <option>ELECTRICAL CIRCUIT ANALYSIS</option>
                            <option>ELECTRICAL MACHINES-1</option>
                            <option>ENGINEERING MECHANICS</option>
                            <option>MANDATORY COURSE </option>
                            <option>DIGITAL ELECTRONICS</option>
                            <option>ELECTRICAL MACHINES-II</option>
                            <option>ELECTRO MAGNETIC FIELDS</option>
                            <option>MEASURMENT & INSTRUMENTATION</option>
                            <option>POWER SYSTEMS-I (Apparatus and Modelling)</option>
                            <option>POWER ELECTRONICS</option>
                            <option>CONTROL SYSTEMS</option>
                            <option>ANALOG & DIGITAL COMMUNICATION</option>
                            <option>PROGRAM ELECTIVE-I</option>
                            <option>OPEN ELECTIVE-I</option>
                            <option>DIGITAL SYSTEM DESIGN</option>
                            <option>DIGITAL SIGNAL PROCESSING</option>
                            <option>MICROPROCESSORS </option>
                            <option>PROGRAM ELECTIVE-II </option>
                            <option>PROGRAM ELECTIVE-III</option>
                            <option>OPEN ELECTIVE-II </option>
                            <option>DIGITAL SYSTEM DESIGN</option>
                            <option>DIGITAL SIGNAL PROCESSING </option>
                            <option>MICROPROCESSORS</option>
                            <!---civil ke sem 1 or 2 k b missing--->
                            <option>Basic Electronics</option>
                            <option>Energy Science & Engineering</option>
                            <option>Life Science </option>
                            <option>Introduction to Civil Engineering</option>
                            <option>Instrumentation & Sensor Technologies for Civil Engineering Applications
                            </option>
                            <option>Engineering Geology</option>
                            <option>Disaster Preparedness & Planning</option>
                            <option>Introduction to Fluid Mechanics</option>
                            <option>Introduction to Solid Mechanics</option>
                            <option>Surveying & Geomatics</option>
                            <option>Materials, Testing & Evaluation</option>
                            <option>Mechanical Engineering</option>
                            <option>Mechanics of Materials</option>
                            <option>Hydraulic Engineering</option>
                            <option>Structural Engineering</option>
                            <option>Geotechnical Engineering</option>
                            <option>Hydrology & Water Resources Engineering</option>
                            <option>Environmental Engineering</option>
                            <option>Transportation Engineering</option>
                            <option>Audit Course-1: Environment Science</option>
                            <option>Construction Engineering & Management</option>
                            <option>Engineering Economics,Estimation & Costing</option>
                            <option>Open Elective-II Sugested: Metro Systems & Engineering</option>
                            <option>Civil Engineering - Societal & Global Impact</option>
                            <option>Business Organization</option>
                            <option>Business Mathematics</option>
                            <option>Computer Fundamentals</option>
                            <option>Financial Accounting</option>
                            <option>Presentation & Communication Skills-I</option>
                            <option>Micro economics for Business Decisions</option>
                            <option>Management Process & Organizational Behaviour</option>
                            <option>Macro economic Analysis and Policy</option>
                            <option>Company Accounts</option>
                            <option>Computer Applications in Management</option>
                            <option>Presentation & Communication Skills-II</option>
                            <option>Business Statistics</option>
                            <option>Cost and Management Accounting</option>
                            <option>Marketing Management</option>
                            <option>Capital Markets</option>
                            <option>Introduction to Information Technology</option>
                            <option>Indian Business Environment</option>
                            <option>Mandatory Audit Course(MAC)</option>
                            <option>Financial Management</option>
                            <option>Business Research Methods</option>
                            <option>Data Base Management</option>
                            <option>Business Law</option>
                            <option>Production and Materials Management</option>
                            <option>Company Law</option>
                            <option>Computer Networking & Internet</option>
                            <option>Consumer Behaviour</option>
                            <option>Cyber Security</option>
                            <option>Open Elective Course</option>
                            <!-- <option>Training Report(sem_5)</option> -->
                            <option>Income Tax</option>
                            <option>System Analysis & Design</option>
                            <option>Foundation of International Business</option>
                            <option>E-commerce</option>
                            <option>Consumer Protection</option>
                            <option>Environmental studies</option>
                            <option>Comprehensive Viva-voce</option>
                            <!-- <option>Training Training report(sem_6)</option> -->
                            <option>Foundation of management</option>
                            <option>Business econonics</option>
                            <option>Financial accounting</option>
                            <option>Moral values</option>
                            <option>Research methodology</option>
                            <option>Computers and information system</option>
                            <option>Marketing management</option>
                            <option>Human Resource management </option>
                            <option>Internet and Intranet</option>
                            <option>Financial Managemnt</option>
                            <option>Business Communication</option>
                            <option>Indian business environment</option>
                            <option>System analysis and design</option>
                            <option>Consumer Behavior</option>
                            <option>Project Management</option>
                            <option>Operations Management</option>
                            <!-- <option>Project report(sem_3)</option> -->
                            <option>Organizational behavior</option>
                            <option>Management and cost accounting</option>
                            <option>Quantitative techniques</option>
                            <option>Human rights and values</option>
                            <option>Investment banking</option>
                            <option>DBMS and RDBMS</option>
                            <!-- <option>Training report(sem_4)</option> -->
                            <option>Advertising and sales management</option>
                            <option>Business policy and Strategic management</option>
                            <option>MIS and E-Business</option>
                            <option>Cyber Security</option>
                            <option>Retail management</option>
                            <option>Financial markets and Environment</option>
                            <!-- <option>Training report(sem_5)</option> -->
                            <option>International Business</option>
                            <option>Mercantile law</option>
                            <option>Service marketing</option>
                            <option>Management of financial services</option>
                            <option>Environmental studies</option>
                            <option>Entrepreneurship development</option>
                            <!-- <option>Training report(sem_6)</option> -->
                        </select>
                        <script>
                            $(".chosen").chosen();
                        </script>
                        <button style="background-color:#21196C; border: 1px white solid;" class="btn btn-primary" type="button" id="search_btn">Search</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Home Banner Area =================-->

<!--================Service  Area =================-->
<div class="demo2">
    <div class="container">
        <div class="top_cont">
            <h4 class="top_cont_h4" style="padding-top:10px top_cont ">STREEM / COURCES </h4>
        </div>

        <div class="row">
            <!-- btech -->
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable2 border_blue">
                    <div class="pricingTable-header">
                        <h3 class="title">B.TECH</h3>
                    </div>
                    <ul class="pricing-content">
                        <li>
                            <i class="fa fa-check">
                                <a href="" da="CSE" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_btech">Computer Science & Engineering</a>
                            </i>
                        </li>
                        <li>
                            <i class="fa fa-check">
                                <a href="" da="ME" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_btech">Mechanical Engineering</a>
                            </i>
                        </li>
                        <li>
                            <i class="fa fa-check">
                                <a href="" da="EE" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_btech">Electrical Engineering</a>
                            </i>
                        </li>
                        <li>
                            <i class="fa fa-check">
                                <a href="" da="CE" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_btech">Electronics & Communication Engineering</a>
                            </i>
                        </li>
                        <li><i class="fa fa-check"><a href="" da="ECE" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_btech">Civil Engineering</a></i>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- bba -->
            <div class="col-md-4 col-sm-6 ">
                <div class="pricingTable2 blue abcd">
                    <div class="pricingTable-header ">
                        <h3 class="title">B B A</h3>
                    </div>
                    <ul class="pricing-content">
                        <li><i class="fa fa-check"><a href="" da="BBA_ind" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_bba"> Industrial</a> </i> </li>
                        <li><i class="fa fa-check"><a href="" da="BBA_gen" data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="open_modal_bba"> General</a> </i> </li>

                    </ul>

                </div>
            </div>

            <!-- pdf -->
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable2 pink border_blue">
                    <div class="pricingTable-header">
                        <h3 class="title">PDF READER</h3>

                    </div>

                    <!-- <div class="drag-area" style="height: auto; width: auto; margin: auto; margin-left: 5px;margin-right: 5px; padding: 10px;">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <header>Drag & Drop Your Pdf To Read</header>
                        <span>OR</span>
                        <button>Browse File
                        <input type="file" accept=".pdf" hidden>
                        </button>
                    </div>
                    <div class="file-upload-wrapper">
                        <input type="file" id="input-file-now" class="file-upload" />
                    </div>
                    <script>
                        $('.file-upload').file_upload();
                    </script> -->
                    <form method="POST" enctype="multipart/form-data">
                        <div style="padding: 10px;">
                            <h3 style="margin-bottom: 10px;">Drag & Drop Your Pdf To Read</h3>
                            <!-- <input type="file" id="input-file-now" class="file-upload" style="align-items:center ;" /> -->
                            <input name="doc_file" accept=".pdf" type="file" multiple="" class="form-control" id="doc_file" />

                            <button name="submit" type="submit" class="btn btn-primary" style="margin: 20px;">Submit</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================Service Area end =================-->

<!-- ------------------------------------------------top contri block  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
<?php

// ------------------------------ fist query -----------------------
$query_first_btech = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc LIMIT 0,1 ";
$result_first_btech = mysqli_query($link, $query_first_btech);
$first_btech = mysqli_fetch_assoc($result_first_btech);

// ------------------------------ 2 query -----------------------
$query_second_btech = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc LIMIT 1,1 ";
$result_second_btech = mysqli_query($link, $query_second_btech);
$second_btech = mysqli_fetch_assoc($result_second_btech);

// ------------------------------ 3 query -----------------------
$query_third_btech = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc LIMIT 2,1 ";
$result_third_btech = mysqli_query($link, $query_third_btech);
$third_btech = mysqli_fetch_assoc($result_third_btech);

//bba
// ------------------------------ fist query -----------------------
$query_first_bba = "SELECT * FROM `user_db` where `stream`= 'BBA' order by `total_views` desc LIMIT 0,1 ";
$result_first_bba = mysqli_query($link, $query_first_bba);
$first_bba = mysqli_fetch_assoc($result_first_bba);

// ------------------------------ 2 query -----------------------
$query_second_btech = "SELECT * FROM `user_db` where `stream`= 'BBA' order by `total_views` desc LIMIT 1,1 ";
$result_second_bba = mysqli_query($link, $query_second_btech);
$second_bba = mysqli_fetch_assoc($result_second_bba);

// ------------------------------ 3 query -----------------------
$query_third_bba = "SELECT * FROM `user_db` where `stream`= 'BBA' order by `total_views` desc LIMIT 2,1 ";
$result_third_bba = mysqli_query($link, $query_third_bba);
$third_bba = mysqli_fetch_assoc($result_third_bba);

?>


<div id="abcc" style="height: auto; padding-top: 100px; padding-bottom: 50px;">
    <div>
        <h1 class="hedding_top_cont">TOP CONTRIBUTORS </h1>
    </div>
    <div id="top_contt" class="pricing-container" style=" margin: 3em auto;">
        <div class="pricing-switcher">
            <p class="fieldset">
                <input type="radio" name="duration-1" value="monthly" id="monthly-1" checked>
                <label value="btech" for="monthly-1">B.TECH</label>

                <input type="radio" name="duration-1" value="yearly" id="yearly-1">
                <label value="bba" for="yearly-1">B B A </label>
                <span class="switch"></span>
            </p>
        </div>
        <ul class="pricing-list bounce-invert">
            <li>
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b> <?php echo $first_btech['name'];  ?>
                                </b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/1_place.png" alt="">
                        </header>

                        <!-- ////////////////////////////// -->
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $first_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $first_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                        <!-- ////////////////////////////// -->

                    <li data-type="yearly" class="is-hidden">

                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $first_bba['name'];  ?></b>
                            </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/1_place.png" alt="">
                        </header>

                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $first_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $first_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="exclusive">
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">

                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;">
                                <b><?php echo $second_btech['name'];  ?></b>
                            </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/2_place.png" alt="">
                        </header>

                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $second_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $second_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $second_bba['name'];  ?></b>
                            </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/2_place.png" alt="">
                        </header>
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $second_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $second_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $third_btech['name'];  ?></b>
                            </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/3_place.png" alt="">
                        </header>
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $third_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $third_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $third_bba['name'];  ?></b>
                            </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/3_place.png" alt="">
                        </header>
                        <div class="container">
                            <div class="row">
                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br>
                                    <?php echo $third_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br>
                                    <?php echo $third_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
        <div>
            <?php
            if ($_SESSION) {
            ?>
                <button class="btn btn-light btn-outline-light   " type="submit">
                    <a href="?page=top_con">
                        <h3 style="font-size: 1.5rem;">VIEW ALL CONTRIBUTORS</h3>
                    </a>
                </button>
            <?php
            } else {
            ?>
                <button class="btn btn-light btn-outline-light   " type="submit">
                    <a href="?page_bl=top">
                        <h3 style="font-size: 1.5rem;">VIEW ALL CONTRIBUTORS</h3>
                    </a>
                </button>
            <?php
            }
            ?>
        </div>
    </div>
</div>


<?php

// ------------------------------ fist query -----------------------
$query_latest = "SELECT * FROM `all_notes` order by `id` desc limit 3 ";
$result = mysqli_query($link, $query_latest);
// $notes = mysqli_fetch_assoc($result);
//print_r($notes);
// ------------------------------ 2 query -----------------------
$query_latest2 = "SELECT * FROM `all_notes` order by `views` desc limit 3 ";
$result2 = mysqli_query($link, $query_latest2);
//$notes2 = mysqli_fetch_assoc($result2);

// ------------------------------ 3 query -----------------------
$query_latest3 = "SELECT * FROM `all_notes` order by `likes` desc  limit 3";
$result3 = mysqli_query($link, $query_latest3);
// $notes3 = mysqli_fetch_row($result3);


?>


<!-- Keep yourself upto date ++++++++++++++++++++++ end    1     +++++++++++++++++++++ -->

<div class="demo2">
    <div class="container">
        <div class="top_cont">
            <h4 class="top_cont_h4" style="padding-top:10px top_cont ">Keep yourself upto date </h4>
        </div>

        <div class="row">
            <!-- btech -->
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable2 border_blue">
                    <div class="pricingTable-header">
                        <h3 class="title">Latest Notes</h3>
                    </div>
                    <ul class="pricing-content">
                        <?php
                        $count_notes = 0;
                        if (mysqli_num_rows($result) > 0) {
                            while ($notes = mysqli_fetch_assoc($result)) {
                                $count_notes = $count_notes + 1;
                        ?>

                                <li style="margin: 0%; padding: 0%;">
                                    <a style="float: left;" href="">
                                        <strong> <?php echo $count_notes; ?> </strong> <?php echo $notes['subject'];  ?>
                                    </a>
                                    <br>
                                    <span style="font-size: small;">by <?php echo $notes['name']; ?></span>
                                </li>

                        <?php
                                if ($count_notes == 3) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- bba -->
            <div class="col-md-4 col-sm-6 ">
                <div class="pricingTable2 blue abcd">
                    <div class="pricingTable-header ">
                        <h3 class="title">Most Viewed</h3>
                    </div>
                    <ul class="pricing-content">
                        <?php
                        $count_notes = 0;
                        if (mysqli_num_rows($result2) > 0) {
                            while ($notes2 = mysqli_fetch_assoc($result2)) {
                                $count_notes = $count_notes + 1;
                        ?>
                                <li style="margin: 0%; padding: 0%;">
                                    <a style="float: left;" href="">
                                        <strong> <?php echo $count_notes; ?> </strong> <?php echo $notes2['subject'];  ?>
                                    </a>
                                    <br>
                                    <span style="font-size: small;">by <?php echo $notes2['name'];  ?></span>
                                </li>
                        <?php
                                if ($count_notes == 3) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>

            <!-- pdf -->
            <div class="col-md-4 col-sm-6">
                <div class="pricingTable2 pink border_blue">
                    <div class="pricingTable-header">
                        <h3 class="title">Most like</h3>

                    </div>
                    <ul class="pricing-content">
                        <?php
                        $count_notes = 0;
                        if (mysqli_num_rows($result3) > 0) {
                            while ($notes3 = mysqli_fetch_assoc($result3)) {
                                $count_notes = $count_notes + 1;
                        ?>
                                <li style="margin: 0%; padding: 0%;">
                                    <a style="float: left;" href="">
                                        <strong> <?php echo $count_notes; ?> </strong> <?php echo $notes3['subject'];  ?>
                                    </a>
                                    <br>
                                    <span style="font-size: small; "> by <?php echo $notes3['name'];  ?></span>

                                </li>
                        <?php
                                if ($count_notes == 3) {
                                    break;
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Keep yourself upto date ++++++++++++++++++++++ end   2      +++++++++++++++++++++ -->
<!-- modals  -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Select a Semester</h5>
                <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
            </div>
            <div class="modal-body">
                <form method="">
                    <div class="form-group input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"> <i class="fa fa-building"></i> </span>
                        </div>
                        <select class="form-control btech sem">
                            <option disabled selected> Select Semester</option>
                            <option>First</option>
                            <option>Second</option>
                            <option>Third</option>
                            <option>Fourth</option>
                            <option>Fifth</option>
                            <option>Sixth</option>
                            <option>Seventh</option>
                            <option>Eighth</option>
                        </select>
                        <select class="form-control bba sem">
                            <option disabled selected> Select Semester</option>
                            <option>First</option>
                            <option>Second</option>
                            <option>Third</option>
                            <option>Fourth</option>
                            <option>Fifth</option>
                            <option>Sixth</option>
                        </select>
                    </div>
                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button name="search_button" type="button" id="sem_but" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(".open_modal_btech").click(function(e) {
        e.preventDefault();
        $('.bba').hide();
        $('.btech').show();
        $anuj = $(this).attr('da');

    });
    $(".open_modal_bba").click(function(e) {
        e.preventDefault();
        $('.btech').hide();
        $('.bba').show();
        $anuj = $(this).attr('da');

    });

    $('#sem_but').click(function() {
        $anoop = $('.sem').val();
        window.location.assign("http://localhost/practice/Note_Hub/?page=dash&branch=" + $anuj + "&sem=" +
            $anoop);
    });
    $('#search_btn').click(function() {
        $sub = $('.chosen').val();
        window.location.assign("http://localhost/practice/Note_Hub/?page=dash&sub=" + $sub);
    });
</script>

<script src="js/drag_script.js"></script>

<script>
    $(document).ready(function() {
        $(".chosen").css('color', 'black');
    });
</script>