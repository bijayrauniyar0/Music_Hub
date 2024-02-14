<?php

include '../partials/_dbconnect.php';

// Check if handle exists in the database
if(isset($_POST['handle'])) {
    $handle = "@" . $_POST['handle']; // Prepend "@" to the handle
    // Assume $conn is your database connection
    $sql = "SELECT * FROM artists WHERE handle = '$handle'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        $response = array(
            'status' => 'exists' // Handle exists
        );
    } else {
        $response = array(
            'status' => 'available' // Handle is available
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    $response = array(
        'status' => 'error' // Handle parameter not set
    );
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
