<?php

if (isset($_POST['submit'])) {
  $name = $user['name'];
  $branch = $user['branch'];
  $stream = $user['stream'];
  $sem = $_POST['sem'];
  $sub = $_POST['need'];
  $doc_rel = $_POST['doc_rel'];
  $doc_type = $_POST['doctype'];
  $doc_disc = $_POST['discr'];
  $doc_file_name = $_FILES['doc_file']['name'];
  $doc_file_location = $_FILES['doc_file']['tmp_name'];

  $query1 = "SELECT * FROM `all_notes` WHERE `doc_name` = '" . $doc_file_name . "' LIMIT 1";
  $res = mysqli_query($link, $query1);
  $fetch = mysqli_fetch_assoc($res);
  if (!$fetch) {
    move_uploaded_file($doc_file_location, "doc_upload/" . $doc_file_name);
    $query = "INSERT INTO `all_notes` (`user_id`,`name`, `branch`, `stream`, `semester`, `subject`, `doc_relation`,`doc_type`,`doc_disc`,`doc_name`)
                    VALUES ('" . mysqli_real_escape_string($link, $_SESSION['id']) . "',
                          '" . mysqli_real_escape_string($link, $name) . "',
                          '" . mysqli_real_escape_string($link, $branch) . "',
                          '" . mysqli_real_escape_string($link, $stream) . "',
                          '" . mysqli_real_escape_string($link, $sem) . "',
                          '" . mysqli_real_escape_string($link, $sub) . "',
                          '" . mysqli_real_escape_string($link, $doc_rel) . "',
                          '" . mysqli_real_escape_string($link, $doc_type) . "',
                          '" . mysqli_real_escape_string($link, $doc_disc) . "',
                          '" . mysqli_real_escape_string($link, $doc_file_name) . "')";
    if (mysqli_query($link, $query)) {
      echo "<script> alert('Document uploaded successfully'); </script>";
      echo "<script> window.location.assign('http://localhost/practice/Note_Hub/?page=upl'); </script>";
    } else {
      echo "Invalid file type.";
    }
  } else {
    echo "<script> alert('This Document Is alredy uploaded by " . $name . " from (" . $stream . " / " . $branch . " / " . $sem . " Smemster )'); </script>";
  }
  $total_upl = $user['total_uploads'];
  $total_upl = $total_upl + 1;
  $update_upload_count = mysqli_query($link, "UPDATE `user_db` SET `total_uploads`= '.$total_upl.' WHERE `id`='" .mysqli_real_escape_string($link,$_SESSION['id']). "' ");
}

?>


