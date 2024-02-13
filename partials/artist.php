<head>
    <link rel="stylesheet" href="../css/artist.css">
    <script src="https://kit.fontawesome.com/2f01e0402b.js" crossorigin="anonymous"></script>
</head>
<div class="artists-form">
    <span id="create-heading">
        <h2>Open Pathway</h2>
        <h2><i class="fa-solid fa-xmark"></i></h2>
    </span>
    <form action="artist.php">
        <div class="form-group3">
            <label for="Name">Stage Name</label>
            <input type="text" id="Name" require>
        </div>
        <div class="form-group3">
            <label for="handle">Handle</label>
            <input type="text" id="handle" require>
        </div>
        <div class="next-btn-container">
            <button type="submit" id="next-btn"><span class="next-btn">Next</span></button>
        </div>
    </form>
</div>