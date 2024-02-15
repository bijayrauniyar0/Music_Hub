var channelContainer = document.querySelector(".artists-form")

function openContainer(){
    channelContainer.classList.toggle('open')
    document.querySelector('.main').classList.add('blur');
}
function closeContainer(){
    channelContainer.classList.remove('open')
    document.querySelector('.main').classList.remove('blur');

}



// handle checker
document.getElementById('handle').addEventListener('input', function() {
    var handle = this.value.trim(); // Get the trimmed value of the input field

    var errorMessage = '';
    if (handle === '') {
        errorMessage = 'Handle is required';
        document.getElementById('handle-error').style.color = 'red';
    } else {
        // Send AJAX request to check handle availability
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../partials/check_handle.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);
                console.log("Response:", response); // Debugging: Log the response
                if (response.status === "exists") {
                    errorMessage = "Handle already exists";
                    document.getElementById('handle-error').style.color = 'red';
                } else {
                    errorMessage = "Handle is available";
                    document.getElementById('handle-error').style.color = 'rgb(134, 255, 104)';
                }
                updateErrorMessage(errorMessage); // Update the error message display
            }
        };
        xhr.send('handle=' + handle); // Send handle to the server
    }

    updateErrorMessage(errorMessage); // Update the error message display
});

function updateErrorMessage(message) {
    var errorMessageElement = document.getElementById('handle-error');
    errorMessageElement.textContent = message; // Update error message text
    if (message === '') {
        errorMessageElement.style.display = 'none'; // Hide error message if no error
    } else {
        errorMessageElement.style.display = 'block'; // Show error message if error exists
    }
}



