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
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; border: 1px solid;">
                <div style="width: 50%;">
                    <div class="listing">
                        <input 
                            style="padding-right: 10px;"
                            class="listing" 
                            name="heading" 
                            placeholder="Three Storie House Sell in..."
                        />
                        <label class="listing">Ad Heading</label>
                    </div>
                    <div class="listing">
                        <input 
                            class="listing" 
                            name="price" 
                            placeholder="3000000"
                        />
                        <label class="listing">Price</label>
                        <label class="listing-tag" id="price-tag" style="display: block;">LKR</label>
                    </div>
                    <div class="listing">
                        <input 
                            type="number"
                            class="listing" 
                            name="land-area" 
                            placeholder="5"
                        />
                        <label class="listing">Land Area</label>
                        <label class="listing-tag" style="display: block;">Purchase</label>
                    </div>
                    <div class="listing">
                        <input 
                            type="number"
                            class="listing" 
                            name="floor-area" 
                            placeholder="2000"
                        />
                        <label class="listing">Floor Area</label>
                        <label class="listing-tag" style="display: block;">Square Feet</label>
                    </div>
                </div>
                <div style="width: 50%; display: flex; flex-direction: column; flex-grow: 1;">
                    <textarea class="listing"></textarea>
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