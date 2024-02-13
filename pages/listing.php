<?php
session_start();

if(!isset($_SESSION['userID'])){
    header("Location: ../pages/home.php");
    exit();
}else{
    require_once '../config/config.php';
    $userID = $_SESSION['userID'];
    $query = "SELECT firstname, lastname, email FROM users WHERE userID='$userID'";
    $result = $conn->query($query);
    $firstname;
    $lastname;
    $email;

    while($row = $result->fetch_assoc()){
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
    }

    $fullName = "$firstname $lastname";
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
        <div id="options" class="offer-types">
           
        </div>
        
        <form method="POST" action="../scripts/listing-create-process.php">
            <input type="hidden" id="offer-type" name="offerType"/>
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
                            name="landArea" 
                            placeholder="5"
                        />
                        <label class="listing">Land Area</label>
                        <label class="listing-tag" style="display: block;">Purchase</label>
                    </div>
                    <div class="listing" id="floor-area-container">
                        <input 
                            type="number"
                            class="listing" 
                            name="floorArea" 
                            placeholder="2000"
                        />
                        <label class="listing">Floor Area</label>
                        <label class="listing-tag" style="display: block;">Square Feet</label>
                    </div>
                </div>
                <div style="width: 50%; display: flex; flex-direction: column;">
                    <div class="listing">
                        <textarea class="listing" placeholder="" id="description" name = 'description'></textarea>
                        <label class="listing">Description</label>
                    </div>
                    
                </div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: start; gap: 20px;">
                <div class="listing">
                    <input 
                        type="number"
                        style="padding-right: 10px;"
                        class="listing" 
                        name="bedrooms" 
                        placeholder="3"
                    />
                    <label class="listing">No of Bedroms</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="bathrooms" 
                        placeholder="3"
                    />
                    <label class="listing">No of Bathrooms</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="floors" 
                        placeholder="3"
                    />
                    <label class="listing">No of Floors</label>
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="parkings" 
                        placeholder="1."
                    />
                    <label class="listing">No of Parkings</label>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between; align-items: start; gap: 20px;">
                <div class="listing">
                    <input 
                        style="padding-right: 10px; cursor: pointer;"
                        class="listing" 
                        name="currentStatus" 
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
                        name="constructionStatus" 
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
                        name="furnishingStatus" 
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
                        name="ageOfBuilding" 
                        placeholder="Three Storie House Sell in..."
                    />
                    <label class="listing">Age of Building</label>
                </div>
            </div>
            <h3>Location Details</h3>
            <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; margin-top: -10px;">
                <div class="listing" id="furnishing-status-container">
                    <input 
                        style="padding-right: 10px; cursor: pointer;"
                        class="listing" 
                        name="city" 
                        id="city" 
                        placeholder="Gampaha"
                        
                        
                    />
                    <label class="listing">City / Town</label>
                    <label class="listing-dropdown"  id="city-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                    <div class="city-list"  id="city-list">
                        
                    </div>
                    
                </div>
                <div class="listing">
                    <input 
                        style="padding-right: 10px;"
                        class="listing" 
                        name="street" 
                        placeholder="Park Road"
                    />
                    <label class="listing">Street</label>
                </div>
            </div>
            <br/>
            <div id="map"></div>
            <div class="listing">
                <input 
                    type="text" id="coordinates"
                    style="padding-right: 10px;"
                    class="listing" 
                    name="googleMapLink" 
                    placeholder="https://www.google.com/maps/embed?pb=!1m14!1m12!1m..."
                />
                <label class="listing">Map Link</label>
            </div>

            <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
            <script>
                function initMap() {
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: { lat: 40.7128, lng: -74.0060 }, // Default to New York
                        zoom: 8
                    });

                    var marker = new google.maps.Marker({
                        map: map,
                        draggable: true // Allow marker to be dragged
                    });

                    google.maps.event.addListener(map, 'click', function(event) {
                        updateMarker(event.latLng.lat(), event.latLng.lng(), 'coordinates');
                    });

                    google.maps.event.addListener(marker, 'dragend', function(event) {
                        updateMarker(event.latLng.lat(), event.latLng.lng(), 'coordinates');
                    });

                    function updateMarker(latitude, longitude, inputId) {
                        marker.setPosition({ lat: latitude, lng: longitude });
                        var input = document.getElementById(inputId);
                        if (input) {
                            input.value = latitude + ',' + longitude;
                        }
                    }
                }
            </script>
            <h3>Contact Details</h3>
            <div style="display: flex; justify-content: space-between; gap: 20px; margin-top: -10px;">
                <div style="width: 50%;">
                    <div class="listing">
                        <input 
                            type="text" id="coordinates"
                            style="padding-right: 10px;"
                            class="listing" 
                            name="owner-name" 
                            placeholder="Name"
                            value="<?php echo $fullName ?>"
                            readonly
                        />
                        <label class="listing">Owner Name</label>
                    </div>
                    <div class="listing">
                        <input 
                            type="text" id="coordinates"
                            style="padding-right: 10px;"
                            class="listing" 
                            name="owner-email" 
                            placeholder="Name"
                            value="<?php echo $email ?>"
                            readonly
                        />
                        <label class="listing">Email</label>
                    </div>
                </div>
                <div style="width: 50%;">
                    <div class="listing">
                        <input 
                            type="text" id="coordinates"
                            style="padding-right: 10px;"
                            class="listing" 
                            name="contact" 
                            placeholder="Name"
                        />
                        <label class="listing">Contact Number</label>
                    </div>
                    <div class="listing">
                        <input 
                            type="text" id="coordinates"
                            style="padding-right: 10px;"
                            class="listing" 
                            name="whatsapp" 
                            placeholder="Name"
                        />
                        <label class="listing">Whatsapp</label>
                    </div>
                    <input type="hidden" name="listedUser" value="<?php echo $_SESSION['userID'] ?>"/>
                </div>
                
            </div>
            <br/>
            <div style="display: flex; justify-content: right; gap: 20px;">
                <button class="secondary" type="reset">Clear the Form</button>
                <button class="primary" type="submit">Post Advertisement</button>
            </div>
        </form>

    </main>
    <?php require_once '../templates/footer.php' ?>
    <script>
        
    </script>
</body>
</html>