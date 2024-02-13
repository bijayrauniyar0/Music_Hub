<?php
session_start();
session_unset();
session_destroy();
//after clicking log out user is shown with a alert and then redirected to login page.
    echo'
    <script>
        alert("Logged Out");
        window.location.href = "main/guest-login.php"; 
    </script>';
exit;
?>