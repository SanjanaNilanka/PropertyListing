<?php
    session_start();

    $propertyID = $_GET['property-id'];

    require_once '../config/config.php';



    $getPropertyQuery = "SELECT * FROM properties WHERE propertyID = '$propertyID'";
    $property =  $conn->query($getPropertyQuery);

    if($property){
        if($property->num_rows>0){
            $row = $property->fetch_assoc();

            $heading = $row['heading'];
            $offerType = $row['offerType'];
            $propertyType = $row['propertyType'];
            $price = $row['price'];
            $city = $row['city'];
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
            $map = $row['googleMapLink'];
            $listedUser = $row['listedUser'];

            if($listedUser){
                $getOwnerQuery = "SELECT * FROM users WHERE userID = '$listedUser'";
                $owner = $conn->query($getOwnerQuery);

                if($owner){
                    if($owner->num_rows>0){
                        $ownerDetails = $owner->fetch_assoc();

                        $firstname = $ownerDetails['firstname'];
                        $lastname = $ownerDetails['lastname'];
                        $email = $ownerDetails['email'];
                    }
                }
            }
        }
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
    <title><?php echo $heading?></title>
</head>
<body>
    <?php require_once '../templates/header.php'?>
    <main class="main">
        <?php
            $imgURLs = [];
            $getImgQuery = "SELECT * FROM `property-images` WHERE propertyID = '$propertyID'";
            $images = $conn->query($getImgQuery);

            if ($images->num_rows > 0) {
                while ($row = $images->fetch_assoc()) {
                    $imgURLs[] = $row['imgURL'];
                }
            }
            $moreImagesCount = count($imgURLs)-3;
        ?>
        <?php
        if($coverImg !== '' || $coverImg !== null || $coverImg != '../assets/no_image.png'){
        ?>
        <div class="imgs-container">
            
            <img class="cover-img" src="<?php echo $coverImg ?>" />

            <div class="other-img">
                <div class="imgs-container">
                    <img class="other-img" src="<?php echo $imgURLs[0] ?>" />
                    <img class="other-img" src="<?php echo $imgURLs[1] ?>" />
                </div>
                <div class="imgs-container">
                    <img class="other-img" src="<?php echo $imgURLs[2] ?>" />
                    <div style="width: 50%; height: 225px; position: relative;">
                        <img style="width: 100%; height: 100%;" src="<?php echo $imgURLs[3] ?>" />
                        <div class="img-overlay">
                            <?php echo "+ $moreImagesCount More" ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <br/>
        <?php
        }else{
        ?>
        <div>
        <img class="cover-img" src="<?php echo $coverImg ?>" />
        </div>
        <?php
        }
        ?>
        <h1><?php echo $heading?></h1>
        <div style="display: flex; justify-content: start; align-items: center; gap: 10px;">
            <i class="fa-solid fa-location-dot"></i>
            <span><?php echo "$street, $city" ?></span>
        </div>
        <br/>
        <div style="display: flex; align-items: center; gap: 25px;">
            <span style="display: flex; align-items: center; gap: 15px;">
                <?php 
                if($bedrooms){
                    echo "<img src='../assets/bedroom.svg'/> <span>$bedrooms</span>";
                }
                ?>
            </span>
            <span style="display: flex; align-items: center; gap: 15px;">
                <?php 
                if($bathrooms){
                    echo "<img style='width: 24px;' src='../assets/bathroom.png'/> <span>$bathrooms</span>";
                }
                ?>
            </span>
            <span style="display: flex; align-items: center; gap: 15px;">
                <?php 
                if($parkings){
                    echo "<img style='width: 30px;' src='../assets/parking.png'/> <span>$parkings</span>";
                }
                ?>
            </span>
            <span style="display: flex; align-items: center; gap: 15px;">
                <?php 
                if($floors >= 1){
                    echo "<img style='width: 22px;' src='../assets/floors.png'/> <span>$floors</span>";
                }
                ?>
            </span>
            <span style="display: flex; align-items: center; gap: 15px;">
                <?php 
                if($floorArea){
                    echo "<img style='width: 22px;' src='../assets/floorsize.svg'/> <span>$floorArea sq.ft.</span>";
                }
                ?>
            </span>
        </div>
        <br/>
        <span class="property-price">
            <?php
            if($offerType === 'Sale' || $offerType === 'sale'){
                if($propertyType == 'land'){
                    echo "$price LKR per Purchase";
                }else{
                    echo "$price LKR Total Amount";
                }
            }else if($offerType === 'Rent' || $offerType === 'rent'){
                if($propertyType == 'land'){
                    echo "$price LKR per Purchase";
                }else{
                    echo "$price LKR per Month";
                }
            }
            ?>
        </span>
        <br/>
        <hr style="margin-top: 15px; margin-bottom: 15px;"/>
        <div style="display: flex; justify-content: space-between; gap: 80px;">
            <div style="width: 60%;">
                <h2 style="margin-bottom: 10px;">Overview</h2>
                
                <div class="property-overview-container">
                    <span style="text-align: center;">
                        <?php
                        if($currentStatus){
                            echo "
                            <h4 style='margin: 0;'>Current Status</h4>
                            <p>$currentStatus</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($listedDate){
                            echo "
                            <h4 style='margin: 0;'>Available From</h4>
                            <p>$listedDate</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($floorArea){
                            echo "
                            <h4 style='margin: 0;'>Floor Area</h4>
                            <p>$floorArea Sq.ft.</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($landArea){
                            echo "
                            <h4 style='margin: 0;'>Land Area</h4>
                            <p>$landArea Purchase</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($bedrooms){
                            echo "
                            <h4 style='margin: 0;'>Bedrooms</h4>
                            <p>$bedrooms</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($bathrooms){
                            echo "
                            <h4 style='margin: 0;'>Bathrooms</h4>
                            <p>$bathrooms</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($parkings){
                            echo "
                            <h4 style='margin: 0;'>Parkings</h4>
                            <p>$parkings</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($floors >=1 ){
                            echo "
                            <h4 style='margin: 0;'>Floors</h4>
                            <p>$floors</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($furnishingStatus){
                            echo "
                            <h4 style='margin: 0;'>Furnishing Status</h4>
                            <p>$furnishingStatus</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($constructionStatus){
                            echo "
                            <h4 style='margin: 0;'>Construction Status</h4>
                            <p>$constructionStatus</p>
                            ";
                        }
                        ?>
                    </span>
                    <span style="text-align: center;">
                        <?php
                        if($ageOfBuilding){
                            echo "
                            <h4 style='margin: 0;'>Age 0f Building</h4>
                            <p>$ageOfBuilding Years</p>
                            ";
                        }
                        ?>
                    </span>
                </div>
                
                <h2 style="margin-top: 30px; margin-bottom: 10px;">Description</h2>
                <pre><?php echo $description ?></pre>
                
                <h2 style="margin-top: 30px; margin-bottom: 10px;">Property Features</h2>
                <span>Nothing to show features</span>
                
                <h2 style="margin-top: 30px; margin-bottom: 10px;">Map View</h2>
                <div style="display: flex; justify-content: start; align-items: center; gap: 10px;">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><?php echo "$street, $city" ?></span>
                </div>
                <iframe 
                    src="<?php echo$map?>" 
                    width="100%" 
                    height="300" 
                    style="border: 1px solid #ccc; margin-top: 10px; border-radius: 10px;" 
                    allowfullscreen="true" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade"
                >

                </iframe>
            </div>
            <div style="width: 40%;">
                <h2 >Contact Details</h2>
                <br/>
                <div class="contact-container">
                        <div style="display: flex; align-items: center; flex-direction: column;">
                            <img style="height: 100px;" src="https://static.vecteezy.com/system/resources/previews/019/879/186/original/user-icon-on-transparent-background-free-png.png"/>
                            <h4><?php echo "$firstname $lastname"?></h4>
                            <button style="width: 100%;" class="primary" ><i class="fa-solid fa-phone"></i>&nbsp;&nbsp;&nbsp;+94 <?php  echo $contact?></button>
                            <br/>
                            <div style="width: 100%; display: flex; align-items: center; justify-content: space-between; gap: 10px;">
                                <button style="width: 50%;" class="primary" ><i class="fa-brands fa-whatsapp"></i>&nbsp;&nbsp;&nbsp;WhatsApp</button>
                                <button style="width: 50%;" class="secondary" ><i class="fa-regular fa-envelope"></i>&nbsp;&nbsp;&nbsp;Email</button>
                            </div>
                        </div>
                        <h3>Sent Message to Owner</h3>
                        <form method="POST" action="../scripts/msg-process.php">
                        <div style="display: flex; justify-content: space-between; align-items: start; gap: 20px;">
                            <div style="display: flex; flex-direction: column; gap: 10px; width: 50%;">
                                <input class="msg" name="name" placeholder="Your Name"/>
                                <input class="msg" name="email" placeholder="Your Email"/>
                                <input class="msg" name="contact" placeholder="Your Contact Number"/>
                                <input type="hidden" class="msg" name="listedUser" value="<?php echo $listedUser ?>" placeholder="Your Contact Number"/>
                                <input type="hidden" class="msg" name="propertyID" value="<?php echo $propertyID ?>" placeholder="Your Contact Number"/>
                            </div>
                            <div style="display: flex; flex-direction: column; gap: 20px; width: 50%; height: 100%;">
                                <textarea class="msg" name="msg" placeholder="Message"></textarea>
                            </div>
                        </div>
                        <?php
                        if (isset($_GET['success'])){
                            echo '<p style="color:green;  margin-bottom: -10px; text-align:center;">'.$_GET['success'].'</p>';
                        }
                        ?>
                        <br/>
                        <button class="primary" style="width: 100%;">Send</button>
                        </form>
                </div>
                <br/>
                <div style="display: flex; gap: 20px;">
                    <button style="width: 50%;" class="secondary"> <i class="fa-brands fa-square-whatsapp"></i> <i class="fa-brands fa-square-facebook"></i> <i class="fa-solid fa-message"></i> Share</button>
                    <button style="width: 50%;" class="primary"><i class="fa-regular fa-star"></i> Save</button>
                </div>
            </div>
        </div>
        <div>
            
        </div>
    </main>
    <?php require_once '../templates/footer.php'?>
</body>
</html>