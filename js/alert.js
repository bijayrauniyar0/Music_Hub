
setTimeout(function() {
    var successAlert = document.getElementById("success-alert");
    if (successAlert) {
        successAlert.style.display = "none";
        window.location.href = "../main/index.php";
    }
}, 4000);

