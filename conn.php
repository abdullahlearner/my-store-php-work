<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "shop_db";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("connection failed". $conn->connect_error);
    }
    // else{
    //     echo "database connected";
    // }



    // echo "Database Connected";


//    $conn =  mysqli_connect($servername,$username,$password,$dbname);

//     if($conn){
//         echo "Database Connected";
//     }else{
//         echo "Error".mysqli_error($conn);
//     }


?>