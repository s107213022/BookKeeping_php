<?php
require("dbconnect.php");
$sql = "select sum(money) from mymoney where status = '收入' ;";
$i = mysqli_query($conn, $sql) or die("MySQL query error");
$increase = mysqli_fetch_assoc($i);
$sql1 = "select sum(money) from mymoney where status = '支出' ;";
$d = mysqli_query($conn, $sql1) or die("MySQL query error");
$decrease = mysqli_fetch_assoc($d);
$total = $increase['sum(money)'] - $decrease['sum(money)'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>無標題文件</title>
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <style>
        #a {
            font-family: 微軟正黑體;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div id=a>
        <p>你這個月還有<?php echo $total; ?> !! </p>
        <?php
        if ($total < 2000) {
            echo "你快窮死了，不要再浪費錢了!!";
        } else if ($total > 10000) {
            echo "你還很多錢，花起來!!";
        } else {
            echo "小心點花，不然一不小心就要吃吐了!";
        }
        ?>
        <br>
        <div id=a><button onclick='Addpay()'>Addpay</button>
            <button onclick='Addincome()'>Addincome</button>
            <button onclick='Adddebt()'>Adddebt</button>
            <button onclick='Addcredit()'>Addcredit</button> <br>
            <button onclick='showall1()'>你的支出與收入</button>
            <button onclick='showdebt1()'>別人欠的錢錢</button>
            <button onclick='showcredit1()'>我欠別人的錢錢</button>
            <button onclick='showcancel()'>結算的(不是這個月的)</button>
            
        </div>
        <button onclick="window.location.href = 'logout.php';">登出</button> <!-- 修改登出按鈕的 onclick -->

    </div>
</body>

</html>