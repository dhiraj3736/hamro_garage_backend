<?php
include 'conn.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['customer_id']) && isset($_POST['garage_id']) && isset($_POST['feedback'])) {
        $customer_id = $_POST['customer_id'];
        $garage_id = $_POST['garage_id'];
        $feefback = $_POST['feedback'];

        $insert = "INSERT INTO feedback (s_id, g_id, feedback) VALUES ('$customer_id','$garage_id','$feefback')";
        $result = mysqli_query($conn, $insert);
        if ($result){
            echo"success";
        }else{
            echo "failed";
        }
    }
}
?>