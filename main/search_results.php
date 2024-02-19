<?php session_start() ;
include '../partials/_dbconnect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/search_results.css">
    <title>Document</title>
</head>
<body>
    <?php 
    include '../partials/_nav.php';

$query = isset($_GET['query']) ? $_GET['query'] : '';

// Construct the SQL query to search for relevant data
$query = "%$query%";
$sql = "SELECT * FROM uploaded_data 
        WHERE Name LIKE ? 
        OR title LIKE ? 
        OR handle LIKE ? 
        OR genre LIKE ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $query, $query, $query, $query);
$stmt->execute();
$result = $stmt->get_result();

// Display the search results
echo'<main>';
include '../partials/_aside.php';
if ($result->num_rows > 0) {
    echo'<div class="search-results-container">';
    while ($row = $result->fetch_assoc()) {
            echo'<div class="search-result">
                <div class="image-box">
                    <img src="../images/'.$row['thumbnail'].'" alt="">
                </div>
                <div class="song-details">
                    <h2>'.$row['title'].'</h2>
                    <p>'.$row['description'].'</p>';
                    echo '<h3 class="play-now" onclick="playNow(\''.$row['audio'].'\'); songDisplay(\''.$row['title'].'\'); imgDisplay(\''.$row['thumbnail'].'\');"><i class="fa-solid fa-circle-play"></i><span>Play Now</span></h3>';
                echo'</div>
                <i class="fa-solid fa-ellipsis-vertical"></i>
            </div>';
            
        }
        echo'</div>';
} else {
    echo'
    <img src="../images/nodata.gif" alt="" class="no-data">
    <div class ="no-data-text">
    <h2>No Data Found</h2>
    <h4>Try Searching Other Terms</h4>
    </div>';
}
    echo'</main>';

// Close connection
include '../partials/_footer.php';
$stmt->close();
$conn->close();
?>
</body>
</html>