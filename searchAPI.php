<?php
include 'conn.php';
include 'validate.php';

// Check if latitude and longitude are provided in the POST request
if (isset($_POST['searchText']) {
    $searchText = $_POST['searchText'];


    $result=array();
    $result['data']=array();


    $select = "SELECT * FROM garage_info WHERE location='$searchText'";

    $responce= mysqli_query($conn,$select);

    while($row=mysqli_fetch_array($responce)){
        $index['id']=$row['id'];
        $index['garage_name']=$row['garage_name'];
        array_push($result['data'], $index);
    }
    $result["success"]="1";
    echo json_encode($result);

}

?>