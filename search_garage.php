<?php
include 'conn.php';

if (isset($_POST['search_query'])) {
    $search_query = $_POST['search_query'];

    $result = array();
    $result['data'] = array();

    // Perform the search query in the garage_info table
    $select = "SELECT * FROM garage_info WHERE garage_name LIKE '%$search_query%' OR location LIKE '%$search_query%'";
    $responce = mysqli_query($conn, $select);

    if (mysqli_num_rows($responce) > 0) {
        while ($row = mysqli_fetch_array($responce)) {
            $index['garage_name'] = $row['garage_name'];
            $index['location'] = $row['location'];
            $index['latitude'] = $row['latitude'];
            $index['longitude'] = $row['longitude'];

            array_push($result['data'], $index);
        }
        $result["success"] = true;
        echo json_encode($result);
    } else {
        // No matching results found
        $result["success"] = false;
        echo json_encode($result);
    }
}
?>
