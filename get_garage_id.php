<?php
include 'conn.php';
    include 'validate.php';
   

if (isset($_POST['u_id'])) {
	$userid=$_POST['u_id'];
	
	# code...
}
 // where u_id='$userid'


$result=array();
$result['data']=array();


$select= "select id from garage_info where s_id=$userid";
$responce= mysqli_query($conn,$select);

while($row=mysqli_fetch_array($responce)){
	$index['g_id']=$row['id'];
	
	
	

	array_push($result['data'], $index);
}
$result["success"]="1";
echo json_encode($result);



?>