<div style="margin-top: 100px;">
  <div class="container">
    <div class="row">
      <div class="col-xl-8 offset-xl-2 py-5">
        <form id="contact-form" method="POST" role="form" enctype="multipart/form-data">
          <div class="messages"></div>
          <div class="controls">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <!-- <label for="form_name">Firstname *</label> -->
                  <div class="form-control">
                    <label>YOUR BRANCH &nbsp;&nbsp;<?php echo $user['branch']; ?></label>
                    <!-- <div id="<?php echo $user['stream']; ?>"></div> -->
                  </div>

                  <div class="help-block with-errors"></div>
                </div>
              </div>

              <!-- stream -->
              <div class="col-md-6">
                <?php if ($user['stream'] == "B.Tech") { ?>
                <div class="form-group">
                  <select id="btech_sem" name="sem" class="form-control" required="required"
                    data-error="Please specify your need.">
                    <option disabled selected>Select Semester</option>
                    <option>First</option>
                    <option>Second</option>
                    <option>Third</option>
                    <option>Fourth</option>
                    <option>Fifth</option>
                    <option>Sixth</option>
                    <option>Seventh</option>
                    <option>Eighth</option>
                  </select>
                  <?php } else { ?>
                  <select id="bba_sem" name="sem" class="form-control" required="required"
                    data-error="Please specify your need.">
                    <option disabled selected>Select Semester</option>
                    <option>First</option>
                    <option>Second</option>
                    <option>Third</option>
                    <option>Fourth</option>
                    <option>Fifth</option>
                    <option>Sixth</option>
                  </select>
                  <?php } ?>
                  <div class="help-block with-errors"></div>
                </div>
              </div>


            </div>
            <div class="row">
              <div class="col-md-12">

                <!-- search subjects -->
                <div class="form-group">

                  <!-- btech_sem -->
                  <div id="btech">
                    <?php if ($user['branch'] == "CSE") { ?>
                    <!-- <div id="CSE"> -->
                    <select id="sem_1" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Chemistry</option>
                      <option>English</option>
                      <option>Mathematics-1 (Calculus and Linear Algebra)</option>
                      <option>Basic Electrical Engineering</option>
                    </select>
                    <select id="sem_2" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Physics(Semiconductor Physics)</option>
                      <option>Mathematics-2 (Probability and Statistics)</option>
                      <option>Programming for Problem solving</option>
                    </select>
                    <select id="sem_3" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Analog Electronic Circuits </option>
                      <option>Data Structures & Algorithms </option>
                      <option>Digital Electronics</option>
                      <option>Mathematics- III (Calculus and Ordinary Differential Equations)</option>
                      <option>Effective Technical Communication</option>
                      <option>IT Workshop(MATLAB)</option>
                    </select>
                    <select id="sem_4" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Discrete Mathematics </option>
                      <option>Computer Organization & Architecture</option>
                      <option>Operating System</option>
                      <option>Design & Analysis of Algorithms </option>
                      <option>Organizational Behaviour/ Finance & Accounting</option>
                      <option>Environmental Sciences</option>
                    </select>
                    <select id="sem_5" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Signals & Systems</option>
                      <option>Database Management Systems </option>
                      <option>Formal Languages & Automata</option>
                      <option>Object Oriented Programming </option>
                      <option>Economics for Engineers </option>
                      <option>Constitution of India</option>
                      <option>Universal Human Values</option>
                    </select>
                    <select id="sem_6" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Compiler Design</option>
                      <option>Computer Networks </option>
                      <option>Data Analysis Using Python</option>
                      <option>Data Mining</option>
                      <option>Human Resource Management</option>
                      <option>Soft Computing</option>
                    </select>
                    <select id="sem_7" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option disabled selected>no data</option>
                    </select>
                    <select id="sem_8" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Biology </option>
                    </select>

                    <!-- </div> -->
                    <?php } elseif ($user['branch'] == "ME") { ?>
                    <!-- <div id="ME"> -->
                    <select id="sem_1" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Physics-I</option>
                      <option>Mathematics-I </option>
                      <option>Chemistry</option>
                      <option>Environmental Science</option>
                      <option>Elements of Electronics Engg.</option>
                      <option>Basics of Mechanical Engg.</option>
                    </select>
                    <select id="sem_2" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Physics-II </option>
                      <option>Mathematics-II </option>
                      <option>Interactive English</option>
                      <option>Basic Electrical Engineering</option>
                      <option>Fundamentals of Computer & Programming with C</option>
                      <option>Engineering Drawing </option>
                    </select>
                    <select id="sem_3" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Fluid Mechanics</option>
                      <option>Engineering Mechanics</option>
                      <option>Thermodynamics </option>
                      <option>Manufacturing Processes</option>
                      <option>Numerical Methods</option>
                      <option>Mandatory Audit Course–I</option>
                    </select>
                    <select id="sem_4" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Kinematics of Machines</option>
                      <option>Material Science and Engineering</option>
                      <option>IC Engines</option>
                      <option>Fluid Machines</option>
                      <option>Manufacturing Technology and Metrology</option>
                      <option>Advanced Strength of Materials</option>
                      <option>Mandatory Audit Course–II</option>
                    </select>
                    <select id="sem_5" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Dynamics of Machines</option>
                      <option>Refrigeration and Air Conditioning</option>
                      <option>Industrial Engineering </option>
                      <option>Machine Design–I</option>
                      <option>Discipline Specific Elective Course-I</option>
                      <option>General Elective Course-I </option>
                    </select>
                    <select id="sem_6" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Heat and Mass Transfer</option>
                      <option>Computer Aided Design</option>
                      <option>CAM and Automation</option>
                      <option>Machine Design–II</option>
                      <option>Discipline Specific Elective Course-II</option>
                      <option>General Elective Course-II </option>
                    </select>
                    <select id="sem_7" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Industrial Training</option>
                    </select>
                    <select id="sem_8" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Discipline Specific Elective Course-III</option>
                      <option>Operations Research </option>
                      <option>Discipline Specific Elective Course-IV </option>
                      <option>Discipline Specific Elective Course-V</option>
                      <option>General Elective Course-III </option>
                    </select>
                    <!-- </div> -->
                    <?php } elseif ($user['branch'] == "EE") { ?>
                    <!-- <div id="EE"> -->
                    <select id="sem_1" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Physics (Waves and Optics)</option>
                      <option>Mathematics-I (Calculus and Linear Algebra)</option>
                      <option>Engineering Graphics & Design</option>
                      <option>Programming for Problem Solving </option>
                    </select>
                    <select id="sem_2" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>Mathematics-II (Calculus, Ordinary Differential Equations)</option>
                      <option>Basic Electrical Engineering </option>
                      <option>Chemistry</option>
                      <option>English </option>
                    </select>
                    <select id="sem_3" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>ANALOG ELECTRONIC CIRCUITS</option>
                      <option>ELECTRICAL CIRCUIT ANALYSIS</option>
                      <option>ELECTRICAL MACHINES-1</option>
                      <option>ENGINEERING MECHANICS</option>
                      <option>MATHEMATICS - III</option>
                    </select>
                    <select id="sem_4" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>DIGITAL ELECTRONICS</option>
                      <option>ELECTRICAL MACHINES-II</option>
                      <option>ELECTRO MAGNETIC FIELDS</option>
                      <option>SIGNAL & SYSTEMS</option>
                      <option>MEASURMENT & INSTRUMENTATION</option>
                      <option>BIOLOGY </option>
                      <option>ENVIRONMENTAL SCIENCES</option>
                    </select>
                    <select id="sem_5" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>POWER SYSTEMS-I (Apparatus and Modelling)</option>
                      <option>POWER ELECTRONICS</option>
                      <option>CONTROL SYSTEMS</option>
                      <option>ANALOG & DIGITAL COMMUNICATION</option>
                      <option>PROGRAM ELECTIVE-I</option>
                      <option>OPEN ELECTIVE-I</option>
                    </select>
                    <select id="sem_6" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>DIGITAL SYSTEM DESIGN</option>
                      <option>DIGITAL SIGNAL PROCESSING</option>
                      <option>MICROPROCESSORS </option>
                      <option>PROGRAM ELECTIVE-II </option>
                      <option>PROGRAM ELECTIVE-III</option>
                      <option>OPEN ELECTIVE-II </option>
                    </select>
                    <select id="sem_7" name="need" class="form-control" required="required"
                      data-error="Please specify your need.">
                      <option disabled selected>Select Semester</option>
                      <option>SLOT FOR HSMC</option>
                      <option>MAJOR PROJECT</option>
                      <select id="sem_8" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>SLOT FOR HSMC</option>
                        <option>MAJOR PROJECT</option>
                      </select>
                      <!-- </div> -->
                      <?php } elseif ($user['branch'] == "ECE") { ?>
                      <!-- <div id="ECE"> -->
                      <select id="sem_1" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Physics (Waves and Optics)</option>
                        <option>Mathematics-I (Calculus and Linear Algebra)</option>
                        <option>Engineering Graphics & Design</option>
                        <option>Programming for Problem Solving </option>
                      </select>
                      <select id="sem_2" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Mathematics-II (Calculus, Ordinary Differential Equations and Complex Variable )
                        </option>
                        <option>Basic Electrical Engineering</option>
                        <option>Chemistry</option>
                        <option>English</option>
                      </select>
                      <select id="sem_3" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>ANALOG ELECTRONIC CIRCUITS </option>
                        <option>ELECTRICAL CIRCUIT ANALYSIS </option>
                        <option>ELECTRICAL MACHINES-1</option>
                        <option>ENGINEERING MECHANICS </option>
                        <option>MATHEMATICS - III </option>
                        <option>MANDATORY COURSE</option>
                      </select>
                      <select id="sem_4" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>DIGITAL ELECTRONICS</option>
                        <option>ELECTRICAL MACHINES-II</option>
                        <option>ELECTRO MAGNETIC FIELDS</option>
                        <option>SIGNAL & SYSTEMS </option>
                        <option>MEASURMENT & INSTRUMENTATION</option>
                        <option>BIOLOGY </option>
                        <option>ENVIRONMENTAL SCIENCES</option>
                      </select>
                      <select id="sem_5" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>POWER SYSTEMS-I (Apparatus and Modelling)</option>
                        <option>POWER ELECTRONICS</option>
                        <option>CONTROL SYSTEMS</option>
                        <option>ANALOG & DIGITAL COMMUNICATION</option>
                        <option>PROGRAM ELECTIVE-I</option>
                        <option>OPEN ELECTIVE-I</option>
                      </select>
                      <select id="sem_6" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>DIGITAL SYSTEM DESIGN</option>
                        <option>DIGITAL SIGNAL PROCESSING </option>
                        <option>MICROPROCESSORS</option>
                        <option>PROGRAM ELECTIVEII </option>
                        <option>PROGRAM ELECTIVEIII</option>
                        <option>OPEN ELECTIVE-II </option>
                      </select>
                      <select id="sem_7" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>SLOT FOR HSMC</option>
                        <option>MAJOR PROJECT </option>
                        <option>ELECTRICAL AND ELECTRONICS WORKSHOP –VII</option>
                      </select>
                      <select id="sem_8" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option disabled selected>Select Semester</option>
                        <option>SLOT FOR HSMC</option>
                        <option>MAJOR PROJECT </option>
                        <option>ELECTRICAL AND ELECTRONICS WORKSHOP –VII</option>
                      </select>
                      <!-- </div> -->
                      <?php } elseif ($user['branch'] == "CE") { ?>
                      <!-- <div id="CE"> -->
                      <select id="sem_1" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option disabled selected>no data</option>
                      </select>
                      <select id="sem_2" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option disabled selected>no data</option>
                      </select>
                      <select id="sem_3" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Basic Electronics</option>
                        <option>Biology</option>
                        <option>Engineering Mechanics</option>
                        <option>Energy Science & Engineering</option>
                        <option>Life Science </option>
                        <option>Effective Technical Communication</option>
                        <option>Introduction to Civil Engineering</option>
                      </select>
                      <select id="sem_4" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Instrumentation & Sensor Technologies for Civil Engineering Applications</option>
                        <option>Engineering Geology</option>
                        <option>Disaster Preparedness & Planning</option>
                        <option>Introduction to Fluid Mechanics</option>
                        <option>Introduction to Solid Mechanics</option>
                        <option>Surveying & Geomatics</option>
                        <option>Materials, Testing & Evaluation</option>
                        <option>Mechanical Engineering</option>
                      </select>
                      <select id="sem_5" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Mechanics of Materials</option>
                        <option>Hydraulic Engineering</option>
                        <option>Structural Engineering</option>
                        <option>Geotechnical Engineering</option>
                        <option>Hydrology & Water Resources Engineering</option>
                        <option>Environmental Engineering</option>
                        <option>Transportation Engineering</option>
                        <option>Audit Course-1: Environment Science</option>
                      </select>
                      <select id="sem_6" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Construction Engineering & Management</option>
                        <option>Engineering Economics,Estimation & Costing</option>
                        <option> Audit Course-II :Indian Constitution</option>
                      </select>
                      <select id="sem_7" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Open Elective-II Sugested: Metro Systems & Engineering</option>
                        <option>Civil Engineering - Societal & Global Impact</option>
                      </select>
                      <select id="sem_8" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Semester</option>
                        <option>Industrial Project training (Duration Full Semester)</option>
                      </select>
                    </select>
                    <!-- </div> -->
                    <?php } else {
                      echo "";
                    } ?>
                  </div>

                  <!-- bba_sem -->
                  <div id="bba">
                    <?php if ($user['branch'] == "BBA_gen") { ?>
                    <div id="BBA_gen">
                      <select id="sem_1" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Business Organization</option>
                        <option>Business Mathematics</option>
                        <option>Computer Fundamentals</option>
                        <option>Financial Accounting</option>
                        <option>Presentation & Communication Skills-I</option>
                        <option>Micro economics for Business Decisions</option>
                      </select>
                      <select id="sem_2" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Management Process & Organizational Behaviour</option>
                        <option>Macro economic Analysis and Policy</option>
                        <option>Company Accounts</option>
                        <option>Computer Applications in Management</option>
                        <option>Presentation & Communication Skills-II</option>
                        <option>Business Statistics</option>
                      </select>
                      <select id="sem_3" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Cost and Management Accounting</option>
                        <option>Marketing Management</option>
                        <option>Capital Markets</option>
                        <option>Introduction to Information Technology</option>
                        <option>Indian Business Environment</option>
                        <option>Mandatory Audit Course(MAC)</option>
                      </select>
                      <select id="sem_4" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Financial Management</option>
                        <option>Human Resource Management</option>
                        <option>Business Research Methods</option>
                        <option>Data Base Management</option>
                        <option>Business Law</option>
                        <option>Human Rights and Values</option>
                      </select>
                      <select id="sem_5" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Production and Materials Management</option>
                        <option>Company Law</option>
                        <option>Computer Networking & Internet</option>
                        <option>Consumer Behaviour</option>
                        <option>Cyber Security</option>
                        <option>Open Elective Course</option>
                        <option>Training Report(sem_5)</option>
                      </select>
                      <select id="sem_6" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Income Tax</option>
                        <option>System Analysis & Design</option>
                        <option>Foundation of International Business</option>
                        <option>E-commerce</option>
                        <option>Consumer Protection</option>
                        <option>Environmental studies</option>
                        <option>Comprehensive Viva-voce</option>
                        <option>Training report(sem_6)</option>
                      </select>
                    </div>
                    <?php } elseif ($user['branch'] == "BBA_ind") { ?>
                    <div id="BBA_ind">
                      <select id="sem_1" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Foundation of management</option>
                        <option>Business econonics</option>
                        <option>Financial accounting</option>
                        <option>Moral values</option>
                        <option>Research methodology</option>
                        <option>Computers and information system</option>
                      </select>
                      <select id="sem_2" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Marketing management</option>
                        <option>Human Resource management </option>
                        <option>Business statistics</option>
                        <option>Internet and Intranet</option>
                        <option>Financial Managemnt</option>
                        <option>Business Communication</option>
                      </select>
                      <select id="sem_3" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Indian business environment</option>
                        <option>System analysis and design</option>
                        <option>Consumer Behavior</option>
                        <option>Project Management</option>
                        <option>Operations Management</option>
                        <option>Project report(sem_3)</option>
                      </select>
                      <select id="sem_4" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Organizational behavior</option>
                        <option>Management and cost accounting</option>
                        <option>Quantitative techniques</option>
                        <option>Human rights and values</option>
                        <option>Investment banking</option>
                        <option>DBMS and RDBMS</option>
                        <option>Training report(sem_4)</option>
                      </select>
                      <select id="sem_5" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>Advertising and sales management</option>
                        <option>Business policy and Strategic management</option>
                        <option>MIS and E-Business</option>
                        <option>Cyber Security</option>
                        <option>Retail management</option>
                        <option>Financial markets and Environment</option>
                        <option> Training report(sem_5)</option>
                      </select>
                      <select id="sem_6" name="need" class="form-control" required="required"
                        data-error="Please specify your need.">
                        <option disabled selected>Select Subjects</option>
                        <option>International Business</option>
                        <option>Mercantile law</option>
                        <option>Service marketing</option>
                        <option>Management of financial services</option>
                        <option>Environmental studies</option>
                        <option>Entrepreneurship development</option>
                        <option>Training report(sem_6)</option>
                      </select>
                    </div>
                    <?php } else {
                      echo "";
                    } ?>

                  </div>

                  <div class="help-block with-errors"></div>
                </div>


                <!--  -->
              </div>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <label for="exampleFormControlFile1">Document Related To</label>
                  <input class="form-control" name="doc_rel" id="exampleFormControlTextarea1" rows="3"
                    placeholder="Topic / Unit / syllabus cover" required="required" data-error="A Topic is required.">
                  <div class="help-block with-errors"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="doctype" id="inlineRadio1" value="Notes">
                <label class="form-check-label" for="inlineRadio1">Notes</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Question Papers" name="doctype" id="inlineRadio1">
                <label class="form-check-label" for="inlineRadio1">Question Papers</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="Ebooks" name="doctype" id="inlineRadio1">
                <label class="form-check-label" for="inlineRadio1">Ebooks</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="LAB / PRACTICAL" name="doctype" id="inlineRadio1">
                <label class="form-check-label" for="inlineRadio1">LAB / PRACTICAL</label>
              </div>
            </div>
            <div class="row">
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Description</label>
                <textarea name="discr" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
              </div>
              <div class="form-group files">
                <label>Attach Your File Hear</label>
                <input name="doc_file" accept=".pdf" type="file" multiple="" class="form-control" id="doc_file" />
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $user['name'];
                    ?>
                  </div>
                </div>
                <!-- <hr> -->
                <br>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <?php
                    echo $user['email'];
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div><!-- /.8 -->
    </div> <!-- /.row-->
  </div>
