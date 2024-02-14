<?php 
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    include '../partials/_dbconnect.php';
    
    $sql2 = "CREATE TABLE IF NOT EXISTS artists (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        stage_name VARCHAR(30) NOT NULL,
        handle VARCHAR(30) NOT NULL NOT NULL UNIQUE,
        Phone_number VARCHAR(15) NOT NULL UNIQUE,
        Email VARCHAR(50) NOT NULL UNIQUE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $result=mysqli_query($conn,$sql2);
    $stage_name = $_POST["stage_name"];
    $handle = $_POST["handle"];
    
    $checkEmailQuery = "SELECT * FROM artists WHERE Email = '".$_SESSION['email']."'";
    $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            // $emailExistsError = true;
            echo'stage already exists';
        }
    
    $sql4 = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";
    $result4= mysqli_query($conn,$sql4);
    $row4 = mysqli_fetch_assoc($result4);

    $sql5 = "INSERT INTO `artists` (`stage_name`,`handle`,`Phone_number`, `email`, `created_at`) VALUES ('$stage_name', '@$handle', '".$row4['Phone_number']."','".$_SESSION['email']."',current_timestamp());";

    $result5 = mysqli_query($conn,$sql5);

    if($result5){
        echo 'Account Upgraded Successfully';
        header("location:../main/index.php");
    }



}
?>