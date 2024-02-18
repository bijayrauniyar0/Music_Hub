<link rel="stylesheet" href="../css/profile_aside.css">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>


<section id="aside">
        <div class="top-aside">
            <ul>
                <li><a href="../main/index.php"><i class="fa-solid fa-house"></i>Home</a></li>
                <li><a href="#"><i class="fa-solid fa-music"></i>My Audios</a></li>
                <li><a href="../main/edit.php"><i class="fa-solid fa-user-pen"></i>Edit</a></li>
            </ul>
        </div>
        <div class="bottom-aside">
            <div class="music-player">
              <div class="music-img">
                <img src="../images/maya.jpg" alt="" id="musicImage">
              </div>

                <audio id="myAudio">
                    <source src="" type="audio/mpeg">
                </audio>
                
                <div class="controls">
                    <span id="songdisplay"></span>
                    <input type="range" id="songSlider" min="0" value="0" step="1" onchange="seeksong()">
                    
                    <div class="song-controls">
                        <h3 onclick="previousSong()"><i class="fa-solid fa-backward-step"></i></h3>
                        <h3 id="play-btn" onclick="playAudio()"><i class="fa-solid fa-play"></i></h3>
                        <h3 id="pause-btn" onclick="pauseAudio()"><i class="fa-solid fa-pause"></i></i></h3>
                        <h3 id="pause-btn" onclick="nextSong()"><i class="fa-solid fa-forward-step"></i></i></h3>
                    </div>
                </div>
              
            </div>
            
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="../js/script.js"></script>

