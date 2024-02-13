<?php
session_start();
require_once '../config/config.php';
$userID;

if(!isset($_SESSION['userID'])){
    header("Location: ../pages/home.php");
    exit();
}else{
    $userID = $_SESSION['userID'];
}

$firstName = "";
$lastName = "";
$email = "";
$propertyCount = null;

$getuserQuery = "SELECT * FROM users WHERE userID = '$userID'";
$user = $conn->query($getuserQuery);

if($user){
    if ($user->num_rows > 0) {
        $row = $user->fetch_assoc();

        $firstName = $row['firstname'];
        $lastName = $row['lastname'];
        $email = $row['email'];
        $propertyCount = $row['propertyCount'];
        
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/styles.css"/>
    <link rel="stylesheet" href="../styles/profile.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&family=Yatra+One&family=Cute+Font&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/ff7dc838b1.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php require_once '../templates/header.php' ?>
    <main class="main">
        <div class="center-items">

        <div class="center-items" style="gap: 15px;">
            <span class="profile-letter-img">
                <?php
                    $firstLetter = ucwords(substr($firstName, 0, 1));
                    echo $firstLetter;
                ?>
            </span>
            <span class="center-items" style="flex-direction: column; align-items: start;">
                <span style="font-size: 24px; font-weight: 500;"><?php echo $firstName.' '.$lastName ?></span>
                <span><?php echo $email ?></span>
            </span>
        </div>
        <div>
            <a><button onclick="showPopup('password')" class="primary">Change Password</button></a>
            <a><button class="primary">Delete Account</button></a>
        </div>

        </div>

        <h2 style="margin-top: 30px;">Persional Details</h2>

        <div id="profle-popup" class="profle-popup">
            <div id="inner-container">

            </div>
        </div>
        <script>
            function showPopup(name) {
                document.getElementById("profle-popup").style.display = "block";
                var innerContainer = document.getElementById("inner-container")
                if(name == "name"){
                    innerContainer.innerHTML = `
                    <div class='center-items'>
                        <h3>Edit your Name</h3>
                        <span style='font-size:30px; font-weight: 700;' onclick="closePopup()"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    
                    <form method='POST' action='../scripts/edit-profile-process.php'>
                        <input name='firstname' placeholder='First Name' class='booking' value='<?php echo $firstName?>'/>
                        <input name='lastname' placeholder='Last Name' class='booking' value='<?php echo $lastName?>'/>
                        <button style='float:right;' type='submit' class='primary'>Save</button>
                    </form>`
                }if(name == "email"){
                    innerContainer.innerHTML = `
                    <div class='center-items'>
                        <h3>Edit Your Email</h3>
                        <span style='font-size:30px; font-weight: 700;' onclick="closePopup()"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    
                    <form method='POST' action='../scripts/edit-profile-process.php'>
                        <input name='email' placeholder='Email' class='booking' value='<?php echo $email?>'/>
                        <button style='float:right;' type='submit' class='primary'>Save</button>
                    </form>`
                }if(name == "password"){
                    innerContainer.innerHTML = `
                    <div class='center-items'>
                        <h3>Edit Your Password</h3>
                        <span style='font-size:30px; font-weight: 700;' onclick="closePopup()"><i class="fa-solid fa-xmark"></i></span>
                    </div>
                    
                    <form method='POST' action='../scripts/edit-profile-process.php'>
                        <input type='password' name='old-password' placeholder='Old Password' class='booking' value=''/>
                        <input type='password' name='new-password' placeholder='New Password' class='booking' value=''/>
                        <input type='password' name='confirm-password' placeholder='Confirm New Password' class='booking' value=''/>
                        <button style='float:right;' type='submit' class='primary'>Save</button>
                    </form>`
                }
            }
            function closePopup() {
                document.getElementById("profle-popup").style.display = "none";
            }
        </script>

        <hr/>
        <div class="profile-item">
            <span style="font-weight: 700; width: 20%;">Name</span>
            <span style="width: 50%;"><?php echo $firstName.' '.$lastName ?></span>
            <span style="color: #0C8CE9;" onclick="showPopup('name')"><i class="fa-solid fa-pen-to-square"></i></span>
        </div>
        
        <hr/>

        <div class="profile-item">
            <span style="font-weight: 700 ; width: 20%;">Email</span>
            <span style="width: 50%;"><?php echo $email?></span>
            <span style="color: #0C8CE9;" onclick="showPopup('email')"><i class="fa-solid fa-pen-to-square"></i></span>
        </div>
        <hr/>
        <?php 
            if($propertyCount != 0 || $propertyCount!= null){
        ?>
        <div class="profile-item">
            <span style="font-weight: 700 ; width: 20%;">No of Your Listed Properties</span>
            <span style="width: 50%;"><?php echo $propertyCount?></span>
            <span style="color: #0C8CE9;" onclick="showPopup('email')"><a>See Properties</a></span>
        </div>
        <hr/>
        <?php
            }
        ?>
        
    </main>
    <?php require_once "../templates/footer.php"?>

</body>
</html>