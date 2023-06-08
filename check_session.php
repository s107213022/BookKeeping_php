<?php
session_start(); // 啟動會話

if (isset($_SESSION['account'])) {
	$response = array("status" => "success");
} else {
	$response = array("status" => "error");
}

echo json_encode($response);
?>