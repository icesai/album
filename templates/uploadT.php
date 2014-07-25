<html>
<body>

	<form action="<?php echo $result; ?>" method="post" enctype="multipart/form-data">
		圖片名稱:<input type="text" name="imgname" id="imgname" /><br /> 上傳者名稱:<input
			type="text" name="username" id="username" /><br /> <input type="file"
			name="file" id="file" /> <input type="submit" name="submit"
			value="上傳檔案" />
	</form>
	<input type='button' onclick="location.href='bbb.php'" value='瀏覽頁'>
</body>
</html>

