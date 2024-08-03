<?php
session_start();
ob_start();
include_once "dbConnection.php";
$ref = @$_GET["q"];
$teacher_username = $_POST["uname"];
$teacher_password = $_POST["password"];

($result = mysqli_query(
    $con,
    "SELECT * FROM teacher_info WHERE teacher_username = '$teacher_username' and teacher_password = '$teacher_password' and role = 'admin'"
)) or die("Error");
$count = mysqli_num_rows($result);
if ($count == 1) {
    $row = mysqli_fetch_array($result);
    $name = $row["teacher_name"];
    $subject = $row["sub_sf"];
    $dept = $row["dept_sf"];
    $semester = $row["semester"];
    if (isset($_SESSION["email"])) {
        session_unset();
    }
    $_SESSION["name"] = $name;
    $_SESSION["subject"] = $subject;
    $_SESSION["dept"] = $dept;
    $_SESSION["semester"] = $semester;
    $_SESSION["key"] = "123";
    $_SESSION["email"] = $teacher_username;
    header("location:dash.php?q=0");
} else {
    header("location:$ref?w=Warning : Access denied");
}
ob_end_flush();
?>
