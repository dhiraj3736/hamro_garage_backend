
<?php
if (isset($_POST['garage_name'])&& isset($_POST['available_time'])&& isset($_POST['mobile'])&& isset($_POST['service'])&& isset($_POST['location'])&& isset($_POST['u_id']))  {
   include 'conn.php';
    include 'validate.php';

   $garage_name = validate($_POST['garage_name']);
    $available_time = validate($_POST['available_time']);
    $mobile = validate($_POST['mobile']);
    $service = validate($_POST['service']);
    $location = validate($_POST['location']);
     $u_id=$_POST['u_id'];
   
     

     $sql = "INSERT INTO garage_info (garage_name,available_time,mobile,service,location,s_id) VALUES ('$garage_name','$available_time','$mobile','$service','$location','$u_id')";

    if (!$conn->query($sql)) {
        echo "failure";
    } else {
        echo "success";
    }
}

?>
