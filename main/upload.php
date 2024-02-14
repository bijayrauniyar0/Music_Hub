<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/upload.css">
    <title>Document</title>
</head>
<body>
    <?php require '../partials/_nav.php' ?>
        <div class="upload-form">
            <span id="upload-heading" class="create-heading">
                <h2>Upload Song</h2>
                <h2 onclick="closeUploader()" class="x"><i class="fa-solid fa-xmark"></i></h2>
            </span>
            <form action="upload.php" method="post" enctype="multipart/form-data" id="uploader-form">
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
                    <label for="image" class="file-input-container">
                        <img src="../images/camera-icon.png" alt="Camera Icon" class="camera-icon">
                        <input type="file" name="image" id="image" class="file-input" accept="image/*" required>
                    </label>
                </div>   
                <span id= "sbt-btn">  
                    <input type="submit" value="Upload" name="submit" id="upload-btn">
                </span>
            </form>
        </div>
       
        <?php require '../partials/_nav.php' ?>
        <script src="../js/toggler.js"> </script>
</body>
</html>