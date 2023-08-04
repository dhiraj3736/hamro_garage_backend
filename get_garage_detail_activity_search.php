<?php
include 'conn.php';
include 'validate.php';

if (isset($_POST['garage_name'])) {
    $garage_name = $_POST['garage_name'];



    $result=array();
    $result['data']=array();


    $select = "SELECT * FROM garage_info WHERE garage_name = '$garage_name'";
    $responce= mysqli_query($conn,$select);

    while($row=mysqli_fetch_array($responce)){
        $index['id']=$row['0'];
        $index['garage_name']=$row['1'];
        $index['mobile']=$row['3'];
        $index['service']=$row['4'];
        $index['location']=$row['5'];



        array_push($result['data'], $index);
    }
    $result["success"]="1";
    echo json_encode($result);

}

?>