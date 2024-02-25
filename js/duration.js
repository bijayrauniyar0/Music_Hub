document.getElementById('audioFile').addEventListener('change', function(event) {
    const file = event.target.files[0];

    // Check if an audio file is selected
    if (file) {
        // Create a new Audio element
        const audio = new Audio();

        // Set the src attribute to the object URL of the selected file
        audio.src = URL.createObjectURL(file);

        // When the metadata is loaded, get the duration
        audio.addEventListener('loadedmetadata', function() {
            const duration = audio.duration;
            console.log('Duration:', duration); // Console log the duration
            
            // Set the duration value to a hidden input field
            document.getElementById('audioDurationInput').value = duration;
        });
    } else {
        console.error('Error: No audio file selected');
    }
});