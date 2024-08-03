<?php
ob_start();
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
require "DataSource.php";
$db = new DataSource();
$con = $db->getConnection();

require_once "./vendor/autoload.php";

if (isset($_POST["import"])) {
    $dept_sf = $_POST["department"];
    $sem = $_POST["semester"];

    $allowedFileType = [
        "application/vnd.ms-excel",
        "text/xls",
        "text/xlsx",
        "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $targetPath = "uploads/" . $_FILES["file"]["name"];
        move_uploaded_file($_FILES["file"]["tmp_name"], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i++) {
            $roll = "";
            if (isset($spreadSheetAry[$i][0])) {
                $roll = mysqli_real_escape_string($con, $spreadSheetAry[$i][0]);
            }
            $name = "";
            if (isset($spreadSheetAry[$i][1])) {
                $name = mysqli_real_escape_string($con, $spreadSheetAry[$i][1]);
            }
            $usern = "";
            if (isset($spreadSheetAry[$i][2])) {
                $usern = mysqli_real_escape_string(
                    $con,
                    $spreadSheetAry[$i][2]
                );
            }
            $pass = "";
            if (isset($spreadSheetAry[$i][3])) {
                $pass = mysqli_real_escape_string($con, $spreadSheetAry[$i][3]);
            }

            if (
                !empty($roll) ||
                !empty($name) ||
                !empty($usern) ||
                !empty($pass)
            ) {
                $query =
                    "insert into student_info(dept_sf,semester,stud_roll,stud_name,stud_username,stud_password) values(?,?,?,?,?,?)";
                $paramType = "ssssss";
                $paramArray = [$dept_sf, $sem, $roll, $name, $usern, $pass];
                $insertId = $db->insert($query, $paramType, $paramArray);

                if (empty($insertId)) {
                    header("Location:headdash.php?q=1.2");
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
ob_end_flush();
?>
