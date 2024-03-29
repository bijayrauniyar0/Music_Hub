<?php 
session_start();
$lengthError = false;
$matchError = false;
$phoneError = false;
$emailExistsError = false;
if($_SERVER["REQUEST_METHOD"]=="POST"){

    include '../partials/_dbconnect.php';
    
    $sql1 = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(30) NOT NULL,
        last_name VARCHAR(30) NOT NULL,
        dob DATE NOT NULL,
        Phone_number VARCHAR(15) NOT NULL UNIQUE,
        Email VARCHAR(50) NOT NULL UNIQUE,
        Password VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    $result1 = mysqli_query($conn, $sql1);
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $dob = $_POST["dob"];
    $phone = $_POST["phone"];
    $email= $_POST["email"];
    $password = $_POST["pw"];
    $c_password = $_POST["c-pw"];

        $passwordLength = strlen($password);
        $numberLength = strlen($phone);
        $exists = false;

        //check if the email exists

        $checkEmailQuery = "SELECT * FROM `users` WHERE `Email` = '$email'";
        $checkEmailResult = mysqli_query($conn, $checkEmailQuery);

        if (mysqli_num_rows($checkEmailResult) > 0) {
            echo'<script>
                alert(" Error! Email Already Exists")
            </script>';
        }
        elseif ($passwordLength < 8) {
            echo'<script>
            alert(" Error! Password length must be more than 8")
        </script>';
        } 
        elseif ($password != $c_password) {
            echo'<script>
                alert(" Error! Passwords don\'t match")
            </script>';
        } 
        elseif ($numberLength != 10 || !is_numeric($phone)) {
            echo'<script>
                alert(" Error! Enter a valdid phone number")
            </script>';
        }
        elseif ($passwordLength >= 8 && $password == $c_password && $exists == false) {
            
            //hashing pw and storing pw in form of hash

            $hash= password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`first_name`, `last_name`, `dob`, `Phone_number`, `Email`, `Password`, `created_at`) VALUES ('$first_name', '$last_name', '$dob','$phone', '$email', '$hash', current_timestamp());";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo'
                <script>
                    alert(" Hello!'.$first_name.'\n Welocome to Loop Verse")
                    window.location.href = "sign-in.php";
                </script>';
            }else{
                echo'<script>
                alert("Failed to create account, \n Try Again!")
                window.location.href = "sign-in.php";
            </script>';
            }
        }
    }
    else{
        echo'<script>
                alert(" Error! Try Again")
            </script>';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-up.css">
    <title>Sign Up</title>
</head>
<body>
    <?php require '../partials/_nav.php' ?>
    <main>
    <?php require '../partials/_aside.php' ?>
    <div class="sign-up">
        <h2>Sign Up</h2>
        <form action="sign-up.php" method="POST" class="flex-column">
            <div class="form-group">
                <label for="full_name">Name</label>
                <div class="input-container">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required maxlength="10">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" placeholder="Date of Birth" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-container2">
                    <input type="password" id="pw" name="pw" placeholder="Enter Your Password" required>
                    <input type="password" id="c-pw" name="c-pw" placeholder="Confrim Password">
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox"><label for="checkbox" id="terms">I accept all the <a href="">Terms & Conditions</a></label>
            </div>
            <div class="button-sign">
                <button type="submit" id="sign-btn">Sign Up</button>
            </div>
        </form>
    </div>
</main>
<?php require '../partials/_footer.php' ?>
</body>
</html>