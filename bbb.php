<?php
$con=mysqli_connect("localhost", "root", "1234", "aaa");
if (mysqli_connect_errno()) {

    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con, "SELECT * FROM aaa");
?>
<input
	type='button' onclick="location.href='aaa.php'" value='上傳頁'>
<?php
echo "<table border='1'>
<tr>
<th>時間</th>
<th>圖片名稱</th>
<th>圖片</th>
<th>上傳者</th>
</tr>";

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['time'] . "</td>";
    echo "<td>" . $row['imgname'] . "</td>";
    echo "<td><img src='img/" . $row['tmpname'] . "' ></td>";
    echo "<td>" . $row['username'] . "</td>";
    echo "</tr>";
}

echo "</table>";

mysqli_close($con);
