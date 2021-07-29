<?php

include('connect.php');

?>

<!-- -------------------------------------style block ------------------------------------------------ -->

<style>
    .top_table {
        background-color: white;
        margin-top: 30px;
        height: 500px;
    }

    .content-table {
        margin: auto !important;
        width: 80%;
        font-size: 25px !important;
        border-collapse: collapse;
        margin: 25px 0;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table thead tr {
        background-color: #241C71;
        color: #ffffff;
        text-align: left;
        font-weight: bold;
    }

    .content-table th,
    .content-table td {
        padding: 12px 15px;
    }

    .content-table tbody tr {
        border-bottom: 1px solid #dddddd;
    }

    .content-table tbody tr:nth-of-type(even) {
        background-color: #f3f3f3;
    }

    .content-table tbody tr:last-of-type {
        border-bottom: 2px solid #241C71;
    }

    .content-table tbody tr.active-row {
        font-weight: bold;
        color: #241C71;
    }
</style>
<!-- -------------------------------------style block  end ------------------------------------------------ -->

<?php
//btech
// ------------------------------ fist query -----------------------
$query_first_btech = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc LIMIT 0,1 ";
$result_first_btech = mysqli_query($link, $query_first_btech);
$first_btech = mysqli_fetch_assoc($result_first_btech);

// ------------------------------ 2 query -----------------------
$query_second_btech = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc LIMIT 1,1 ";
$result_second_btech= mysqli_query($link, $query_second_btech);
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
$result_second_bba= mysqli_query($link, $query_second_btech);
$second_bba = mysqli_fetch_assoc($result_second_bba);

// ------------------------------ 3 query -----------------------
$query_third_bba = "SELECT * FROM `user_db` where `stream`= 'BBA' order by `total_views` desc LIMIT 2,1 ";
$result_third_bba = mysqli_query($link, $query_third_bba);
$third_bba = mysqli_fetch_assoc($result_third_bba);

?>

<!-- ---------------------------------------------------- -->

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
                            <h5 style="display: inline; padding: 50px 0px;"> <b> <?php echo $first_btech['name'];  ?> </b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/1_place.png" alt="">
                        </header>

                        <!-- ////////////////////////////// -->
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $first_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $first_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                        <!-- ////////////////////////////// -->

                    <li data-type="yearly" class="is-hidden">

                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $first_bba['name'];  ?></b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/1_place.png" alt="">
                        </header>

                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $first_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $first_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="exclusive">
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">

                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $second_btech['name'];  ?></b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/2_place.png" alt="">
                        </header>

                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $second_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $second_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $second_bba['name'];  ?></b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/2_place.png" alt="">
                        </header>
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $second_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $second_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <ul class="pricing-wrapper">
                    <li data-type="monthly" class="is-visible">
                        <!-- <header class="pricing-header">
                            <h2> <?php echo $notes['name'];  ?> </h2>
                            <img class="position_logo" src="img/places/3_place.png" alt="">
                        </header> -->


                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $third_btech['name'];  ?></b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/3_place.png" alt="">
                        </header>

                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $third_btech['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $third_btech['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                    <li data-type="yearly" class="is-hidden">
                        <header style="padding-top: 40px;" class="pricing-header">
                            <h5 style="display: inline; padding: 50px 0px;"> <b><?php echo $third_bba['name'];  ?></b> </h5>
                            <br>
                            <img style="margin-top: 30px;" class="position_logo" src="img/places/3_place.png" alt="">
                        </header>
                        <div class="container">
                            <div class="row">

                                <div style="padding-top: 30px;" class="col"><b></b><br> </div>
                                <!-- <div class="col">Column</div> -->
                                <div class="w-100"></div>
                                <div style="padding-bottom: 30px;" class="col"><b>Uploads</b> <br> <?php echo $third_bba['total_uploads'];  ?> </div>
                                <div style="padding-bottom: 30px;" class="col"><b>Views</b> <br> <?php echo $third_bba['total_views'];  ?> </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>


<div class="table_both" style="padding-bottom: 100px;">
    <div id="table1" class="top_table">
        <h1 style=" padding: 15px 0px;"><b style="color:#241C71 !important;">TOP CONTRIBUTORS OF B.TECH </b> </h1>
        <table class="content-table">
            <thead>
                <tr style="text-align: center;">
                    <th>RANK</th>
                    <th>NAME</th>
                    <th>VIEWS </th>
                    <th>Uploads</th>
                    <th>Branch</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query_latest5 = "SELECT * FROM `user_db` where `stream`= 'B.Tech' order by `total_views` desc limit 10 ";
                $result5 = mysqli_query($link, $query_latest5);
                ?>
                <?php
                $count_notes5 = 0;
                if (mysqli_num_rows($result5) > 0) {
                    while ($notes5 = mysqli_fetch_assoc($result5)) {
                        $count_notes5 = $count_notes5 + 1;
                ?>
                        <?php
                        if ($count_notes5 <= 3) {
                            continue;
                        }
                        ?>
                        <tr <?php if ($count_notes5 % 2 != 0) {
                                echo ' class="active-row" ';
                            } ?>>
                            <td><?php echo $count_notes5; ?></td>
                            <td><?php echo $notes5['name'];  ?> </td>
                            <td> <?php echo $notes5['total_views'];  ?> </td>
                            <td><?php echo $notes5['total_uploads'];  ?></td>
                            <td><?php echo $notes5['branch'];  ?></td>
                        </tr>
                <?php
                        if ($count_notes5 == 10) {
                            break;
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <div id="table2" class="top_table">
        <h1 style="color: blue !important; padding: 15px 0px;"><b style="color:#241C71 !important;">TOP CONTRIBUTORS OF
                BBA </b> </h1>
        <table class="content-table">
            <thead>
                <tr style="text-align: center;">
                    <th>RANK</th>
                    <th>NAME</th>
                    <th>VIEWS </th>
                    <th>Uploads</th>
                    <!-- <th>Course</th> -->
                    <th>Stream</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query_latest6 = "SELECT * FROM `user_db` where `stream`= 'BBA' order by `total_views` desc limit 10 ";
                $result6 = mysqli_query($link, $query_latest6);
                ?>
                <?php
                $count_notes6 = 0;
                if (mysqli_num_rows($result6) > 0) {
                    while ($notes6 = mysqli_fetch_assoc($result6)) {
                        $count_notes6 = $count_notes6 + 1;
                ?>
                        <?php
                        if ($count_notes6 <= 3) {
                            continue;
                        }
                        ?>
                        <tr <?php if ($count_notes6 % 2 != 0) {
                                echo ' class="active-row" ';
                            } ?>>
                            <td><?php echo $count_notes6; ?></td>
                            <td><?php echo $notes6['name'];  ?> </td>
                            <td> <?php echo $notes6['total_views'];  ?> </td>
                            <td><?php echo $notes6['total_uploads'];  ?></td>
                            <td><?php echo $notes6['branch'];  ?></td>
                        </tr>
                <?php
                        if ($count_notes6 == 10) {
                            break;
                        }
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>