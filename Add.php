<?php
require("dbconnect.php");
$content = mysqli_real_escape_string($conn, $_POST['content']);
$event = mysqli_real_escape_string($conn, $_POST['event']);
$money = (int)mysqli_real_escape_string($conn, $_POST['money']);
$status = mysqli_real_escape_string($conn, $_POST['status']);
if ($event) {
	$sql = "insert into mymoney (event,money, content,time,status) values ('$event', '$money','$content', NOW(),'$status');";
	mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL*/
} else {
	echo "Message title cannot be empty";
}
