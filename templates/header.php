<header class="header">
    <div class="brand-name">
        <span style="font-size: 40px; font-weight: 700; color: #3cb64a;">Ceylon</span>
        <span style="font-size: 50px; font-weight: 500; color: #20409a;">Habitats</span>
    </div>
    <nav class="navbar">
        <span class="nav-item-special" id="listings">Listings</span>
        <span class="nav-item">Loans</span>
        <span class="nav-item">About</span>
        <span class="nav-item">Contact</span>
        
        
    </nav>
    <div id="nav-option" class="nav-option">
        <div class='sub-nav-item-container'>
            <span style="font-size: 16px; font-weight: 700;">Habitats for Sale</span>
            <span class='sub-nav-item'>Home</span>
            <span class='sub-nav-item'>Apartments</span>
            <span class='sub-nav-item'>Bungalows</span>
            <span class='sub-nav-item'>Warehouses</span>
            <span class='sub-nav-item'>Shops</span>
            <span class='sub-nav-item'>Villas</span>
            <span class='sub-nav-item'>Annexes</span>
            <span class='sub-nav-item'>Buildings</span>
        </div>
        <div class='sub-nav-item-container'>
            <span style="font-size: 16px; font-weight: 700;">Habitats for Rental</span>
            <span class='sub-nav-item'>Home</span>
            <span class='sub-nav-item'>Apartments</span>
            <span class='sub-nav-item'>Bungalows</span>
            <span class='sub-nav-item'>Warehouses</span>
            <span class='sub-nav-item'>Shops / Restaurents</span>
            <span class='sub-nav-item'>Villas</span>
            <span class='sub-nav-item'>Annexes</span>
            <span class='sub-nav-item'>Buildings</span>
        </div>
        <div class='sub-nav-item-container'>
            <span style="font-size: 16px; font-weight: 700;">Lands for Sale</span>
            <span class='sub-nav-item'>Home</span>
            <span class='sub-nav-item'>Apartments</span>
            <span class='sub-nav-item'>Bungalows</span>
            <span class='sub-nav-item'>Warehouses</span>
            <span class='sub-nav-item'>Shops / Restaurents</span>
            <span class='sub-nav-item'>Villas</span>
            <span class='sub-nav-item'>Annexes</span>
            <span class='sub-nav-item'>Buildings</span>
        </div>
    </div>

    <?php
    require_once '../config/config.php';
    if(isset($_SESSION['userID'])){
        $userID = $_SESSION['userID'];
        $query = "SELECT firstname, lastname FROM users WHERE userID='$userID'";
        $result = $conn->query($query);
        $firstname;
        $lastname;

        while($row = $result->fetch_assoc()){
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
        }
        echo "
        <div style='display: flex; justify-content: space-between; align-items: center; gap: 20px;'>
            <span onclick='handleMenu()' style='cursor:pointer;'>$firstname $lastname</span>
            <span onclick='handleMenu()' class='profile-img'>S</span>
        </div>
        <div class='menu-container' id='menu'>
            <a class='menu-item' href='../pages/profile.php'>
                <span class='menu-item'>Persional Info</span>
            </a>
            <a class='menu-item' href='../pages/my-listings.php'>
                <span class='menu-item'>My Listings</span>
            </a>
            <a class='menu-item' href='../pages/my-msg.php'>
                <span class='menu-item'>My Messages</span>
            </a>
            <a href='../pages/listing.php'><button style='width: 100%;' class='secondary'>List Your Property</button></a>
            <form action='../scripts/logout-process.php'>
                <button type='submit' style='width: 100%;' class='primary'>Log out</button>
            </form>
        </div>
        ";
    }else{
        echo "
        <div>
            <a href='../pages/listing.php'><button class='secondary'>List Your Property</button></a>
            <a href='../pages/signin.php'><button class='primary'>Sign In</button></a>
            <a href='../pages/signup.php'><button class='primary'>Sign Up</button></a>
        </div>
        ";
    }
    ?>
    
</header>

<script>
    function displayNavOption(){
        var trigger = document.getElementById("listings");
        var navOption = document.getElementById("nav-option");

        function showPopup(event) {
            //var item = event.target.dataset.item; 
            
            /*if(item == "Habitats"){
                navOption.innerHTML = `
                <div class='sub-nav-item-container'>
                    <span class='sub-nav-item'>Home</span>
                    <span class='sub-nav-item'>Apartments</span>
                    <span class='sub-nav-item'>Bungalows</span>
                    <span class='sub-nav-item'>Warehouses</span>
                    <span class='sub-nav-item'>Shops / Restaurents</span>
                    <span class='sub-nav-item'>Villas</span>
                    <span class='sub-nav-item'>Annexes</span>
                    <span class='sub-nav-item'>Buildings</span>
                </div>
                <div></div>
                <div></div>
                `
            }if(item == "Lands"){
                navOption.innerText = "Lands"
            }*/

            navOption.classList.add("nav-option-active");
        }

        function hidePopup() {
            navOption.classList.remove("nav-option-active");
        }

        trigger.addEventListener("mouseover", showPopup);
        trigger.addEventListener("mouseout", hidePopup);
       

        navOption.addEventListener("mouseover", showPopup);
        navOption.addEventListener("mouseout", hidePopup);
    }

    document.addEventListener("DOMContentLoaded", displayNavOption());

    function handleMenu(){
        var typesList = document.getElementById('menu')
        if(typesList.classList.contains('menu-container-visible')){
            typesList.classList.remove('menu-container-visible')
        }else{
            typesList.classList.add('menu-container-visible')
        }
    }

</script>