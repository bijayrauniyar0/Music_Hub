<?php
// Start the session
session_start();

include '../partials/_dbconnect.php';

$sql = "SELECT * FROM `uploaded_data` LIMIT 5";
$result = mysqli_query($conn, $sql);
echo'
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <title>Loop Verse</title>

</head>
<body>';
    include '../partials/_nav.php'; 
   echo' <main class="main">';
    include '../partials/_aside.php'; 
   echo' <section id="main-mid">
        <div class="main-top">
            <div class="slide" id="slide1">
                <img id="sliderImage" src="../images/01.jpg" alt="">
                <div class="image-details">
                    <h2>Shape of You</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, voluptates odio excepturi natus tenetur dolore.</p>
                    <h3 class="play-now"> <a href=""><i class="fa-solid fa-circle-play"></i>Play Now</a></h3>
                </div>
            </div>
            <div class="slide" id="slide2">
                <img id="sliderImage" src="../images/02.jpg" alt="">
                <div class="image-details">
                    <h2>Love Yourself</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, voluptates odio excepturi natus tenetur dolore.</p>
                    <h3 class="play-now"> <a href=""><i class="fa-solid fa-circle-play"></i>Play Now</a></h3>
                </div>
            </div>
            <div class="slide" id="slide3">
                <img id="sliderImage" src="../images/03.jpg" alt="">
                <div class="image-details">
                    <h2>Tum Hi Ho</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, voluptates odio excepturi natus tenetur dolore.</p>
                    <h3 class="play-now"> <a href=""><i class="fa-solid fa-circle-play"></i>Play Now</a></h3>
                </div>
            </div>
            <div class="slide" id="slide4">
                <img id="sliderImage" src="../images/05.jpg" alt="">
                <div class="image-details">
                    <h2>Meri Aashiqui</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Commodi, voluptates odio excepturi natus tenetur dolore.</p>
                    <h3 class="play-now"> <a href=""><i class="fa-solid fa-circle-play"></i>Play Now</a></h3>
                </div>
            </div>
            <div class="perv-next">
                <span id="perv" onclick="perv()"><i class="fa-solid fa-caret-left"></i></span>
                <span id="next" onclick="next()"><i class="fa-solid fa-caret-right"></i></span>
            </div>
        </div>
        <h2 class="heading">Top Releases</h2>
        <div class="main-half">';
       
        
if (mysqli_num_rows($result) > 0) {
    echo '<div class="main-half-container">';
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div class="img-container">';
        echo '    <div class="img-release">';
        echo '        <img src="../images/' . $row['thumbnail'] . '" class="img-release" alt="">';
        echo '    </div>';
        echo '    <span id="play-hovered" onclick="playNow(\''.$row['audio'].'\'); songDisplay(\''.$row['title'].'\'); imgDisplay(\''.$row['thumbnail'].'\')"> <i class="fa-solid fa-play"></i></span>';
        echo '    <div class="hovered-details">';
        echo '        <h4><i class="fa-regular fa-heart"></i> 1,542</h4>';
        echo '        <h4><i class="fa-solid fa-headphones-simple"></i> 2,713</h4>';
        echo '    </div>';
        echo '    <div class="song-details">';
        echo '        <h3>' . $row['title'] . '</h3>'; // Change this to the appropriate column name
        echo '        <h4>' . $row['Name'] . '</h4>'; // Change this to the appropriate column name
        echo '    </div>';
        echo '</div>';
    }
    echo '</div>'; // Close the first container here
} else {
    echo "No records found";
}

// Fetching data from the second query
$sql6 = "SELECT * FROM `uploaded_data` LIMIT 5, 5";
$result6 = mysqli_query($conn, $sql6);

