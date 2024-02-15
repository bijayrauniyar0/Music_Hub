<?php
session_start();

include '../partials/_dbconnect.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $sqlSongsTable = "CREATE TABLE IF NOT EXISTS uploaded_data (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255),
        handle VARCHAR(255),
        title VARCHAR(255) NOT NULL,
        description TEXT,
        genre VARCHAR(50),
        thumbnail VARCHAR(255),
        audio VARCHAR(255)
        
    )";
    $resultSongsTable = mysqli_query($conn,$sqlSongsTable);

    $sqlFetchArtists = "SELECT * FROM `artists` WHERE Email = '".$_SESSION['email']."' ";
    $resultArtists = mysqli_query($conn,  $sqlFetchArtists);
    $row = mysqli_fetch_assoc($resultArtists);
    $handle = $row['handle'];

    if (isset($_FILES["audioFile"]) && $_FILES["audioFile"]["error"] == UPLOAD_ERR_OK) {
        
        // Prepare data for insertion
        $title = $_POST["title"];
        $description = $_POST["description"];
        $genre = $_POST["genre"];
        $thumbnailName = $_FILES["image"]["name"];
        $audioName = $_FILES["audioFile"]["name"];


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
        $sql = "INSERT INTO uploaded_data (email, handle,title, description, genre, thumbnail, audio) 
        VALUES ('".$_SESSION['email']."', '$handle','$title', '$description', '$genre', '$thumbnailName', '$audioName')";        
        
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Congrats! Your Audio has been uploaded")</script>';
        } else {
            echo '<script>alert("Error! Soory, Your Audio was not uploaded")</script>';
        }
    } else {
        echo '<script>alert("Error! Try Again")</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/studio.css">
    <title>Document</title>
</head>
<body>
<?php include '../partials/_nav.php' ;  ?>
    <main>
        <?php include '../partials/_profile_aside.php'; ?>


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
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" rows="4" cols="30" placeholder="Enter Description for you song"></textarea>
                </div>
                <div class="details-box"> 
                    <label for="genre">Genre:</label>
                    <select id="genre" name="genre" required>
                        <option value="">Select a genre</option>
                        <option value="pop">Pop</option>
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
                
                <div class="image-upload">
                    <div class="thumbnail-image">
                        <h2>Thumbnail</h2>
                        <label for="image" class="file-input-container">
                            <img src="../images/camera-icon.png" alt="Camera Icon" class="camera-icon">
                            <input type="file" name="image" id="image" class="file-input" accept="image/*" required>
                        </label>
                        
                    </div>
                    <div class="audio-input">
                    <label for="audioFile">Select audio file:</label><br>
                    <input type="file" id="audioFile" name="audioFile" accept="audio/*">
                    </div>
                </div>   
                <span id= "sbt-btn">  
                    <input type="submit" value="Upload" name="submit" id="upload-btn">
                </span>
            </form>
        </div>
`   </main>
    <?php include '../partials/_footer.php' ?>
        <script src="../js/studio.js"> </script>
</body>
</html>
