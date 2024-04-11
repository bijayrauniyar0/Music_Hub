<?php
session_start();
    $handle = $_GET['handle'];

    include '../partials/_dbconnect.php';
    
    $sql = "SELECT * FROM artists WHERE handle = '$handle'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $artistName = $row['stage_name'];
    $artistImg = $row['artistImage'];

    $sql1 = "SELECT * FROM uploaded_data WHERE handle = '$handle'";
    $result1 = mysqli_query($conn,$sql1);



echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/artist_details.css">

    <title>Document</title>
</head>
<body> ';
    include '../partials/_nav.php';
    echo'</body>';
    include '../partials/_aside.php';
    echo'<div class="main-container">';
    echo' <div class="image-box">
         <img src="../images/artists/'.$artistImg.'" alt="">
         <div class="artist-detail">
             <h2 style="filter: drop-shadow(0 0 5px #ffffff); font-weight:800;">'.$artistName.'</h2>
             <p  style="filter: drop-shadow(0 0 10px #ffffff); font-weight:800;">'.$handle.'</p>
         </div>
     </div>';
if ($result1->num_rows > 0) {
    // Fetch and display the related data
    $i=0;
    while ($row1 = mysqli_fetch_assoc($result1)) {
        $i++;
        if($i==1){
        echo '
        <div class="title-box">
            <h1 class="uploaded-heading"> Songs from '.$row1['stage_name'].'</h1>
            <div class="horizental-line"></div>
        </div>';
        }
        $datetime_value = $row1['uploaded_at'];
        $upload_date= date('Y-m-d', strtotime($datetime_value));

       echo' <div class="song-main">
            <div class="songs-list">
                <div class="numbers">
                <h2 class="numbering">'.$i.'</h2>
                </div>
                <div class="hover-image ">
                    <img src="../images/'.$row1['thumbnail'].'" alt="">
                    <span class="play-btn"><i class="fa-solid fa-play"></i></span>
                </div>
                <div class="song-details">
                    <h3>'.$row1['title'].'</h3>
                    <p>'.$upload_date.'</p>
                </div>
                <div class="play">';
                echo'<h3 class="play-now" onclick="playNow(\''.$row1['audio'].'\'); songDisplay(\''.$row1['title'].'\'); imgDisplay(\''.$row1['thumbnail'].'\');"><i class="fa-solid fa-circle-play"></i><a>Play Now</a></h3>';
                echo'</div>
            </div>
        </div>
        <hr> ';
    } 
}else {
    echo "No related data found for $handle";
}
echo'
    </div>
</body>
</html>';?>