if (mysqli_num_rows($result6) > 0) {
    echo '<div class="main-half-container">'; // Start the second container here
    while ($row6 = mysqli_fetch_assoc($result6)) {
        echo '<div class="img-container">';
        echo '    <div class="img-release">';
        echo '        <img src="../images/' . $row6['thumbnail'] . '" class="img-release" alt="">';
        echo '    </div>';
        echo '    <span id="play-hovered" onclick="playNow(\''.$row6['audio'].'\'); songDisplay(\''.$row6['title'].'\'); imgDisplay(\''.$row6['thumbnail'].'\')"> <i class="fa-solid fa-play"></i></span>';
        echo '    <div class="hovered-details">';
        echo '        <h4><i class="fa-regular fa-heart"></i> 1,542</h4>';
        echo '        <h4><i class="fa-solid fa-headphones-simple"></i> 2,713</h4>';
        echo '    </div>';
        echo '    <div class="song-details">';
        echo '        <h3>' . $row6['title'] . '</h3>'; // Change this to the appropriate column name
        echo '        <h4>' . $row6['Name'] . '</h4>'; // Change this to the appropriate column name
        echo '    </div>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo "No records found";
}
?>
        </div>
        <div class="main-quarter">
            <div class="artists-heading">
                <h2 class="heading">Artists</h2>
                <h2 class="see-all"><a href="">See All<i class="fa-solid fa-arrow-right"></i></a></h2>
            </div>
            <div class="artists" id="artists">
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/arijit.jpeg" alt=""></div>
                    <h3>Arijit Singh</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/selena.webp" alt=""></div>
                    <h3>Selena Gomez</h3>
                </div>
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/yoyo.avif" alt=""></div>
                    <h3>Honey Singh</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/jubin.webp" alt=""></div>
                    <h3>Jubin Nautiyal</h3>
                </div>
       
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/atif.jpg" alt=""></div>
                    <h3>Atif Aslam</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/billie.jpg" alt=""></div>
                    <h3>Billie Eillish</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/ed.jpg" alt=""></div>
                    <h3>Ed Sheeran</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/jason.jpeg" alt=""></div>
                    <h3>Jason Deurelo</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/kk.jpg" alt=""></div>
                    <h3>K.K</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/justin.jpg" alt=""></div>
                    <h3>Justin Beiber</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/luis.jpeg" alt=""></div>
                    <h3>Luis Fonsi</h3>
                </div>
            
                <div class="artists-box">
                    <div class="singer-img"><img src="../images/artists/yankee.jpeg" alt=""></div>
                    <h3>Daddy Yankee</h3>
                </div>
            </div>
            <div class="perv-next1">
                <span id="perv1"><i class="fa-solid fa-caret-left"></i></span>
                <span id="next1"><i class="fa-solid fa-caret-right"></i></span>
            </div>

        </div>
        <div class="main-quarter1">
    <?php 
    $sql1 = "SELECT * FROM `uploaded_data` LIMIT 5, 5";
    $result1 = mysqli_query($conn, $sql1);
    $total_rows = mysqli_num_rows($result1) ;
    // First list-box
    echo '<div class="list-box">';
    if ($total_rows > 0) {
        echo '<h2 class="heading"><i class="fa-solid fa-heart"></i>Top Rated</h2>';
        
        // First Row
        echo '<div class="row">';
        $current_row = 0;
        while ($row1 = mysqli_fetch_assoc($result1)) {
            $current_row++;
            echo '<div class="list-holder">';
            echo '    <div class="list-detail">';
            echo '        <div class="songs-full-details">';
            echo '            <div class="list-img">';
            echo '                <img src="../images/' . $row1['thumbnail'] . '" alt="">';
            echo '                <div class="top-songs-img">';
            echo '                    <a id="song-play"  onclick="playNow(\''.$row1['audio'].'\'); songDisplay(\''.$row1['title'].'\'); imgDisplay(\''.$row1['thumbnail'].'\');"><i class="fa-solid fa-play"></i></a>';
            echo '                </div>';
            echo '            </div>';
            echo '            <div class="list-text">';
            echo '                <h3>' . $row1['title'] . '</h3>';
            echo '<h4><a href="artist_details.php?name=' . urlencode($row1['Name']) . '">' . $row1['Name'] . '</a></h4>';
            echo '            </div>';
            echo '            <div class="time">';
            echo '                <p>3:38</p>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            if ($current_row < $total_rows) {
                echo '    <hr>';
            }
        
            echo '</div>';
        }
        echo '</div>'; // End of first row
        
    } else {
        echo 'data not fetched';
    }
    echo '</div>'; 

    $sql2 = "SELECT * FROM `uploaded_data` LIMIT 8, 5";
    $result2 = mysqli_query($conn, $sql2);

    echo '<div class="list-box">';
    if (mysqli_num_rows($result2) > 0) {
        echo '<h2 class="heading"><i class="fa-solid fa-record-vinyl"></i>Most Played</h2>';
        
        // Second Row
        echo '<div class="row">';
        $current_row2  = 0;
        while ($row2 = mysqli_fetch_assoc($result2)) {

            $current_row2++;
            echo '<div class="list-holder">';
            echo '    <div class="list-detail">';
            echo '        <div class="songs-full-details">';
            echo '            <div class="list-img">';
            echo '                <img src="../images/' . $row2['thumbnail'] . '" alt="">';
            echo '                <div class="top-songs-img">';
            echo '                    <a id="song-play"  onclick="playNow(\''.$row2['audio'].'\'); songDisplay(\''.$row2['title'].'\'); imgDisplay(\''.$row2['thumbnail'].'\');"><i class="fa-solid fa-play"></i></a>';            echo '                </div>';
            echo '            </div>';
            echo '            <div class="list-text">';
            echo '                <h3>' . $row2['title'] . '</h3>';
            echo '<h4><a href="artist_details.php?handle=' . urlencode($row2['handle']) . '">' . $row2['Name'] . '</a></h4>';
            echo '            </div>';
            echo '            <div class="time">';
            echo '                <p>3:38</p>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            if ($current_row2 < mysqli_num_rows($result2)) {
                echo '    <hr>';
            }
            echo '</div>';
        }
        echo '</div>'; // End of second row
        
    } else {
        echo 'data not fetched';
    }
    echo '</div>'; // End of second list-box
  
    echo '<div class="list-box">';
    
    $sql3 = "SELECT * 
    FROM uploaded_data 
    ORDER BY uploaded_at DESC 
    LIMIT 5";
    $result3 = mysqli_query($conn, $sql3);
    if (mysqli_num_rows($result1) > 0) {
        echo '<h2 class="heading"><i class="fa-solid fa-music"></i>Latest Releases</h2>';
        
        // Second Row
        echo '<div class="row">';
        $current_row3  = 0;
        
        while ($row3 = mysqli_fetch_assoc($result3)) {
                $current_row3++;
            echo '<div class="list-holder">';
            echo '    <div class="list-detail">';
            echo '        <div class="songs-full-details">';
            echo '            <div class="list-img">';
            echo '                <img src="../images/' . $row3['thumbnail'] . '" alt="">';
            echo '                <div class="top-songs-img">';
            echo '                    <a id="song-play"  onclick="playNow(\''.$row3['audio'].'\'); songDisplay(\''.$row3['title'].'\'); imgDisplay(\''.$row3['thumbnail'].'\');"><i class="fa-solid fa-music"></i></a>';            echo '                </div>';
            echo '            </div>';
            echo '            <div class="list-text">';
            echo '                <h3>' . $row3['title'] . '</h3>';
            echo '<h4><a href="artist_details.php?name=' . urlencode($row3['Name']) . '">' . $row3['Name'] . '</a></h4>';
            echo '            </div>';
            echo '            <div class="time">';
            echo '                <p>3:38</p>';
            echo '            </div>';
            echo '        </div>';
            echo '    </div>';
            if ($current_row3 < mysqli_num_rows($result1) ) {
                echo '    <hr>';
            }
            echo '</div>';
        }
        echo '</div>'; // End of second row
        
    } else {
        echo 'data not fetched';
    }
    echo '</div>'; // End of second list-box
    ?>
</div>

    </section>
</main>
<?php require '../partials/_footer.php'; ?>
    <script src="../js/slider.js"></script>
    <script src="../js/toggler.js"></script>

</body>
</html>