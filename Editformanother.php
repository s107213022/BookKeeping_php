<?php
session_start();
require("dbconnect.php");
$id = (int)$_POST['id'];
$sql = "select * from mymoney where id = $id;";
$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
$rs = mysqli_fetch_assoc($result);
?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script language="javascript">
        function Addyoueditanother() {
            $.ajax({
                type: "POST",
                url: "Edit.php",
                data: $('#add').serialize(),
                success: function() {
                    alert("輸入完畢");
                    $('#main').html(response);
                },
                error: function() {
                    alert("請重新輸入");
                }
            });
        }
    </script>
</head>

<body>
    <h1>修改內容</h1>
    <form id="add" method="post">
        title: <select name="event" type="select" id="event" />
        <option value='餐費'>餐費</option>
        <option value='購物'>購物</option>
        <option value='交通費'>交通費</option>
        <option value='其他'>其他</option>
        </select>
        <input type='hidden' name='id' value='<?php echo $id ?>'>
        money: <input name="money" type="text" id="money" value="<?php echo htmlspecialchars($rs['money']); ?>" /> <br>
        content: <input name="content" type="text" id="content" value="<?php echo htmlspecialchars($rs['content']); ?>" /> <br>
        time: <input name="time" type="datetime-local" id="time" value="<?php echo htmlspecialchars($rs['time']); ?>" /><br>

        <input type="submit" name="Submit" value="送出" onclick="Addyoueditanother()" />
    </form>
    </table>
</body>

</html>