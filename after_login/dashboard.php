<?php
// include('connect.php');

if (isset($_GET['branch']) && isset($_GET['sem']) || (isset($_GET['search_filter']))) {
    $branch = ($_GET['branch']);
    $sem = ($_GET['sem']);
    if (isset($_GET['doc_types'])) {
        $doc_typ = $_GET['doc_types'];
        $query = "SELECT * FROM `all_notes` WHERE `branch`='$branch' AND `semester`='$sem' AND `doc_type`='$doc_typ' ";
        $back_link = "&branch=" . $branch . "&sem=" . $sem . "&type=" . $doc_typ . "";
    } else {
        $query = "SELECT * FROM `all_notes` WHERE `branch`='$branch' AND `semester`='$sem' ";
        $back_link = "&branch=" . $branch . "&sem=" . $sem . "";
    }
} else if (isset($_GET['sub']) || (isset($_GET['search_filter']))) {
    $sub = ($_GET['sub']);
    if (isset($_GET['doc_types'])) {
        $doc_typ = $_GET['doc_types'];
        $query = "SELECT * FROM `all_notes` WHERE `subject`='$sub' AND `doc_type`='$doc_typ'";
        $back_link = "&sub=" . $sub . "&type=" . $doc_typ . "";
    } else {
        $query = "SELECT * FROM `all_notes` WHERE `subject`='$sub' ";
        $back_link = "&sub=" . $sub . "";
    }
} else {
    if (isset($_GET['doc_types'])) {
        $doc_typ = $_GET['doc_types'];
        $query = "SELECT * FROM `all_notes` WHERE `doc_type`='$doc_typ' ";
        $back_link = "&type=" . $doc_typ . "";
    } else {
        $query = "SELECT * FROM `all_notes` ";
        $back_link = "";
    }
}
$result = mysqli_query($link, $query);
?>
<div style="margin: 70px; padding: 50px;">
    <div style="align-items: center; margin: 50px;">
        <span>
            <h2>hear all stuff you neede</h2>
        </span>
    </div>
    <form method="GET">
        <div class="row">
            <div class="col-md-1">
                <i class="fas fa-bars" style="float: left;"></i>
            </div>
            <div class="col-md-3">
                <select class="form-select" aria-label="Default select example" name="doc_types">
                    <option selected>Open this select menu</option>
                    <option>Notes</option>
                    <option>Question Papers</option>
                    <option>Ebooks</option>
                    <option>LAB / PRACTICAL</option>
                </select>
            </div>
            <?php if (isset($_SESSION['id'])) { ?>
                <div class="col-md-3">
                    <select class="form-select" aria-label="Default select example" name="doc_relation">
                        <option selected>Open this select menu</option>
                        <option>All</option>
                        <option>Mine Upload's</option>
                    </select>
                </div>
            <?php } ?>
            <div class="col-md-2">
                <button type="submit" name="search_filter" style="width: 100%;" class="btn btn-primary ">GO!</button>
            </div>
        </div>
    </form>


