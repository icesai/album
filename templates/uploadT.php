<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>

	<form action="<?php echo $result; ?>" method="post" enctype="multipart/form-data">
		圖片名稱:<input type="text" name="imgname" id="imgname" /><br /> 
		上傳者名稱:<input type="text" name="username" id="username" /><br /> 
			<input type="file"name="file" id="file" /> 
			<input type="submit" name="submit"value="上傳檔案" />
	</form>
	<input type='button' onclick="location.href='albumC.php'" value='瀏覽頁' />
	<input type='button' onclick="location.href='editalbumC.php'" value='編輯頁'></input>
</body>
</html>

