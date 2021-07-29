<?php

if (isset($_GET['note_id'])) {
    $note_id = $_GET['note_id'];
    include("C:/xampp/htdocs/practice/Note_Hub/connect.php");
    // notes_db
    $query_1 = "SELECT * FROM `all_notes` WHERE `id` =$note_id LIMIT 1 ";
    $result = mysqli_query($link, $query_1);
    $notes = mysqli_fetch_assoc($result);
    $view_count_now = $notes['views'];
    $user_id = $notes['user_id'];
    // user _db
    if (isset($_GET['usr_id'])) {
        // $user_id = $_GET['usr_id'];
        $query = "SELECT * FROM `user_db` WHERE `id` = $user_id LIMIT 1";
        $result = mysqli_query($link, $query);
        $user = mysqli_fetch_assoc($result);
        //views_db
        $view_qur = mysqli_query($link, "SELECT * FROM `views` WHERE `user_id`=$user_id AND `note_id`=$note_id LIMIT 1");
        $view_count = mysqli_num_rows($view_qur);

        if ($view_count == 0) {
            $view_count_now = $view_count_now + 1;
            $insert = mysqli_query($link, "INSERT INTO `views`( `user_id`,`note_id`) VALUES('$user_id','$note_id') ");
            $update_view = mysqli_query($link, "UPDATE `all_notes` SET `views` = '" . mysqli_real_escape_string($link, $view_count_now) . "' WHERE `id`=" . $note_id . " LIMIT 1");
        }
        $views_count_usr = mysqli_query($link, "SELECT `views` FROM `all_notes` where `user_id` = '" . $user_id . "' ");
        $total_views = 0;
        if (mysqli_num_rows($views_count_usr) > 0) {
            while ($views = mysqli_fetch_assoc($views_count_usr)) {
                $x = $views['views'];
                $total_views = $total_views + $x;
            }
        }
        $update_views_count = mysqli_query($link, "UPDATE `user_db` SET `total_views` = $total_views WHERE `id`='" . $user_id . "' LIMIT 1");
    }
}


if (isset($_POST['hello'])) {
    $msg = $_POST['message_1'];
    $myfile = fopen("abc.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $_POST['message_1']);
    fclose($myfile);
    $command_exec = escapeshellcmd('a.py');
    $str_output = shell_exec($command_exec);
    header("Refresh:0");
    // header("Refresh:0");
}

?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body style="margin: 0%;">
    <div style="margin-top: 10px; margin-bottom: 0%;">
        <form method="POST">
            <div class="form-row">
                <div class="col-md-8" style="margin-top: 12px;">
                    <input type="text" name="message_1" class="form-control" id="exampleInput" placeholder="Enter text hear to convert into audio">
                </div>
                <div class="col-md-1" style="margin-top: 12px;">
                    <button type="submit" name="hello" style="width: 100%;" class="btn btn-primary ">GO!</button>
                </div>
                <div style="margin-top: 5px;">
                    <audio src="http://localhost/practice/Note_Hub/after_login/test.mp3" type="audio/mp3" controls>
                        I'm sorry. You're browser doesn't support HTML5 <code>audio</code>.
                    </audio>
                </div>
            </div>
        </form>
    </div>


    <div>
        <?php if (isset($_GET['pdf'])) { ?>
            <embed src="http://localhost/practice/Note_Hub/temp_doc/<?php echo $_GET['fn']; ?>" type="application/Pdf" width="100%" height="100%" />
        <?php } else { ?>
            <embed src="http://localhost/practice/Note_Hub/doc_upload/<?php echo $_GET['fn']; ?>" type="application/Pdf" width="100%" height="100%" />
        <?php } ?>

    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>


</html>