<?php
// 啟動 session
session_start();

// 銷毀所有的 session 變量
$_SESSION = array();

// 如果要徹底銷毀 session，則除了重置 session 數據，還必須刪除 session 的用戶 cookie
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 最後，銷毀 session
session_destroy();

// 將用戶重定向到登錄頁面
header("Location: /");
exit;
?>