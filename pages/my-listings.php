<?php
session_start();

$userID;

if(!isset($_SESSION['userID'])){
    header("Location: ../pages/home.php");
    exit();
}else{
    $userID = $_SESSION['userID'];
}

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
    <title>Document</title>
</head>
<body>
    <?php require_once '../templates/header.php' ?>
    <main class="main">
         <h2>My Listings</h2>
        <hr/>
        <br/>
        <div class="center-items" style="flex-wrap: wrap; justify-content: space-between;">

            <?php 
            $getBookingsQuery = "SELECT * FROM properties WHERE listedUser = '$userID'";
            $bookings = $conn->query($getBookingsQuery);

            if($bookings){
                while($row = $bookings->fetch_assoc()) {
                    $propertyID = $row['propertyID'];
                    $heading = $row['heading'];
                    $cityDB = $row['city'];
                    $street = $row['street'];
                    $coverImg = $row['coverImg'];
                    $listedDate = $row['listedDate'];
                    $offerTypeDB = $row['offerType'];
                    $propertyTypeDB = $row['propertyType'];
                    $price = $row['price'];

                    echo "
                    <div class='center-items my-listing-item'>
                        <div class='center-items'>
                            <img src='$coverImg' class='my-listings'/>
                        </div>
                        
                        <div class='center-items' style='flex-direction: column; align-items:start; width: 55%; gap: 4px;'>
                            <span style='font-size:20px; font-weight:500;'>$heading</span>
                            <span><i class='fa-solid fa-location-dot'></i> $street, $cityDB</span> 
                            <span style='color:#3cb64a; font-size: 18px; font-weight: 700;'>LKR $price</span>
                            <div class='center-items' style='gap: 20px; margin-top: 5px;'>
                                <div class='center-items' style='flex-direction: column; align-items: start;gap: 5px;'>
                                <span>Listed on $listedDate</span>
                                <span class='tag'>$propertyTypeDB</span>
                                <span class='tag'>For $offerTypeDB</span>
                                </div>
                                <div class='center-items' style='flex-direction: column; align-items: start;gap: 5px;'>
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </div> 
                            
                        </div>
                        <div style='width: 20%;'>
                            <div class='center-items'style='flex-direction: column; align-items:normal;gap: 4px;'>
                            <button class='primary'>View</button>
                            <button class='warning'>Update</button>
                            <button class='danger'>Delete</button>
                            </div>
                        </div>
                    </div>
                    <br/>
                    ";
                }
            }

            ?>
        </div>
    </main>
   

    


    <?php require_once '../templates/footer.php' ?>
</body>
</html>