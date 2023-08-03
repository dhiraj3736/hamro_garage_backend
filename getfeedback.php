<?php
include 'conn.php';
    include 'validate.php';
   

if (isset($_POST['g_id'])) {
	$garageid=$_POST['g_id'];
	
	# code...
}
 // where u_id='$userid'


$result=array();
$result['data']=array();


$select= "SELECT user_signup.id,user_signup.fullname,feedback.feedback from user_signup left join feedback on user_signup.id=feedback.s_id where feedback.g_id='$garageid'";
$responce= mysqli_query($conn,$select);

while($row=mysqli_fetch_array($responce)){
	$index['fullname']=$row['fullname'];
	$index['feedback']=$row['feedback'];
	
	

	array_push($result['data'], $index);
}
$result["success"]="1";
echo json_encode($result);



?>