<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<input	type='button' onclick="location.href='aaa.php'" value='上傳頁'>
</input>
<table border='1'>
<tr>
<th>時間</th>
<th>圖片名稱</th>
<th>圖片</th>
<th>上傳者</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result1)) {
    echo "<tr>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['imgname'] . "</td>";
    echo "<td><img src='../../img/" . $row['tmpname'] . "' ></td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "</tr>";
}
?>
</table>
</body>
</html>
