<?php
session_start();
if(isset($_SESSION["email"])){
session_destroy();
}
include_once 'dbConnection.php';
$ref=@$_GET['q'];
$stud_username = $_POST['email'];
$stud_password = $_POST['password'];

// $stud_password=md5($stud_password); 
$result = mysqli_query($con,"SELECT stud_name, dept_sf, semester FROM student_info WHERE stud_username = '$stud_username' and stud_password = '$stud_password'") or die('Error');
$count=mysqli_num_rows($result);
if($count==1){
while($row = mysqli_fetch_array($result)) {
	$stud_name = $row['stud_name'];
	$dept_sf = $row['dept_sf'];
	$semester = $row['semester'];
}
$_SESSION["name"] = $stud_name;
$_SESSION["email"] = $stud_username;
$_SESSION["dept_sf"] = $dept_sf;
$_SESSION["semester"] = $semester;
header("location:account.php?q=1");
}
else
header("location:$ref?w=Wrong Username or Password");


?>