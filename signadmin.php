
<?php
include_once "dbConnection.php";
$ref = @$_GET["q"];

$teacher_name = $_POST["name"];
$teacher_name = ucwords(strtolower($teacher_name));
$teacher_username = $_POST["email"];
$teacher_password = $_POST["password"];
$subject = $_POST["subject"];
$dept = $_POST["department"];
$semester = $_POST["semester"];

$q = mysqli_query(
    $con,
    "INSERT INTO teacher_info VALUES  ('$teacher_name','$teacher_username','$teacher_password','$subject','$dept','$semester','admin')"
);
// $q=mysqli_query($con,"INSERT INTO teacher_info (teacher_name, teacher_username, teacher_password,role) VALUES  ('$teacher_name','$teacher_username','$teacher_password','admin')");

header("location:headdash.php?q=3.2");


?>
