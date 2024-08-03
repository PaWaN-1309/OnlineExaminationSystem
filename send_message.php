<?php
session_start();
ob_start();
require_once "dbConnection.php";

$username = $_SESSION["name"];
$message = $_POST["message-text"];
$time = date("h:i:s a");
$prev_page = $_SERVER["HTTP_REFERER"];
// Insert the text value and current time into the MySQL table
$sql = "INSERT INTO chat (from_user, sent_at, text_message) VALUES ('$username',  '$time', '$message')";

if (!mysqli_query($con, $sql)) {
    echo "Error";
} else {
    header("Location: $prev_page");
}
mysqli_close($con);
ob_end_flush();
?>
