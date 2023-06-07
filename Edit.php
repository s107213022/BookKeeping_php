<?php
require("dbconnect.php");
$event = mysqli_real_escape_string($conn, $_POST['event']);
$money = (int)$_POST['money'];
$content = mysqli_real_escape_string($conn, $_POST['content']);
$id = (int)$_POST['id'];
$time = mysqli_real_escape_string($conn, $_POST['time']);

if ($event) { //if title is not empty
    $sql = "update mymoney set event='$event',money='$money', content='$content', time='$time' where id=$id;";
    mysqli_query($conn, $sql) or die("Insert failed, SQL query error"); //執行SQL
    echo "Message updateded";
} else {
    $msg = "Message title cannot be empty";
}
