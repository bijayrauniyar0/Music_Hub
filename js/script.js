var audio = document.getElementById("myAudio");
var songSlider = document.getElementById("songSlider");
var songNameDisplay = document.getElementById("songdisplay");
var pauseBtn = document.getElementById("pause-btn");
var playBtn = document.getElementById("play-btn");
var songNames = []; // Define an empty array for song names
var currentSongIndex = 0;
var songs= [];

function playAudio() {
    audio.play();
    pauseBtn.style.display = "inline-block";
    playBtn.style.display = "none";
}

function pauseAudio() {
    audio.pause();
    playBtn.style.display = "inline-block";
    pauseBtn.style.display = "none";
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
    songNameDisplay.textContent = songs[currentSongIndex];
    songSlider.max = audio.duration;
}

function colordefault() {
    songSlider.style.background = "rgb(214,214,214)";
}

function updateSliderColor() {
    const currentPosition = (audio.currentTime * 100) / audio.duration;
    const color = `linear-gradient(to right, rgb(54, 54, 54) ${currentPosition}%, rgb(214, 214, 214) ${currentPosition}%)`;
    songSlider.style.background = color;
}

window.onload = function () {
    pauseBtn.style.display = "none";
    playBtn.style.display = "block";
    updateSong();
    updateSliderColor();
};
document.addEventListener("DOMContentLoaded", function () {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var fileNames = JSON.parse(xhr.responseText);

            // Store original file names with "songs/" prefix in songsName array
            songNames = fileNames.map(function (fileName) {
                return "../songs/" + fileName;
            });

            // Modify file names to remove all symbols, replace underscores with blank spaces,
            // and limit characters until the 4th underscore
            songs = fileNames.map(function (fileName) {
                // Remove file extension
                var fileNameWithoutExtension = fileName.split('.').slice(0, -1).join('.');
            
                var modifiedName = fileNameWithoutExtension.replace(/01[^\w]/g, ''); // Remove all symbols
                var modifiedNameWithSpaces = modifiedName.replace(/_/g, ' '); // Replace underscores with blank spaces
                var parts = modifiedNameWithSpaces.split(' ');
                var modifiedNameLimited = parts.slice(0, 4).join(' ');
                return modifiedNameLimited // Limit to first 10 characters
            });
            

            // Log the songsName and songs arrays for testing
            console.log(songNames);
            console.log(songs);
        }
    };
    xhr.open("GET", "../partials/get_songs.php", true);
    xhr.send();
});
