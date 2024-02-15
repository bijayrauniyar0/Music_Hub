<head>
    <link rel="stylesheet" href="../css/nav.css">
    <!-- <link rel="stylesheet" href="../css/artist.css"> -->
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
</head>
<header>
<?php 
include "_dbconnect.php";

$loggedin = false;
$stageExists = false;

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $loggedin=true;
    
    $sql = "SELECT * FROM users WHERE Email = '".$_SESSION['email']."'";

    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    $sql_check = "SELECT * FROM artists WHERE Email = '".$_SESSION['email']."'";
    $result_check =mysqli_query($conn,$sql_check);
    if(mysqli_num_rows($result_check) > 0){
        $stageExists = true;

    }
}
else{
    $loggedin = false;
}
echo '
        <nav>
            <div class="left">
                <h2><a href="../main/index.php">Loop Verse</a></h2>
            </div>
            <div class="mid">
                <ul>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <form action="../partials/search_results.php" method="GET"  id="search-form">
                 <input type="text" class="search" placeholder="Search Artits, Albums...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
            </div>
            <div class="right">';
            if ($loggedin ==true){
                echo'
                <div class="msg">
                    <i class="fa-solid fa-inbox"></i>
                    <div class="messages">
                        <h3 class="inbox-heading">Inbox</h3>
                        <h4>Your Message 1</h4>
                        <hr>
                        <h4>Your Message 2</h4>
                        <hr>
                        <h4>Your Message 3</h4>
                        <hr>
                        <h4>Your Message 4</h4>
                        <hr>
                        <h4>Your Message 5</h4>
                    </div>
                </div>';}
                if(!$loggedin){
                    echo'
                <div class="sign-in">
                    <a href="sign-in.php">Sign In</a>
                    <a href="sign-in.php"><i class="fa-solid fa-right-to-bracket"></i></a>
                </div>';}
                if($loggedin == true){
                    echo'
                    <div class ="user-container">
                        <div class="user">
                        <span id="user"><i class="fa-solid fa-user"></i> <h2>  '.$row["first_name"].'  </h2>  
                        <i class="fa fa-caret-down"></i></span>

                            <div class="user-login">
                                <a href="../main/profile.php">Profile</a>
                                <hr>
                                <a href="../partials/_logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>';
                }
                if($stageExists == false){
                echo'
                <div class="newMember">
                    <h2 onclick="openContainer()">Are you a Artist?</h2>
                </div> ';}
                if($stageExists ==  true){
        
                    echo '
                    <div class="uploader">
                    <span id="upload-icons" onclick="openUploader()">
                        <i class="fa-solid fa-music"></i> <h3>Upload</h3>
                    </span>
                </div>';
                }
            echo'
            </div>
        </nav>
    </header>';
    if($loggedin){
    echo '
    <div class="create-container">
        <div class="artists-form">
            <span id="create-heading" class="create-heading">
                <h2>Initiate Avenue</h2>
                <h2 onclick="closeContainer()" class="x"><i class="fa-solid fa-xmark"></i></h2>
            </span>
            <form action="../partials/artist.php" method="POST">
                <div class="form-group3">
                    <label for="name">Stage Name</label>
                    <input type="text" id="name" name="stage_name" required>
                </div>
                <div class="form-group3">
                    <label for="handle">Handle</label>
                    <input type="text" id="handle" name="handle" required>
                    <span class="handle-prefix">@</span>
                </div>
                <div id="handle-error"></div>

                <div class="next-btn-container">
                    <button type="submit" id="next-btn"><span class="next-btn">Create</span></button>
                </div>
            </form>

        </div>
    </div>';} 
    
    ?>
    <script>
     function openUploader() {
        window.location.href = "../main/studio.php";
    }
    </script>
<script src="../js/toggler.js"></script>

