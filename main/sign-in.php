<?php 
session_start();
include '../partials/_dbconnect.php';

// Check if user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true )  {
    header("location: index.php");
    exit;
}

// Initialize logged in status
$_SESSION['loggedin'] = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM `users` WHERE Email = '$email' ";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1) {
        while($row = mysqli_fetch_assoc($result)){
            if (password_verify($password, $row["Password"])) { 
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $email;

                // Redirect to index.php after setting $_SESSION['loggedin']
                header("location: index.php");
                exit;
            } else {
                echo '<script>alert("Password wrong")</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-in.css">
    <title>Document</title>
</head>
<body>
<?php require '../partials/_nav.php'?>
    <main>
    <?php include '../partials/_nav.php' ; 
    if($_SESSION['loggedin']){
        echo'    
        <div id="success-alert" role="alert">
            <h2>Success!!!</h2> <p>Welcome to Loop Verse</p>
            <h3><a href="index.php">OK</a></h3><br>
        </div>';}
    include '../partials/_aside.php' ?>
        <div class="form-container">
            
            <h2>Sign In</h2>
            <form action="sign-in.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <span class="sbt-btn">
                    <input type="submit" id="login" value="LOGIN">
                </span>
            </form>


            <h3 class="new-member">New Member? <a href="sign-up.php">Sign Up</a></h3>
        </div>
    </main>
    <?php require '../partials/_footer.php' ?>
    <script src="../js/alert.js"></script>
</body>
</html>