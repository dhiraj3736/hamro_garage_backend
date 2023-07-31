<?php
include 'conn.php';
include 'validate.php';

// Check if latitude and longitude are provided in the POST request
if (isset($_POST['latitude']) && isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

<<<<<<< HEAD
    // Make a query to fetch the garage details based on latitude and longitude
    $query = "SELECT * FROM garage_info WHERE latitude = '$latitude' AND longitude = '$longitude'";
    $response = mysqli_query($conn, $query);

    if (mysqli_num_rows($response) > 0) {
        $row = mysqli_fetch_assoc($response);
        $result = array(
            "garage_name" => $row['garage_name'],
            "mobile" => $row['mobile'],
            "service" => $row['service'],
            "location" => $row['location']
        );

        // Return the garage details as a JSON response
        header('Content-Type: application/json');
        echo json_encode($result);
    } else {
        // Handle the case where no garage details are found for the given latitude and longitude
        $result = array("error" => "Garage details not found");
        header('Content-Type: application/json');
        echo json_encode($result);
    }
} else {
    // Handle the case where 'latitude' and 'longitude' parameters are not provided in the POST request
    $result = array("error" => "Invalid request");
    header('Content-Type: application/json');
    echo json_encode($result);
}
=======
  
$result=array();
$result['data']=array();


 $select = "SELECT * FROM garage_info WHERE latitude = '$latitude' AND longitude = '$longitude'";
$responce= mysqli_query($conn,$select);

while($row=mysqli_fetch_array($responce)){
    $index['garage_name']=$row['1'];
    $index['mobile']=$row['3'];
    $index['service']=$row['4'];
    $index['location']=$row['5'];
    

    array_push($result['data'], $index);
}
$result["success"]="1";
echo json_encode($result);

}

>>>>>>> 038627107374edaa65120e7e5cf49b201536057b
?>