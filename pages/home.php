<?php
session_start();

if(isset($_SESSION['userID'])){
    header("Location: ../pages/home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Yatra+One&family=Cute+Font&display=swap" rel="stylesheet">
    <title>CeylonHabitats</title>
    
</head>
<body>
    <?php require_once '../templates/header.php' ?>
    <main class="main">
    <div class="slideshow-container">
        <div class="slide" style="background-color: #aaa;">Slide 1</div>
        <div class="slide" style="background-color: #bbb;">Slide 2</div>
        <div class="slide" style="background-color: #ccc;">Slide 3</div>
        <div class="slide" style="background-color: #ddd;">Slide 4</div>
        <div class="slide" style="background-color: #eee;">Slide 5</div>
    </div>
    <div class="navigation-bars"></div>
    <script>
        let startX = 0;
        let isDragging = false;
        let slideshow = document.querySelector('.slideshow-container');

        slideshow.addEventListener('mousedown', (e) => {
            startX = e.pageX;
            isDragging = true;
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
            const diffX = e.pageX - startX;
            slideshow.scrollLeft -= diffX / 2.5;
            startX = e.pageX;
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
        });
    </script>
    </main>
    <?php require_once '../templates/footer.php' ?>
</body>
</html>