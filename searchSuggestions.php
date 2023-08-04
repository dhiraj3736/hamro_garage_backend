<?php
global $conn;
include 'conn.php';
include 'validate.php';

// Check if latitude and longitude are provided in the POST request

    $result=array();
    $result['data']=array();


    $select = "SELECT DISTINCT location FROM garage_info";

    $responce= mysqli_query($conn,$select);

    while($row=mysqli_fetch_array($responce)){
        $index['location']=$row['location'];
        array_push($result['data'], $index);
    }
    $result["success"]="1";
    echo json_encode($result);



?>