<?php
session_start();
if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] != true )  {
    header("location: ../main/sign-in.php");
    exit;
}

include '../partials/_dbconnect.php';
// Check if form is submitted

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    

    $sqlSongsTable = "CREATE TABLE IF NOT EXISTS uploaded_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        stage_name VARCHAR(50),
        email VARCHAR(255),
        handle VARCHAR(255),
        title VARCHAR(255) NOT NULL,
        description TEXT,
        genre VARCHAR(50),
        thumbnail VARCHAR(255),
        audio VARCHAR(255),
        uploaded_at  DATETIME

        
        
    )";
    $audioDuration = $_POST['audioDuration'];


    $resultSongsTable = mysqli_query($conn,$sqlSongsTable);

    $sqlFetchArtists = "SELECT * FROM `artists` WHERE Email = '".$_SESSION['email']."' ";
    $resultArtists = mysqli_query($conn,  $sqlFetchArtists);
    $row = mysqli_fetch_assoc($resultArtists);
    $handle = $row['handle'];
    $stage_name = $row['stage_name'];

    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == UPLOAD_ERR_OK) {
        
        // Prepare data for insertion
        $title = $_POST["title"];
        $description = $_POST["description"];
        $genre = $_POST["genre"];
        $thumbnailName = $_FILES["image"]["name"];
        $audioName = $_FILES["audioFile"]["name"];
        $audioDuration = $_POST["audioDuration"];


        // Function to sanitize and rename file name
    // Function to sanitize and rename file name
function sanitizeFileName($fileName) {
    // Remove any unwanted characters and convert spaces to underscores
    $sanitizedFileName = preg_replace('/[^a-zA-Z0-9_.]/', '', $fileName);
    $sanitizedFileName = str_replace(' ', '_', $sanitizedFileName);
    return $sanitizedFileName;
}

// Prepare target directory
$targetDirectory = "../"; // Set base directory

// Check file type of image
if (strpos($_FILES["image"]["type"], "image/") !== false) {
    // File is an image
    $imageDirectory = "images/";
    $imageFileName = sanitizeFileName($_FILES["image"]["name"]);
} else {
    // File is not an image (assume it's audio)
    $imageDirectory = "";
    $imageFileName = "";
}

// Check file type of audio
if (strpos($_FILES["audioFile"]["type"], "audio/") !== false) {
    // File is audio
    $audioDirectory = "songs/";
    $audioFileName = sanitizeFileName($_FILES["audioFile"]["name"]);
} else {
    // Invalid audio file, handle as necessary
    $audioDirectory = "";
    $audioFileName = "";
}

// Move uploaded files to appropriate directories
move_uploaded_file($_FILES["image"]["tmp_name"], $targetDirectory . $imageDirectory . $imageFileName);
move_uploaded_file($_FILES["audioFile"]["tmp_name"], $targetDirectory . $audioDirectory . $audioFileName);


        // Insert data into database
        $sql = "INSERT INTO uploaded_data (stage_name ,email, handle,title, description, genre, thumbnail, audio, duration, uploaded_at) 
        VALUES ('$stage_name ','".$_SESSION['email']."', '$handle','$title', '$description', '$genre', '$thumbnailName', '$audioName','$audioDuration', current_timestamp());";        
        
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Congrats! Your Audio has been uploaded")</script>';
        } else {
            echo '<script>alert("Error! Soory, Your Audio was not uploaded")</script>';
        }
    } else {
        echo '<script>alert("Error! Try Again")</script>';
    }
}else{
    echo'audio duration error';
}

$sqlUploadData = "SELECT * FROM uploaded_data WHERE email = '".$_SESSION["email"]."'";
$resultUploadedData = mysqli_query($conn,$sqlUploadData);

echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/studio.css">
    <title>Studio</title>
</head>
<body>';
   include '../partials/_nav.php';
   echo '<main class="main">';
   include '../partials/_profile_aside.php';
    $numUploadedData = mysqli_num_rows($resultUploadedData);
    echo '<div class="uploaded-data-container">';
    

            if ($numUploadedData > 0) {
                while($row = mysqli_fetch_assoc($resultUploadedData)){
                    echo '<div class="uploaded-result">';
                    echo '<div class="image-box">';
                    echo '<img src="../images/'.$row['thumbnail'].'" alt="">';
                    echo '</div>';
                    echo '<div class="song-details">';
                    echo '<h2>'.str_replace('_', ' ', ''.$row['title']).'</h2>';
                    echo '<p>'.$row['description'].' </p>';
                    echo '<p>'.$row['genre'].' </p>';
                    echo '<h3 class="play-now" onclick="playNow(\''.$row['audio'].'\'); songDisplay(\''.$row['title'].'\'); imgDisplay(\''.$row['thumbnail'].'\');"><i class="fa-solid fa-circle-play"></i><span>Play Now</span></h3>';
                    echo '</div>';
                    echo '<i class="fa-solid fa-ellipsis-vertical"></i>';
                    echo '</div>';
                }
            }
               
            

?>
<!-- background blur -->
        <div class="overlay"></div>

</main>
        <div class="upload-formm">
            <span id="upload-heading" class="create-heading">

                <h2>Upload Song</h2>
                <h2 onclick="closeUploader()" class="x"><i class="fa-solid fa-xmark"></i></h2>
            </span>
            <form action="studio.php" method="post" enctype="multipart/form-data" id="uploader-form">
                <div class="details-box">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" placeholder="Enter title for your song" required>
                </div>
                <div class="details-box">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" rows="4" cols="30" placeholder="Enter Description for you song"></textarea>
                </div>
                <!-- select genre -->
                <div class="details-box"> 
                    <label for="genre">Genre</label>
                    <select id="genre" name="genre" required>
                        <option value="">Select a genre</option>
                        <option value="pop">Pop</option>
                        <option value="pop">Romantic</option>
                        <option value="rock">Rock</option>
                        <option value="hiphop">Hip-hop</option>
                        <option value="country">Country</option>
                        <option value="electronic">Electronic</option>
                        <option value="r&b">R&B</option>
                        <option value="classical">Classical</option>
                        <option value="jazz">Jazz</option>
                        <option value="blues">Blues</option>
                        </select>
                </div>
                <!-- Uploadung Thumbnail -->
                <div class="image-upload">
                    <div class="thumbnail-image">
                        <h2>Thumbnail</h2>
                        <label for="image" class="file-input-container">
                            <img src="../images/camera-icon.png" alt="Camera Icon" class="camera-icon" id="thumbnailPreview">
                            <input type="file" name="image" id="image" class="file-input" accept="image/*" required>
                        </label>
                        
                    </div>
                    <div class="audio-input">
                    <label for="audioFile">Select audio file:</label><br>
                    <input type="file" id="audioFile" name="audioFile" accept="audio/*">
                    <input type="hidden" id="audioDurationInput" name="audioDuration">
                    </div>
                </div>   
                <span id= "sbt-btn">  
                    <input type="submit" value="Upload" name="submit" id="upload-btn">
                </span>
            </form>
        </div>
    <span class="footer">
    <?php include '../partials/_footer.php' ?>
    </span>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/studio.js"></script>
        <script src="../js/script.js"></script>
        <script src="../js/duration.js"></script>
       

</body>
</html>
