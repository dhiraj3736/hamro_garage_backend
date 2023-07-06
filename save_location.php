<?php
require"conn.php";
if (isset($_POST['latitude']) && isset($_POST['longitude'])&&isset($_POST['longitude'])) {
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];
    $userid=$_POST['u_id'];
    $query = "INSERT INTO garage_location (latitude, longitude,s_id) VALUES ('$latitude', '$longitude','$userid')";
    $result = mysqli_query($conn, $query);

    if ($result) {

        echo "success";
    } else {

        echo "error";
    }
} else {

    echo "missing_coordinates";
}


?>