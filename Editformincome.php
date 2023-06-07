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
        function Addyoueditincome() {
            $.ajax({
                type: "POST",
                url: "Edit.php",
                data: $('#add').serialize(),
                success: function() {
                    alert("輸入完畢");
                    loadURL("main.php");
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
        <option value='生活費'>生活費</option>
        <option value='零用錢'>零用錢</option>
        <option value='打工'>打工</option>
        <option value='撿到錢'>撿到錢</option>
        <option value='贊助'>贊助</option>
        <option value='其他'>其他</option>
        </select>
        <input type='hidden' name='id' value='<?php echo $id ?>'>
        money: <input name="money" type="text" id="money" value="<?php echo htmlspecialchars($rs['money']); ?>" /> <br>
        content: <input name="content" type="text" id="content" value="<?php echo htmlspecialchars($rs['content']); ?>" /> <br>
        <input name="time" type="datetime-local" id="time" value="<?php echo htmlspecialchars($rs['time']); ?>" /><br>

        <input type="submit" name="Submit" value="送出" onclick="Addyoueditincome()" />
    </form>
    </table>
</body>

</html>