<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>

<body>

<input	type='button' onclick="location.href='uploadC.php'" value='上傳頁'></input>
<input type='button' onclick="location.href='albumC.php'" value='瀏覽頁'></input>
<form action="delimgC.php"  method="post">
<table border='1'>
<tr>
<th>時間</th>
<th>圖片名稱</th>
<th>圖片</th>
<th>上傳者</th>
<th>刪除</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td><input type='text' name='imgname".$row['imgno']."' id='imgname".$row['imgno']."
    ' value='" . $row['imgname'] . "'>
    <input type='button' onclick='location.href='editalbum2C.php'' value='修改'></input></td>";
    echo "<td><img src='../../img/" . $row['tmpname'] . "' ></td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "<td> <input type='checkbox' name='imgno[]' id='imgno[]' value='".$row['imgno']. "'></td>";
    echo "</tr>";
}
?>
</table>
<input type="submit" name="submit" value="確認刪除" />
</form>
</body>
</html>