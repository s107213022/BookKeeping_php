<?php
session_start();
require("dbconnect.php");

if (isset($_POST['status'])) {
	$status = $_POST['status'];
	if ($status == 10) {
		$sql = "select * from `mymoney` where `status` = '支出' or status = '收入' order by `status` DESC ,`money` DESC;";
	} else {
		$sql = "select * from `mymoney` where `status`= '$status';";
	}
}
$result = mysqli_query($conn, $sql) or die("DB Error: Cannot retrieve message.");
$jobStatus = array('收入', '支出', '負債', '欠款', '結算');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>無標題文件</title>
	<style>
		#A {
			font-family: 微軟正黑體;
			font-size: 16px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div id=a>
		<p>請選擇功能</p>
		<table>
			<tr>
				<td>id</td>
				<td>title</td>
				<td>money</td>
				<td>content</td>
				<td>status</td>
				<td>time</td>
				<td>-</td>
			</tr>

			<?php
			while ($rs = mysqli_fetch_assoc($result)) {
				echo "<tr><td>" . $rs['id'] . "</td>";
				echo "<td>", htmlspecialchars($rs['event']), "</td>";
				echo "<td>", ($rs['money']), "</td>";
				echo "<td>", htmlspecialchars($rs['content']), "</td>";
				echo "<td>", htmlspecialchars($rs['status']), "</td>";
				echo "<td>{$rs['time']}</td><td>";
				switch ($rs['status']) {
					case "收入":
						echo "<button onclick='Edit({$rs['id']})'>Edit</button>";
						echo "<button onclick='cancel({$rs['id']})'>Cancel</button>";
						break;
					case "支出":
						echo "<button onclick='Editanother({$rs['id']})'>Edit</button>";
						echo "<button onclick='cancel({$rs['id']})'>Cancel</button>";
						break;
					case "欠錢":
						echo "<button onclick='Editanother({$rs['id']})'>Edit</button>";
						echo "<button onclick='Enddebt({$rs['id']})'>Enddebt</button>";
						echo "<button onclick='cancel({$rs['id']})'>Cancel</button>";
						break;
					case "負債":
						echo "<button onclick='Editanother({$rs['id']})'>Edit</button>";
						echo "<button onclick='Endcredit({$rs['id']})'>Endcredit</button>";
						echo "<button onclick='cancel({$rs['id']})'>Cancel</button>";
						break;
				}
				echo "</td></tr>";
			};
			?>
		</table>
		<div id=A><button onclick='back()'>回主畫面啦</button></div>
	</div>
</body>

</html>