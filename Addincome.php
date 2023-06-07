<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="text/javascript" src="jquery-3.5.1.min.js"></script>
    <script language="javascript">
        function Addyouincome() {
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
    <h1>新增收入</h1>
    <form id="add" method="post">
        title: <select name="event" type="select" id="event" />
        <option value='生活費'>生活費</option>
        <option value='零用錢'>零用錢</option>
        <option value='打工'>打工</option>
        <option value='撿到錢'>撿到錢</option>
        <option value='贊助'>贊助</option>
        <option value='其他'>其他</option>
        </select>
        <input name="status" type="hidden" id="status" value="收入" />
        money: <input name="money" type="text" id="money" /> <br>
        content: <input name="content" type="text" id="content" /> <br>

        <input type="submit" name="Submit" value="送出" onclick="Addyouincome()" />
    </form>
    </table>
</body>

</html>