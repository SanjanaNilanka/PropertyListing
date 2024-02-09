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
    <script type="text/javascript" src="../js/listing.js"></script>
    <title>List Your Property</title>
</head>
<body>
    <?php require_once "../templates/header.php" ?>
    <main class="main">
        <h2>List Your Property</h2>
        <hr/>
        <div id="options">
            <span class="option" data-target="sale">Sale</span>
            <span class="option" data-target="rent">Rent</span>
        </div>
        <form id="sale" style="display: none;">
            <div>
                <h3>Property Type</h3>
                <div class="type-options">
                    <!-- JavaScript will dynamically generate options here -->
                </div>
                <input type="hidden" id="propertyType" name="propertyType">
            </div>
            <div id="land-types" style="display: none;">
                <h3>Land Type</h3>
                <div class="land-type-options">
                    <!-- JavaScript will dynamically generate options here -->
                </div>
                <input type="hidden" id="landType" name="landType" >
            </div>
            <div id="commercial-types" style="display: none;">
                <h3>Commeercial Type</h3>
                <div class="commercial-type-options">
                    <!-- JavaScript will dynamically generate options here -->
                </div>
                <input type="hidden" id="commercialType" name="commercialType">
            </div>
            <div>
                <div>
                    <div class="listing">
                        <input 
                            class="listing" 
                            name="heading" 
                            placeholder="Three Storie House Sell in..."
                        />
                        <label class="listing">Ad Heading</label>
                    </div>
                    <div class="listing">
                        <input 
                            class="listing" 
                            name="title" 
                            placeholder="Three Storie House Sell in..."
                        />
                        <label class="listing">Ad Heading</label>
                    </div>
                    <div class="listing">
                        <input 
                            class="listing" 
                            name="title" 
                            placeholder="Three Storie House Sell in..."
                        />
                        <label class="listing">Ad Heading</label>
                    </div>
                </div>
            </div>
            
        </form>
        <form id="rent" style="display: none;">
            <!-- Rent form content here -->
            <label for="rent_input">Rent Input:</label>
            <input type="text" id="rent_input" name="rent_input">
        </form>

    </main>
    <?php require_once '../templates/footer.php' ?>
    <script>
        
    </script>
</body>
</html>