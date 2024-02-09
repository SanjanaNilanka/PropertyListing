<?php
session_start();

if(isset($_SESSION['email'])){
    header("Location: ../pages/home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/auth.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Yatra+One&family=Cute+Font&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ff7dc838b1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/auth.js"></script>
    <title>Log in</title>
</head>
<body>
    
    <div class="login-container">
        <a href="../index.php">
            <div class="brand-name">
                <span style="font-size: 60px; font-weight: 700; color: #3cb64a;">Ceylon</span>
                <span style="font-size: 70px; font-weight: 500; color: #20409a;">Habitats</span>
            </div>
        </a>
        <h2 style="margin-top: 0;">Sign Up</h2>
        <form action="../scripts/signup-process.php" method="POST" class="login-form">
            <input type="text" class="auth" placeholder="First Name" name="firstname"/>
            <br/>
            <input type="text" class="auth" placeholder="Last Name" name="lastname"/>
            <br/>
            <input type="email" class="auth" placeholder="Email" name="email"/>
            <br/>
            <input type="password" class="auth" placeholder="Password" name="password"/>
            <br/>
            <input type="password" class="auth" placeholder="Confirm Password" name="confirm-password"/>
            <br/>
            <button type="submit" class="login">Sign in</button>
        </form>
        <br/>
        <br/>
        <span>Do you have an account? <a href="../pages/signin.php">Sign In</a></span>
    </div>
    <div style="position: relative; width: 60%;">
        <img style="height: 100vh; width: 100%;" src="https://media.rightmove.co.uk/149k/148583/59477411/148583_BeverlyGarden_IMG_10_0000.jpg"/>
        <div class="img-overview">
        <div class="slideshow-container">
            <div class="slide">
                <h2>Why CeylonHabitats for Buying or Renting</h2>
                <span style="font-size: 18px;">"Find your perfect property with CeylonHabitats – your ultimate destination for buying, renting, or listing properties in Sri Lanka. Explore our diverse listings and start your journey today!"</span>
            </div>
            <div class="slide" style="display: none;">
                <h2>Why CeylonHabitats for Listing Your Property</h2>
                <span style="font-size: 18px;">Maximize your property's exposure with CeylonHabitats – the trusted platform for selling or renting properties in Sri Lanka. List with us to reach a wide audience of potential buyers or renters and unlock the full potential of your investment.</span>
            </div>
            <div class="slide" style="display: none;">
                <h2>Why CeylonHabitats as a Property Solution</h2>
                <span style="font-size: 18px;">Discover the ease of finding your dream property or listing your own with CeylonHabitats – your go-to destination for property solutions in Sri Lanka. Explore our extensive listings and personalized services to start your journey towards your property goals.</span>
            </div>
        </div>
        <div class="navigation-bars"></div>

        </div>
    </div>
</body>
</html>