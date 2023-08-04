<?php
include 'conn.php';
include 'validate.php';


if (isset($_POST['searchText'])) {
    $searchText=$_POST['searchText'];
}

// where u_id='$userid'


$result=array();
$result['data']=array();


$select= "select * from garage_info";
$responce= mysqli_query($conn,$select);

while($row=mysqli_fetch_array($responce)){
    $index['garage_name']=$row['garage_name'];
    $index['location']=$row['location'];

    $algorithmTest=diceCoefficient($searchText,$row['location']);
    //$algorithmTest=diceCoefficient("kathman","kathmandj");
    if($algorithmTest){
        array_push($result['data'], $index);
    }





// Test t


}
$result["success"]="1";
echo json_encode($result);

function diceCoefficient($inputString, $databaseString, $threshold = 0.5) {

    // Convert input strings to lowercase
    $inputString = strtolower($inputString);
    $databaseString = strtolower($databaseString);

    // Get n-grams of characters (bi-grams) from input and database strings
    $inputNGrams = getNGrams($inputString, 2);
    $databaseNGrams = getNGrams($databaseString, 2);

    // Calculate the size of the intersection and union of n-grams sets
    $intersection = count(array_intersect($inputNGrams, $databaseNGrams));
    $union = count($inputNGrams) + count($databaseNGrams);

    // Calculate Dice Coefficient
    $diceCoefficient = 2 * $intersection / $union;

    return $diceCoefficient >= $threshold;
}
function getNGrams($string, $n) {
    $nGrams = [];
    $length = strlen($string);

    for ($i = 0; $i < $length - $n + 1; $i++) {
        $nGrams[] = substr($string, $i, $n);
    }

    return $nGrams;
}
?>