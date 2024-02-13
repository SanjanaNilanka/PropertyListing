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
    <title>Document</title>
</head>
<body>
    <?php require_once '../templates/header.php' ?>
    <main class="main">
    <?php
    $city = isset($_GET['city']) ? $_GET['city'] : '';
    $offerType = isset($_GET['offer-type']) ? $_GET['offer-type'] : '';
    $propertyType = isset($_GET['property-type']) ? $_GET['property-type'] : '';
    $landType = isset($_GET['land-type']) ? $_GET['land-type'] : '';
    $commercialType = isset($_GET['commercial-type']) ? $_GET['commercial-type'] : '';
    
    $baseQuery  = "SELECT * FROM properties";
    $whereClause = "";
    $conditions = array();
    
    if (!empty($city)) {
        $conditions[] = "city LIKE '%$city%'";
    }
    
    if (!empty($offerType)) {
        $conditions[] = "offerType = '$offerType'";
    }
    
    if (!empty($propertyType)) {
        $conditions[] = "propertyType = '$propertyType'";
    }
    
    if (!empty($landType)) {
        $conditions[] = "landType = '$landType'";
    }
    
    if (!empty($commercialType)) {
        $conditions[] = "commercialType = '$commercialType'";
    }
    
    if (!empty($conditions)) {
        $whereClause = " WHERE " . implode(" AND ", $conditions);
    }
    
    $searchQuery = $baseQuery . $whereClause;
    
    $result = $conn->query($searchQuery);
    ?>
    <?php require_once '../templates/search.php' ?>

        <div class="property-card-container">
            
            <?php
            
            if($result){
                while($row = $result->fetch_assoc()){
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
             }
            }
            ?>
        </div>
    </main>
    <?php require_once "../templates/footer.php"?>
</body>
</html>