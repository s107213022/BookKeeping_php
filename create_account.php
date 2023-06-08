<?php
require("dbconnect.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $account = $_POST['account'];
    $password = $_POST['password'];

    // 查詢資料庫檢查用戶
    $sql = "INSERT into user(name,account,password) values ('$name', '$account','$password');";
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");

    if ($result) {
        //跳出提示訊息，並跳轉到登入頁面
        echo "<script>alert('註冊成功'); location.href = 'index.html';</script>";
        exit();
    } else {
        //彈出視窗，並跳轉到登入頁面
        echo "<script>alert('註冊失敗'); location.href = 'signup.html';</script>";
    }
}
?>