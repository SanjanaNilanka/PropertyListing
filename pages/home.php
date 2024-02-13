<?php
session_start();

require_once '../config/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Yatra+One&family=Cute+Font&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ff7dc838b1.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="../js/properties.js"></script>
    <title>CeylonHabitats</title>
    
</head>
<body>
    
    <?php require_once '../templates/header.php' ?>
    <main class="main" style="padding-top: 80px;">
        <?php
        $city = isset($_GET['city']) ? $_GET['city'] : '';
        $offerType = isset($_GET['offer-type']) ? $_GET['offer-type'] : '';
        $propertyType = isset($_GET['property-type']) ? $_GET['property-type'] : '';
        $landType = isset($_GET['land-type']) ? $_GET['land-type'] : '';
        $commercialType = isset($_GET['commercial-type']) ? $_GET['commercial-type'] : '';
        
        $searchQuery  = "SELECT * FROM properties WHERE offerType = 'Sale' OR offerType = 'sale'";
        
        
        $searchResult = $conn->query($searchQuery);
        ?>
        <section class="home-cover">
            <div class="home-cover-content">
                <div class="brand-name" style="justify-content: center;">
                    <span style="font-size: 80px; font-weight: 700; color: #3cb64a;">Ceylon</span>
                    <span style="font-size: 90px; font-weight: 500; color: #20409a;">Habitats</span>
                </div>
                <div style="font-size: 20px; text-align: center; color: #fff; margin-top: -20px; margin-bottom: 40px;">
                    Find Your Dream Place to Live
                </div>
                <?php require_once "../templates/search-home.php" ?>
            </div>
            <div class="overlay-cover">

            </div>
        </section>
        <h2 style="margin-top: 25px;">What Do You Want?</h2>
        <hr/>
        <div class="quick-access-container">
            <div class="quick-access">
                <div class="quick-access-heading">Find a property for sale</div>
                <div class="quick-access-content">Find a House, Apartment or Building for sale</div>
            </div>
            <div class="quick-access">
                <div class="quick-access-heading">Find a property for rent</div>
                <div class="quick-access-content">Find a House, Annexe Apartment or Building for rent</div>
            </div>
            <div class="quick-access">
                <div class="quick-access-heading">Find a land for sale</div>
                <div class="quick-access-content">Find a Residential or Commercial lands for sale</div>
            </div>
            <div class="quick-access">
                <div class="quick-access-heading">Post Your Advertisement</div>
                <div class="quick-access-content">Post your property advertisement</div>
            </div>
            <div class="quick-access">
                <div class="quick-access-heading">Find new apartments</div>
                <div class="quick-access-content">Find the best Luxuary apartments in Sri Lanka</div>
            </div>
        </div>

        <h2 style="margin-top: 25px;">Latest Properties for Sale</h2>
        <hr/>
        <div class="property-card-container">
            
            <?php
            
            if($searchResult){
                $count = 0;
                while($row = $searchResult->fetch_assoc()){
                    $propertyID = $row['propertyID'];
                    $heading = $row['heading'];
                    $offerTypeDB = $row['offerType'];
                    $propertyTypeDB = $row['propertyType'];
                    $price = $row['price'];
                    $cityDB = $row['city'];
                    $street = $row['street'];
                    $coverImg = $row['coverImg'];
                    $currentStatus = $row['currentStatus'];
                    $listedDate = $row['listedDate'];
                    $description = $row['description'];
                    $landArea = $row['landArea'];
                    $floorArea = $row['floorArea'];
                    $bedrooms = $row['bedrooms'];
                    $bathrooms = $row['bathrooms'];
                    $parkings = $row['parkings'];
                    $floors = $row['floors'];
                    $furnishingStatus = $row['furnishingStatus'];
                    $constructionStatus = $row['constructionStatus'];
                    $ageOfBuilding = $row['ageOfBuilding'];
                    $contact = $row['contact'];
                    $whatsapp = $row['whatsapp'];
                    $map = $row['googleMapLink'];
                    $landTypeDB = $row['landType'];
                    $commercialTypeDB = $row['commercialType'];

                    $words = str_word_count($description, 1);
                    $shortDescription = implode(' ', array_slice($words,0,25));

                    echo "
                    
                    ";
               
            ?>
            <a style='color: black;' href='./property.php?property-id=<?php echo $propertyID?>'>
                <div class='property-card'>
                    
                    <img class='property-card-img' src='<?php echo$coverImg ?>' alt='image of $propertyID'/>
                    
                    
                    <div class='property-card-info'>
                        <div class='center-items'>
                            <div class="center-items" style="justify-content: start; gap: 15px;">
                                <?php
                                if($bedrooms && $bedrooms != 0){
                                    echo "<span class='center-items' stylE='gap: 5px;'><img style='width: 20px;' src='../assets/bedroom.svg'/> <span>$bedrooms</span></span>";
                                }if($bathrooms && $bathrooms != 0){
                                    echo "<span class='center-items' stylE='gap: 5px;'><img style='width: 20px;' src='../assets/bathroom.png'/> <span>$bathrooms</span></span>";
                                }
                                
                                if($propertyType === 'Land'){
                                    if($landArea && $landArea != 0){
                                        echo "<span class='center-items' stylE='gap: 5px;'><img style='width: 20px;' src='../assets/floorsize.png'/> <span>$landArea perches </span></span>";
                                    }
                                }else{
                                    if($floorArea && $floorArea != 0){
                                        echo "<span class='center-items' stylE='gap: 5px;'><img style='width: 20px;' src='../assets/floorsize.svg'/> <span>$floorArea sqft</span></span>";
                                    }
                                }
                                
                                ?>


                                
                            </div>
                            <div>
                                <?php
                                if($propertyTypeDB){
                                    if($propertyTypeDB === 'Land'){
                                        if($landTypeDB){
                                            echo "<span class='tag'>$landTypeDB</span>";
                                        }else{
                                            echo "<span class='tag'>$propertyTypeDB</span>";
                                        }
                                    }else if($propertyTypeDB === 'Commercial'){
                                        if($commercialTypeDB){
                                            echo "<span class='tag'>$commercialTypeDB</span>";
                                        }else{
                                            echo "<span class='tag'>$propertyTypeDB</span>";
                                        }
                                    }else{
                                        echo "<span class='tag'>$propertyTypeDB</span>";
                                    }
                                }else{
                                    echo "<span class='tag'>Property</span>";
                                }
                                
                                ?>
                                <?php
                                echo "<span class='tag'>For $offerTypeDB</span>"
                                ?>
                            </div>
                        </div>
                        <hr style='border: 0.5px solid rgb(0, 0, 0, 0.25);'/>
                        <div style='font-size: 14px; text-align: justify; min-height: 100px;'>
                            <div style="font-size: 18px; font-weight: 700;">
                                <?php echo $heading?>
                            </div>
                            <div style="margin-top: 10px;">
                                <i class="fa-solid fa-location-dot"></i>
                                <?php echo "$street, $cityDB" ?>
                            </div>
                        </div>
                        <hr style='border: 0.5px solid rgb(0, 0, 0, 0.25);'/>
                        <div class='center-items'>
                            <div>
                                <?php  
                                if($propertyTypeDB == 'Land'){
                                    echo "<span style='color:#3cb64a; font-size: 20px; font-weight: 700;'>LKR $price <span style='font-size: 14px; color: gray; font-weight: 500;'>Per Perch</span></span>";
                                }else{
                                    echo "<span style='color:#3cb64a; font-size: 20px; font-weight: 700;'>LKR $price <span style='font-size: 14px; color: gray; font-weight: 500;'>Total</span></span>";
                                }
                                ?> 
                            </div>
                            <div style='font-size: 14px;'>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </a>

            <?php 
                    $count++;
                    if ($count >= 6) {
                        break; // Exit the loop once 6 results have been processed
                    }
                }
            }
            ?>
        </div>
    </main>
    <?php require_once '../templates/footer.php' ?>
    
</body>
</html>