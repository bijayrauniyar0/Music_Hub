<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sign-up.css">
    <title>Sign Up</title>
</head>
<body>
    <?php require '../partials/_nav.php' ?>
    <main>
    <?php require '../partials/_aside.php' ?>
    <div class="sign-up">
        <h2>Sign Up</h2>
        <form action="sign-up.php" method="POST" class="flex-column">
            <div class="form-group">
                <label for="full_name">Name</label>
                <div class="input-container">
                    <input type="text" id="first_name" name="first_name" placeholder="First Name" required>
                    <input type="text" id="last_name" name="last_name" placeholder="Last Name">
                </div>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="Phone Number" required maxlength="10">
            </div>
            <div class="form-group">
                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" placeholder="Date of Birth" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <div class="input-container2">
                    <input type="password" id="pw" name="pw" placeholder="Enter Your Password" required>
                    <input type="password" id="c-pw" name="c-pw" placeholder="Confrim Password">
                </div>
            </div>
            <div class="form-group">
                <input type="checkbox"><label for="checkbox" id="terms">I accept all the <a href="">Terms & Conditions</a></label>
            </div>
            <div class="button-sign">
                <button type="submit" id="sign-btn">Sign Up</button>
            </div>
        </form>
    </div>
</main>
<?php require '../partials/_footer.php' ?>
</body>
</html>