</div>

<script>
  $(document).ready(function () {
    $('#btech_sem').change(function () {
      $('#sem_2').hide();
      $('#sem_3').hide();
      $('#sem_4').hide();
      $('#sem_5').hide();
      $('#sem_6').hide();
      $('#sem_7').hide();
      $('#sem_8').hide();
      if ($('#btech_sem').val() == "First") {
        $('#sem_1').show();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').hide();

      } else if ($('#btech_sem').val() == "Second") {
        $('#sem_1').hide();
        $('#sem_2').show();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').hide();
      } else if ($('#btech_sem').val() == "Third") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').show();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').hide();
      } else if ($('#btech_sem').val() == "Fourth") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').show();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').hide();
      } else if ($('#btech_sem').val() == "Fifth") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').show();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').hide();
      } else if ($('#btech_sem').val() == "Sixth") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').show();
        $('#sem_7').hide();
        $('#sem_8').hide();
      } else if ($('#btech_sem').val() == "Seventh") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').show();
        $('#sem_8').hide();
      } else {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();
        $('#sem_7').hide();
        $('#sem_8').show();
      }
    }).change();
    $('#bba_sem').change(function () {
      $('#sem_2').hide();
      $('#sem_3').hide();
      $('#sem_4').hide();
      $('#sem_5').hide();
      $('#sem_6').hide();
      if ($('#bba_sem').val() == "First") {
        $('#sem_1').show();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();

      } else if ($('#bba_sem').val() == "Second") {
        $('#sem_1').hide();
        $('#sem_2').show();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();

      } else if ($('#bba_sem').val() == "Third") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').show();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').hide();

      } else if ($('#bba_sem').val() == "Fourth") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').show();
        $('#sem_5').hide();
        $('#sem_6').hide();

      } else if ($('#bba_sem').val() == "Fifth") {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').show();
        $('#sem_6').hide();

      } else {
        $('#sem_1').hide();
        $('#sem_2').hide();
        $('#sem_3').hide();
        $('#sem_4').hide();
        $('#sem_5').hide();
        $('#sem_6').show();
      }

    }).change();

  });
</script>