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
         <h2>My Messages</h2>
        <hr/>
        <br/>
        <div class="center-items" style="flex-wrap: wrap; justify-content: space-between;">

            <?php 
            $getMsgQuery = "SELECT * FROM msg WHERE listedUser = '$userID'";
            $messages = $conn->query($getMsgQuery);

            if($messages){
                while($row = $messages->fetch_assoc()) {
                    $name = $row['userName'];
                    $email = $row['userEmail'];
                    $contact = $row['userContact'];
                    $msg = $row['msg'];
                    $listedUser = $row['listedUser'];
                    $propertyID = $row['propertyID'];

                    echo "
                    <div class='msg-item'>
                        <span style='font-size: 18px;'>This message is received from property under property ID $propertyID</span>
                        <span style='text-decoration: underline; color: blue;'><a>Click to See the Property</a></span>
                        <br/>
                        <br/>
                        <div class='center-items'style='gap: 30px; font-size: 20px;width: 300px; '>
                            <div class='center-items'style='gap: 5px; flex-direction: column; align-items: normal;'>
                            <span>From:</span>
                            <span>Email:</span>
                            <span>Contact:</span>
                            
                            </div >
                            <div class='center-items'style='gap: 5px; flex-direction: column; align-items: start;' >
                            <span>$name</span>
                            <span>$email</span>
                            <span>$contact</span>
                            </div>
                            

                        </div>
                        <br/>
                        <div>
                            <div style='font-size: 20px;'>Message:</div>
                            <div>$msg</div>
                        </div>
                    </div>
                    ";
                }
            }

            ?>
        </div>
    </main>
   

    


    <?php require_once '../templates/footer.php' ?>
</body>
</html>