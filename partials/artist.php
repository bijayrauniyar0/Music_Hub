<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '../partials/_dbconnect.php';

    $sql2 = "CREATE TABLE IF NOT EXISTS artists (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        stage_name VARCHAR(30) NOT NULL,
        handle VARCHAR(30) NOT NULL NOT NULL UNIQUE,
        Phone_number VARCHAR(15) NOT NULL UNIQUE,
        Email VARCHAR(50) NOT NULL UNIQUE,
        artitImage VARCHAR(50) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $result2 = mysqli_query($conn,$sql2);
    $checkEmailQuery = "SELECT * FROM artists WHERE Email = '".$_SESSION['email']."'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            // $emailExistsError = true;
            echo'stage already exists';
        }
    
    $sql4 = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";
    $result4= mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($result4);

    // Prepare data for insertion
    $stage_name = $_POST['stage_name'];
    $handle = $_POST['handle'];
    $artistImage = $_FILES['image']['name'];

    // Move uploaded file to a directory
    $target_dir = "../images/artists/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $sql5 = "INSERT INTO `artists` (`stage_name`,`handle`,`Phone_number`, `email`, `artistImage`,`created_at`) VALUES ('$stage_name', '@$handle', '".$row4['Phone_number']."','".$_SESSION['email']."','$artistImage',current_timestamp());";
    // Execute SQL statement
    if ($conn->query($sql5) === TRUE) {
        echo'
        <script>
        alert("Congrats! \n Avenue created");
        window.location.href = "../main/index.php";
        </script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>