</div>
<div class="container" style="padding: 20px;">
    <div class="row">
        <?php
        if (mysqli_num_rows($result) > 0) {
            $count = 0;
            while ($notes = mysqli_fetch_assoc($result)) {
                $notes_id = $notes['id'];
                $notes_likes = $notes['likes'];
                $view_count_now = $notes['views'];
                if ($_SESSION) {
                    $user_id = $user['id'];
                }
        ?>
                <div class="card col-md-4" style=" padding: 0px;">
                    <div class="card-body " style="width: 100%; font-size: small;">
                        <h5 class="card-title">
                            <i class="far fa-eye" style="float: left; margin-top: 5px; "><span style="font-family: Verdana, Geneva, Tahoma, sans-serif; font-size: medium;">&nbsp;
                                    <?php echo $view_count_now; ?></span></i>
                            <span style="text-align-last: center; font-size: larger;"><?php echo $notes['doc_type']; ?></span>
                            <?php
                            if ($_SESSION) {
                                $like_query = mysqli_query($link, "SELECT * FROM `likes` WHERE `doc_id` =$notes_id AND `user_id` = $user_id ");
                                $count = mysqli_num_rows($like_query);
                                if ($count > 0) {
                                    echo " <a href='like_unlike.php?li=dis&note_id=" . $notes_id . "&usr_id=" . $user_id . "" . $back_link . "'> <i class='fas fa-thumbs-up' style='float: right; margin-top: 5px;'><span>&nbsp; " . $notes_likes . " </span></i></a>";
                                } else {
                                    echo " <a href='like_unlike.php?li=lik&note_id=" . $notes_id . "&usr_id=" . $user_id . "" . $back_link . "'> <i class='far fa-thumbs-up' style='float: right; margin-top: 5px;'><span>&nbsp; " . $notes_likes . "</span></i></a>";
                                }
                            }
                            ?>
                        </h5>
                        <hr>
                        <?php if ($_SESSION) { ?>
                            <a href="http://localhost/practice/Note_Hub/after_login/pdf_viewer.php?fn=<?php echo $notes['doc_name']; ?>&note_id=<?php echo $notes_id; ?>&usr_id=<?php echo $user_id; ?>" target="_blank" style="text-decoration:none; color: inherit; ">
                            <?php } else { ?>
                                <a href="http://localhost/practice/Note_Hub/after_login/pdf_viewer.php?fn=<?php echo $notes['doc_name']; ?>&note_id=<?php echo $notes_id; ?>" target="_blank" style="text-decoration:none; color: inherit; ">
                                <?php } ?>
                                <div style="text-align-last: left;">
                                    <p class="card-text"><b style="color: black;">Topic</b><span style="float : right;"><?php echo $notes['doc_relation']; ?></span> </p>
                                    <p class="card-text"><b style="color: black;">Description</b><span style="float : right;"><?php echo $notes['doc_disc']; ?></span></p>
                                    <p class="card-text"><b style="color: black;">Subject</b><span style="float: right;"><?php echo $notes['subject']; ?></span></p>
                                    <p class="card-text"><b style="color: black;">Uploaded By</b><span style="float : right;"><?php echo $notes['name'] ?></span></p>
                                    <p class="card-text"><b style="color: black;">Size</b><span style="float : right;"><?php echo "none"; ?></span></p>
                                    <p class="card-text"><b style="color: black;">Date</b><span style="float : right;"><?php echo $notes['time']; ?></span></p>
                                </div>
                                </a>
                                <hr>
                                <a href="#" class="card-link" style="float: left;">Report us &nbsp;</a>
                                <a href="#" class="btn btn-primary" style="padding: 2px 4px; float: right;">Details</a>
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div class="container" style="align-items: center; text-align: center; vertical-align: middle; margin-top: 150px; font-size: large;">
                <svg height="50px" viewBox="0 0 512 512" width="50px" xmlns="http://www.w3.org/2000/svg">
                    <g fill="#ff0023">
                        <path d="m256 512c-68.113281 0-132.324219-26.703125-180.8125-75.1875-48.484375-48.484375-75.1875-112.699219-75.1875-180.8125s26.703125-132.328125 75.1875-180.8125c48.488281-48.484375 112.699219-75.1875 180.8125-75.1875s132.328125 26.703125 180.8125 75.1875 75.1875 112.699219 75.1875 180.8125-26.703125 132.328125-75.1875 180.8125-112.699219 75.1875-180.8125 75.1875zm0-482c-124.617188 0-226 101.382812-226 226s101.382812 226 226 226 226-101.382812 226-226-101.382812-226-226-226zm0 0" />
                        <path d="m402.667969 375.246094c-3.960938 0-7.78125-1.570313-10.605469-4.394532l-250.914062-250.914062c-3.121094-3.121094-4.710938-7.453125-4.34375-11.851562.367187-4.394532 2.648437-8.40625 6.242187-10.96875 33.148437-23.628907 72.210937-36.117188 112.953125-36.117188 107.523438 0 195 87.476562 195 195 0 40.746094-12.488281 79.804688-36.117188 112.953125-2.5625 3.59375-6.574218 5.875-10.972656 6.242187-.414062.035157-.828125.050782-1.242187.050782zm-227.085938-263.296875 224.472657 224.46875c13.75-24.492188 20.945312-51.96875 20.945312-80.417969 0-90.980469-74.019531-165-165-165-28.449219 0-55.921875 7.195312-80.417969 20.949219zm0 0" />
                        <path d="m256 451c-107.523438 0-195-87.476562-195-195 0-40.746094 12.488281-79.804688 36.117188-112.953125 2.5625-3.59375 6.574218-5.875 10.972656-6.242187 4.386718-.367188 8.730468 1.222656 11.847656 4.34375l250.914062 250.914062c3.121094 3.117188 4.710938 7.453125 4.34375 11.847656-.367187 4.398438-2.648437 8.410156-6.242187 10.972656-33.148437 23.628907-72.210937 36.117188-112.953125 36.117188zm-144.054688-275.417969c-13.75 24.492188-20.945312 51.96875-20.945312 80.417969 0 90.980469 74.019531 165 165 165 28.449219 0 55.921875-7.195312 80.417969-20.949219zm0 0" />
                    </g>
                </svg>
                <p>No document is here, yet!</p>
                <p><a href="?page=upl">If You Have One. Please Add For Others.</a></p>
            </div>
        <?php
        }
        ?>
    </div>
</div>