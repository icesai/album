<?php
if ($_FILES["file"]["error"] > 0) {

    echo "Error: " . $_FILES["file"]["error"];
} else {
    if (file_exists("img/" . $_FILES["file"]["name"])) {

        echo "已有相同檔案名稱，請勿重覆上傳相同檔案或更改檔案名稱";
    } else {
        echo "相片名稱: " . $_POST["imgname"]."<br/>";
        echo "上傳者名稱: " . $_POST["username"]."<br/>";
        move_uploaded_file($_FILES["file"]["tmp_name"], "img/".$_FILES["file"]["name"]);
        $con=mysqli_connect("localhost", "root", "1234", "aaa");
        if (mysqli_connect_errno()) {

            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $tmpname = mysqli_real_escape_string($con, $_FILES["file"]["name"]);
        $imgname = mysqli_real_escape_string($con, $_POST["imgname"]);
        $username = mysqli_real_escape_string($con, $_POST["username"]);
        $sql="INSERT INTO aaa (tmpname, imgname, username)
        VALUES ('$tmpname', '$imgname', '$username')";
        if (!mysqli_query($con, $sql)) {

            die('Error: ' . mysqli_error($con));
        }
        mysqli_close($con);
    }
}
