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


class aaa{
function connectMysql()
{
    $con=mysqli_connect("localhost", "root", "1234", "aaa");
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    return $con ;
}

function viewall()
{
     
    $con = call_user_func('aaa::connectMysql');

    $result = mysqli_query($con, "SELECT * FROM aaa");

    mysqli_close($con);
    //          return $result;
     
    return $result;
     
}
}

class view
{
    private $data;

    public function __construct($result1, $template)
    {
         include "$template";
    }
}

$result = call_user_func('aaa::viewall');

return new view($result, "album.php");

