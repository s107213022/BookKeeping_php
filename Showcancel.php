<?php
session_start();
require("dbconnect.php");
$status = mysqli_real_escape_string($conn, $_POST['status']);
if (isset($_POST['status'])) {
    if ($status == 10) {
        $sql = "select * from `mymoney` where `status` = '收入' or status = '支出' order by status DESC,money DESC;";
    } else {
        $sql = "select * from `mymoney` where `status`= '$status' order by money DESC;";
    }
}
$result = mysqli_query($conn, $sql);
$rows = array();
while ($rs = mysqli_fetch_assoc($result)) {
    $rows[] = $rs;
};

echo json_encode($rows);
