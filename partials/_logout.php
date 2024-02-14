<?php
session_start();
session_unset();
session_destroy();
    echo'<script>
    alert("loggedout")
    window.location.href = "../main/index.php"
    </script>';
exit;
?>
