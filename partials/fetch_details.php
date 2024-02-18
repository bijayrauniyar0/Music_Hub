<?php
include '../partials/_dbconnect.php';
$inputJSON = file_get_contents('php://input');

// Decode the JSON data
$data = json_decode($inputJSON);

// Access the data sent from JavaScript
$songName = $data->key1;
$sql = "SELECT * FROM `uploaded_data` WHERE audio= '$songName' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$songThumbnail = $row['thumbnail'];



// Process the data (e.g., save it to a database)
// Example: echo back the received data
echo $songThumbnail;

?>
