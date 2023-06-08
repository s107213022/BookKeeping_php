<?php
require("dbconnect.php");
session_start();

function sanitize($data) {
    // 使用 mysqli_real_escape_string 函式對資料進行處理以防止 SQL 注入攻擊
    global $conn;
    return mysqli_real_escape_string($conn, $data);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $account = $_POST['account'];
    $password = $_POST['password'];

    // 對輸入進行必要的處理，例如消毒和加密
    $account = sanitize($account);
    $password = sanitize($password);
    htmlspecialchars($account);
    htmlspecialchars($password);

    // 查詢資料庫檢查用戶
    $sql = "SELECT * FROM `user` WHERE `account` = '$account' AND `password` = '$password'";
    $result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");

    if ($result->num_rows > 0) {
        // 登入成功
        $_SESSION['account'] = $account; // 將使用者名稱存入 session 變數中
        header("Location: mymoney.html"); // 跳轉到登入成功後的頁面
        exit;
    } else {
        // 登入失敗
        echo "登入失敗，請重新輸入！";
    }
}
?>