<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-in.css">
    <title>Document</title>
</head>
<body>
    <?php require '../partials/_nav.php' ?>
    <main>
    <?php require '../partials/_aside.php' ?>
        <div class="form-container">
            <h2>Sign In</h2>
            <form action="signining.php" method="POST">
                <div class="form-group">
                    <label for="email">Email</label><br>
                    <input type="email" id="email" name="email" required><br>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" required>
                </div>
                <span class="sbt-btn">
                    <input type="submit" id="login" value="LOGIN">
                </span>
            </form>


            <h3 class="new-member">New Member? <a href="sign-up.php">Sign Up</a></h3>
        </div>
    </main>
    <?php require '../partials/_footer.php' ?>
</body>
</html>