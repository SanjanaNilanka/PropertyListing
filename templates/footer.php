<footer class="footer">
    <div class="center-items" style="align-items: start;">
        <div>
            <div class="brand-name" style="justify-content: start;">
                <span style="font-size: 40px; font-weight: 700; color: #fff;">Ceylon</span>
                <span style="font-size: 50px; font-weight: 500; color: #fff;">Habitats</span>
            </div>
            <br/>
            <div class="center-items" style="gap: 15px; width: 50%;">
                <i style="font-size: 30px; cursor: pointer;" class="fa-brands fa-square-facebook"></i>
                <i style="font-size: 30px; cursor: pointer;" class="fa-brands fa-square-instagram"></i>
                <i style="font-size: 30px; cursor: pointer;" class="fa-brands fa-square-x-twitter"></i>
                <i style="font-size: 30px; cursor: pointer;" class="fa-brands fa-linkedin"></i>
                <i style="font-size: 30px; cursor: pointer;" class="fa-brands fa-square-whatsapp"></i>
            </div>
            <br/>
            <div class="center-items" style="flex-direction: column; align-items: start; gap: 2px;">
                <span>Call: (+94) 769276950</span>
                <span>email: info@ceylonhabitats.com</span>
                <span>Listing: listing@ceylonhabitats.com</span>
            </div>
        </div>
            
        <div class="center-items" style="flex-direction: column; align-items: start; gap: 15px;">
            <span>Home</span>
            <span>Properties</span>
            <span>Loans</span>
            <span>Contact</span>
            <span>About Us</span>
            <span>Help & Support</span>
        </div>

        

        <div class="center-items" style="flex-direction: column; align-items: normal; gap: 18px;">
            <?php
            if(!isset($_SESSION['userID'])){
                echo "
                <button class='footer'>Sign in</button>
                <button class='footer'>Sign up</button>
                ";
            }
            ?>
            <button class="footer">List Your Property</button>
        </div>   
    </div>
    <br/>
    <hr/>
    <div style="text-align: center; margin-top: 30px;">
    Copyrights © 2024 CeylonHabitats™. All Rights Reserved.
    </div>
</footer>