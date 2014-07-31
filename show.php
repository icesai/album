<?php
// include 'db.php';

// switch ($a)
// {
//     case null:
//         $result1=call_user_func('MyClass::view');
//         include 'album.php';
//         break;

//     case a:
//         include 'upimg.php';
//         break;
// 


// class view
// {
//     private $data;
    
//     public function __construct($result1, $template)
//     {
//          include "$template";
//     }
   
// }

// function connectMysql()
// {
//       $con=mysqli_connect("localhost", "root", "1234", "aaa");
//         if (mysqli_connect_errno()) {
//             echo "Failed to connect to MySQL: " . mysqli_connect_error();
//         }
//     return $con;
// }

// $con=call_user_func('connectMysql');

// $result = mysqli_query($con, "SELECT * FROM aaa");

// mysqli_close($con);

// return new view($result, "album.php");


// class aaa{
// function connectMysql()
// {
//     $con=mysqli_connect("localhost", "root", "1234", "aaa");
//     if (mysqli_connect_errno()) {
//         echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     }
//     return $con ;
// }

// function viewall()
// {
     
//     $con = call_user_func('aaa::connectMysql');

//     $result = mysqli_query($con, "SELECT * FROM aaa");

//     mysqli_close($con);
//     //          return $result;
     
//     return $result;
     
// }
// }

// class view
// {
//     private $data;

//     public function __construct($result1, $template)
//     {
//          include "$template";
//     }
// }

// $result = call_user_func('aaa::viewall');

// return new view($result, "album.php");



//edit.php
// $counter = 1;
// while ($row = mysqli_fetch_array($result)) {
//     echo "<tr>";
//     echo "<td>" . $row['time'] . "</td>";
//     echo "<td><input type='text' name='imgname_{$counter}' id='imgname_{$counter}'
//     value='" . $row['imgname'] . "'>
//     <input type='button'
//     onclick='location.href=\"editalbum2C.php?imgno=".$row['imgno']."&imgname=\"+view1.imgname_{$counter}.value'
//     value='修改' /></td>";
//     echo "<td><img src='../../img/" . $row['tmpname'] . "' ></td>";
//     echo "<td>" . $row['username'] . "</td>";
//     echo "<td> <input type='checkbox' name='imgno[]' id='imgno[]' value='".$row['imgno']. "'></td>";
//     echo "</tr>";
//     $counter++;
// }
