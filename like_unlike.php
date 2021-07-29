<?php
include("connect.php");

$query = "SELECT * FROM `user_db` WHERE `id` = '" . mysqli_real_escape_string($link, $_SESSION['id']) . "' LIMIT 1";
$result = mysqli_query($link, $query);
$user = mysqli_fetch_assoc($result);

$like_count = mysqli_query($link, "SELECT * FROM `likes`");
$count_likes = mysqli_num_rows($like_count);


$query_1 = "SELECT * FROM `all_notes` WHERE `id` = '" . $_GET['note_id'] . "' LIMIT 1 ";
$result = mysqli_query($link, $query_1);
$notes = mysqli_fetch_assoc($result);

$user_id = $user['id'];
$notes_id = $notes['id'];

if ($_GET['li']) {
    $lik = $_GET['li'];
    $notes_like = $notes['likes'];
    // $update_like = "";
    if ($lik == 'dis') {

        if ($notes_like > 0) {
            $notes_like = $notes_like - 1;
            $update_like = "UPDATE `all_notes` SET `likes` = '" . mysqli_real_escape_string($link, $notes_like) . "' WHERE `id`=" . $notes_id . " LIMIT 1";
            $insert = mysqli_query($link, $delete_item = "DELETE FROM `likes` WHERE `user_id` = '" . $user_id . "' AND `doc_id` = '" . $notes_id . "' ");
        }

    } 
    if ($lik == 'lik') {
        $query_1 = "SELECT * FROM `likes` WHERE `user_id` = '" . $user_id . "' ";
        $result_1 = mysqli_query($link, $query_1);

        if (mysqli_num_rows($result_1) > 0) {
            $notes_like = $notes_like + 1;
            while ($check_like = mysqli_fetch_assoc($result_1)) {
                if ($check_like['doc_id'] != $notes_id) {
                    $insert = mysqli_query($link, "INSERT INTO `likes`( `user_id`,`doc_id`) VALUES('$user_id','$notes_id') ");
                    $update_like = "UPDATE `all_notes` SET `likes` = '" . mysqli_real_escape_string($link, $notes_like) . "' WHERE `id`=" . $notes_id . " LIMIT 1";
                }
            }

        } 
        else {
            $check_like = mysqli_fetch_assoc($result_1);
            $insert = mysqli_query($link, "INSERT INTO `likes`( `user_id`,`doc_id`) VALUES('$user_id','$notes_id') ");
            $notes_like = $notes_like + 1;
            $update_like = "UPDATE `all_notes` SET `likes` = '" . mysqli_real_escape_string($link, $notes_like) . "' WHERE `id`='" . $notes_id . "' LIMIT 1";
        }
    }
    if (mysqli_query($link, $update_like)) {

        if (isset($_GET['branch']) && ($_GET['sem'])) {
            header("Location: http://localhost/practice/Note_Hub/?page=dash&branch=" . $_GET['branch'] . "&sem=" . $_GET['sem'] . "");
        } else if (isset($_GET['sub'])) {
            header("Location: http://localhost/practice/Note_Hub/?page=dash&sub=" . $_GET['sub'] . "");
        } else {
            header("Location: http://localhost/practice/Note_Hub/?page=dash");
        }
    } else {
        echo "";
    }
}
