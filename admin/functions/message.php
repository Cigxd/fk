<?php
include '../../database/config.php';

$query = "SELECT * FROM `contact`";

////////////////////////////////////start calculating unseen messages
$starred = 0;
$sql_messages = mysqli_query($conn, $query);
if (mysqli_num_rows($sql_messages) > 0) {
    while ($row = mysqli_fetch_assoc($sql_messages)) {
        if ($row['starred'] == 1) {
            $starred++;
        }
    }
}
////////////////////////////////////end calculating unseen messages

////////////////////////////////////start calculating how much been
function time_diff_in_words($receive_at)
{
    $receive_time = strtotime($receive_at);
    $current_time = time();
    $time_difference = $current_time - $receive_time;
    if($time_difference > 60 * 60 * 24 * 365 * 100){
        return floor($time_difference / (60 * 60 * 24 * 365 * 100)) . " century ago";
    }elseif ($time_difference > 60 * 60 * 24 * 365) {
        return floor($time_difference / (60 * 60 * 24 * 365)) . " years ago";
    } elseif ($time_difference > 60 * 60 * 24) {
        return floor($time_difference / (60 * 60 * 24)) . " days ago";
    } elseif ($time_difference > 60 * 60) {
        return floor($time_difference / (60 * 60)) . " hours ago";
    } elseif ($time_difference > 60) {
        return floor($time_difference / 60) . " minutes ago";
    } else {
        return "just now";
    }
}
////////////////////////////////////end calculating how much been

////////////////////////////////////action delete and star at message
if (isset($_POST['trash']) && !empty($_POST['message_ids'])) {
    // Prepared statement to delete messages
    $message_delete = $conn->prepare("DELETE FROM contact WHERE message_id = ?");

    foreach ($_POST['message_ids'] as $message_id) {
        $message_delete->bind_param("i", $message_id);
        $message_delete->execute();
    }

    $message_delete->close();
}

$message_query = "SELECT * FROM contact";
$sql_messages = mysqli_query($conn, $message_query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <form action="message.php" method="POST">
        <div class="container bootdey">
            <div class="email-app mb-4">
                <nav>
                    <a href="mailto:#" class="btn btn-danger btn-block name="email"> New Email </a>
                    <ul class="nav">
                        <?php
                        $query_unseen = "SELECT * from contact where seen=0";
                        $sql = mysqli_query($conn,$query_unseen);
                        echo '
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-inbox"></i> Inbox 
                                <span class="badge badge-danger">' . mysqli_num_rows($sql) . '</span></a>
                            </li>
                            
                            ';
                        ?>
                    </ul>
                </nav>
                <main class="inbox">
                    <div class="toolbar">
                        <button type="submit" class="btn btn-light" name="trash">
                            <span class="fa fa-trash-o"></span>
                        </button>
                        
                        <div class="btn-group">
                        </div>
                    </div>
                    <ul class="messages">
                        <ul class='messages-list'>
                            <?php
                            unset($sql_messages);
                            $sql_messages = mysqli_query($conn, $query);

                            if (mysqli_num_rows($sql_messages) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_messages)) {
                                    echo "<li class='message'>
                                            <a>
                                                <div class='actions'>
                                                    <span class='action'><input type='checkbox' name='message_ids[]' value='{$row['message_id']}'></span>
                                                </div>
                                                <div class='header'>
                                                    <span class='from'>{$row['name']}</span>
                                                    <span class='date'>" . time_diff_in_words($row['receive_at']) . "</span>
                                                </div>
                                                <div class='title'>
                                                    {$row['subject']}
                                                </div>
                                                <div class='description'>
                                                    {$row['message']}
                                                </div>
                                            </a>
                                        </li>";
                                }
                            }
                            ?>
                        </ul>
                    </ul>
                </main>
            </div>
        </div>
    </form>
</body>

</html>