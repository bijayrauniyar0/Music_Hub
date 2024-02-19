var audio = document.getElementById("myAudio");
var musicImage = document.getElementById("musicImage");
var songSlider = document.getElementById("songSlider");
var songNameDisplay = document.getElementById("songdisplay");
var pauseBtn = document.getElementById("pause-btn");
var playBtn = document.getElementById("play-btn");
var songNames = []; 
var currentSongIndex = 0;
var currentSongName;

function extractFileNameFromURL(url) {
    // Using the URL constructor to get pathname
    var pathname = new URL(url).pathname;

    // Using regular expression to extract filename
    var filename = pathname.match(/\/([^\/?#]+)$/);
    
    // Check if the match is found
    if (filename && filename.length > 1) {
        return filename[1];
    } else {
        // Return the original URL if no filename is found
        return url;
    }
}
function playAudio() {
    audio.play();
    pauseBtn.style.display = "inline-block";
    playBtn.style.display = "none";
    songSlider.max = audio.duration;
    currentSongName = audio.src;
    var filename = extractFileNameFromURL(currentSongName);
    handleName(filename)
    

    
}


function handleName(nameThumbnail){

    // this fn sends data to php, php gets data fetches data from db then sends back to js
        var xhr = new XMLHttpRequest();
        var data = {
            key1: nameThumbnail
        };
        var nameMe;
        var jsonData = JSON.stringify(data);
        var url = 'http://localhost/musicPlayer/partials/fetch_details.php'; // Update the URL accordingly
        xhr.open('POST', url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    nameMe = xhr.responseText;
                    // Call a function to handle the response
                    handleResponse(nameMe);
                } else {
                    console.error('AJAX request failed');
                }
            }
        };
        xhr.send(jsonData);
}

// Define a function to handle the response
function handleResponse(response) {
    console.log("Data is:", response);
    imgDisplay(response)
}





function pauseAudio() {
    audio.pause();
    playBtn.style.display = "inline-block";
    pauseBtn.style.display = "none";
}
function playNow(audioFileName) {
    audio.src = "../songs/" + audioFileName; // Assuming your audio files are located in a folder named "songs"
    colordefault();
    songDisplay(); 
    playAudio();
    updateSliderColor();
    // imgDisplay();
    
}
function imgDisplay(imageName){
    musicImage.src = "../images/"+imageName;


}
function songDisplay(songName) {
    songNameDisplay.textContent = songName;
    songSlider.max = audio.duration;
}

function previousSong() {
    if (currentSongIndex > 0) {
        currentSongIndex--;
        audio.src = songNames[currentSongIndex]; // Use songNames array
        colordefault();
        updateSong();
        playAudio();
    }
}

function nextSong() {
    if (currentSongIndex < songNames.length - 1) {
        currentSongIndex++;
        audio.src = songNames[currentSongIndex]; // Use songNames array
        colordefault();
        updateSong();
        playAudio();
    }
}

function seeksong() {
    audio.currentTime = songSlider.value;

}

audio.addEventListener('timeupdate', function () {
    var currentTime = audio.currentTime;
    var duration = audio.duration;
    if (!isNaN(duration)) {
        var progress = (currentTime / duration) * 100;
        songSlider.value = currentTime;
        songSlider.max = duration;
    }
});

songSlider.addEventListener('input', function () {
    audio.currentTime = songSlider.value;
    updateSliderColor();
});

function updateSong() {
    audio.src = songNames[currentSongIndex];
    
}

function colordefault() {
    songSlider.style.background = "rgb(214,214,214)";
}

function updateSliderColor() {
    const currentPosition = (audio.currentTime * 100) / audio.duration;
    const color = `linear-gradient(to right, rgb(54, 54, 54) ${currentPosition}%, rgb(214, 214, 214) ${currentPosition}%)`;
    songSlider.style.background = color;
}
defaultSong = "Apna_Bana_Le.mp3"
window.onload = function () {
    pauseBtn.style.display = "none";
    playBtn.style.display = "block";
    updateSong();
    updateSliderColor();
    audio.src = "../songs/"+defaultSong;

};


//   fetching songs from the storage

document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var fileNames = JSON.parse(xhr.responseText);

            // Store original file names with "songs/" prefix in songsName array
            songNames = fileNames.map(function (fileName) {
                return "../songs/" + fileName;
            });
            

            // Log the songsName and songs arrays for testing
            console.log(songNames);
        }
    };
    xhr.open("GET", "../partials/get_songs.php", true);
    xhr.send();
});

