<?php
session_start();

require_once '../config/config.php';

$heading = $_POST['heading'];
$offerType = $_POST['offerType'];
$propertyType = $_POST['propertyType'];
$price = $_POST['price'];
$city = $_POST['city'];
$street = $_POST['street'];

/*$currentStatus = null;
$listedDate = null;
$description = null;
$landArea = null;
$floorArea = null;
$bedrooms = null;
$bathrooms = null;
$parkings = null;
$floors = null;
$furnishingStatus = null;
$constructionStatus = null;
$ageOfBuilding = null;
$landTypeDB = null;    
$commercialTypeDB = null;*/

if(isset($_POST['landType'])){
    $landType = $_POST['landType'];
}else{
    $landType = null;
}

if(isset($_POST['commercialType'])){
    $commercialType = $_POST['commercialType'];
}else{
    $commercialType = null;
}

if(isset($_POST['currentStatus'])){
    $currentStatus = $_POST['currentStatus'];
}else{
    $currentStatus = null;
}

if(isset($_POST['landArea'])){
    $landArea = $_POST['landArea'];
}else{
    $landArea = NULL;
}

if(isset($_POST['floorArea'])){
    $floorArea = $_POST['floorArea'];
}else{
    $floorArea = null;
}

if(isset($_POST['bathrooms'])){
    $bathrooms = $_POST['bathrooms'];
}else{
    $bathrooms = null;
}

if(isset($_POST['bedrooms'])){
    $bedrooms = $_POST['bedrooms'];
}else{
    $bedrooms = null;
}

if(isset($_POST['parkings'])){
    $parkings = $_POST['parkings'];
}else{
    $parkings = null;
}

if(isset($_POST['floors'])){
    $floors = $_POST['floors'];
}else{
    $floors = null;
}

if(isset($_POST['furnishingStatus'])){
    $furnishingStatus = $_POST['furnishingStatus'];
}else{
    $furnishingStatus = null;
}

if(isset($_POST['constructionStatus'])){
    $constructionStatus = $_POST['constructionStatus'];
}else{
    $constructionStatus = null;
}

if(isset($_POST['ageOfBuilding'])){
    $ageOfBuilding = $_POST['ageOfBuilding'];
}else{
    $ageOfBuilding = null;
}

$description = $_POST['description'];
$contact = $_POST['contact'];
$whatsapp = $_POST['whatsapp'];
$map = $_POST['googleMapLink'];
$listedUser = $_POST['listedUser'];

//$coverImg = $_POST['coverImg'];
$coverImg = '../assets/no_image.png';

//$listedDate = $_POST['listedDate'];
$listedDate = date('Y-m-d');

function generatePropertyID($offerType, $listedUser) {
    $offerTypeLetter = substr($offerType, 0, 1);

    $randomDigits = mt_rand(1000, 9999);

    $propertyID = "$listedUser-$offerTypeLetter$randomDigits";

    return $propertyID;
}

function generateUniquePropertyrID($conn, $offerType, $listedUser) {
    do {
        $propertyID = generatePropertyID($offerType, $listedUser);
    } while (isPopertyIDExistsInDatabase($propertyID, $conn));

    return $propertyID;
}

function isPopertyIDExistsInDatabase($propertyID,$conn) {

    $propertyIDCheckingQuery = "SELECT * FROM properties WHERE propertyID='$propertyID'";
    $propertyIDResult = $conn->query($propertyIDCheckingQuery);

    return ($propertyIDResult->num_rows > 0);
}

$newPropertyID = generateUniquePropertyrID($conn, $offerType, $listedUser);

$createPropertyQuery = "INSERT INTO properties 
                        VALUES (
                            '$newPropertyID',
                            '$heading',
                            '$offerType',
                            '$propertyType', 
                            $price,
                            '$city',
                            '$street',
                            '$coverImg', 
                            '$currentStatus', 
                            '$listedDate', 
                            '$description',
                            " . ($landArea !== null ? "'$landArea'" : NULL) . ",
                            $bedrooms,
                            $bathrooms,
                            $parkings,
                            $floors,
                            " . ($floorArea !== null ? "'$floorArea'" : NULL) . ",
                            '$furnishingStatus',
                            '$constructionStatus',
                            $ageOfBuilding,
                            '$contact',
                            '$whatsapp',
                            '$map',
                            '$landType',
                            '$commercialType',
                            '$listedUser'
                        )";

echo "$createPropertyQuery";
$createProperty = $conn->query($createPropertyQuery);



if($createProperty === TRUE){
    header("Location: ../pages/my-properties.php");
    echo "success";
    exit(); 
}else{
    header("Location: ../pages/listing.php?error=Error Occured!");
    echo "Error: " . $conn->error;
    exit();
}

?>