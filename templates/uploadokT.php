<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
    <table>
    <tr>
    <td>圖片名稱</td>
    <td><?php echo $result[1]; ?></td>
    </tr>
    <tr>
    <td>上傳者</td>
    <td><?php echo $result[2]; ?></td>
    </tr>
    </table>
	<input type='button' onclick="location.href='albumC.php'" value='瀏覽頁'>
</body>
</html>
