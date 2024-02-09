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
    <div>
        <a href="../pages/listing.php"><button class="secondary">List Your Property</button></a>
        <button class="primary">Sign In</button>
        <button class="primary">Sign Up</button>
    </div>
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
</script>