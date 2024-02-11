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
    <script src="https://kit.fontawesome.com/ff7dc838b1.js" crossorigin="anonymous"></script>
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
                <h3>Commercial Type</h3>
                <div class="commercial-type-options">
                    <!-- JavaScript will dynamically generate options here -->
                </div>
                <input type="hidden" id="commercialType" name="commercialType">
            </div>
            <h3>Other Details</h3>
            <div style="
                display: flex; 
                justify-content: 
                space-between; 
                align-items: start; 
                gap: 20px;
                margin-top: -10px;
                ">
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
                    <div class="listing" id="floor-area-container">
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
                <div style="width: 50%; display: flex; flex-direction: column;">
                    <div class="listing">
                        <textarea class="listing" placeholder="" id="description" name = 'description'></textarea>
                        <label class="listing">Discription</label>
                    </div>
                    
                </div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: start; gap: 20px;">
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="bedrooms" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Ad Heading</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="bathrooms" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Ad Heading</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="floors" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Ad Heading</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="parkings" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Ad Heading</label>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: start; gap: 20px;">
                <div class="listing">
                    <input 
                        style="padding-right: 10px; cursor: pointer;"
                        class="listing" 
                        name="current-status" 
                        id="current-status" 
                        placeholder="Select Item"
                        readonly
                        onclick='handleOptionInput("currentStatus")'
                    />
                    <label class="listing">Current Status</label>
                    <label class="listing-dropdown" onclick='handleOptionInput("currentStatus")' id="current-status-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                    <div class="option-list" id="current-status-list">
                        <?php
                        $currentStatus  = ['Available', 'Available Soon', 'Available with Discounts'];
                    
                        foreach ($currentStatus as $status) {
                            echo "
                            <div class='option-item' onclick='optionItemClick(\"currentStatus\",\"$status\")'>
                                $status
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="listing" id="construction-status-container">
                    <input 
                        style="padding-right: 10px; cursor: pointer;"
                        class="listing" 
                        name="construction-status" 
                        id="construction-status" 
                        placeholder="Select Item"
                        readonly
                        onclick='handleOptionInput("constructionStatus")'
                    />
                    <label class="listing">Construction Status</label>
                    <label class="listing-dropdown" onclick='handleOptionInput("constructionStatus")' id="construction-status-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                    <div class="option-list" id="construction-status-list">
                        <?php
                        $constructionStatus  = ['Under Construction', 'Ready to Sale / Rent', 'Finished Soon'];
                    
                        foreach ($constructionStatus as $status) {
                            echo "
                            <div class='option-item' onclick='optionItemClick(\"constructionStatus\",\"$status\")'>
                                $status
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="listing" id="furnishing-status-container">
                    <input 
                        style="padding-right: 10px; cursor: pointer;"
                        class="listing" 
                        name="furnishing-status" 
                        id="furnishing-status" 
                        placeholder="Select Item"
                        readonly
                        onclick='handleOptionInput("furnishingStatus")'
                    />
                    <label class="listing">Furnishing Status</label>
                    <label class="listing-dropdown" onclick='handleOptionInput("furnishingStatus")' id="furnishing-status-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                    <div class="option-list" id="furnishing-status-list">
                        <?php
                        $furnishingStatus  = ['Unfurnishing', 'Furnishing'];
                    
                        foreach ($furnishingStatus as $status) {
                            echo "
                            <div class='option-item' onclick='optionItemClick(\"furnishingStatus\",\"$status\")'>
                                $status
                            </div>
                            ";
                        }
                        ?>
                    </div>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="parkings" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Ad Heading</label>
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