<?php
require("dbconnect.php");

$msgID = (int)$_POST['id'];
$act = $_POST['act'];
if ($msgID > 0) {
	switch ($act) {
		case 'enddebt':
			$sql = "update `mymoney` set `status` = '收入' where id='$msgID';";
			mysqli_query($conn, $sql) or die("MySQL query error"); //執行SQL
			echo "123";
			break;
		case 'endcredit':
			$sql = "update `mymoney` set `status` = '支出' where id='$msgID';";
			mysqli_query($conn, $sql) or die("MySQL query error"); //執行SQL
			echo "123";
			break;
		case 'cancel':
			$sql = "update `mymoney` set `status` = '結算' where id='$msgID';";
			mysqli_query($conn, $sql) or die("MySQL query error"); //執行SQL
			echo "123";
			break;
		default:
			$msg = "Invalid action. Ignored.";
			break;
	}
}
