<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script language="javascript">
        function Addyoudebt() {
            $.ajax({
                type: "POST",
                url: "Add.php",
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
    <h1>新增負債</h1>
    <form id="add" method="post">
        title: <select name="event" type="select" id="event" />
        <option value='餐費'>餐費</option>
        <option value='購物'>購物</option>
        <option value='交通費'>交通費</option>
        <option value='其他'>其他</option>
        </select>
        <input name="status" type="hidden" id="status" value="負債" />
        money: <input name="money" type="text" id="money" /> <br>
        content: <input name="content" type="text" id="content" /> <br>

        <input type="submit" name="Submit" value="送出" onclick="Addyoudebt()" />
    </form>
    </table>
</body>

</html>