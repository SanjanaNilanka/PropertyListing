<section class="search" style="background-color: transparent; padding: 0;">
    <form method="GET" action="properties.php">

        <div class="listing" id="furnishing-status-container">
            <input 
                style="padding: 15px; cursor: pointer; font-size: 16px;"
                class="listing " 
                name="city" 
                id="city" 
                placeholder="Type a City / Town Name"
                
                
            />
            <div style="top: 48px;" class="city-list"  id="city-list">
                
            </div>
            <button class="primary search" >Search</button>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; gap: 20px; margin-top: -5px;">
            <div class="listing" id="furnishing-status-container">
                <input 
                    style="padding-right: 10px; cursor: pointer;"
                    class="listing" 
                    name="offer-type" 
                    id="offer-type" 
                    placeholder="Select Offer Type (Sale / Rent)"
                    readonly
                    onclick='handleOptionInput("offer-type")'
                />
                <label class="listing-dropdown" onclick='handleOptionInput("offer-type")' id="offer-type-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                <div class="option-list" id="offer-type-list">
                    <?php
                    $offerTypes  = ['Sale', 'Rent'];
                
                    foreach ($offerTypes as $offerType) {
                        echo "
                        <div class='option-item' onclick='optionItemClick(\"offer-type\",\"$offerType\")'>
                            $offerType
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <div class="listing" id="furnishing-status-container">
                <input 
                    style="padding-right: 10px; cursor: pointer;"
                    class="listing" 
                    name="property-type" 
                    id="property-type" 
                    placeholder="Select Property Type"
                    readonly
                    onclick='handleOptionInput("property-type")'
                />
                <label class="listing-dropdown" onclick='handleOptionInput("property-type")' id="property-type-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                <div class="option-list" id="property-type-list">
                    <?php
                    $propertyTypes  = ['House', 'Apartment', 'Land', 'Commercial', 'Bunglow', 'Villa'];
                
                    foreach ($propertyTypes as $propertyType) {
                        echo "
                        <div class='option-item' onclick='optionItemClick(\"property-type\",\"$propertyType\")'>
                            $propertyType
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <div class="listing" id="land-type-container" style="display: none;">
                <input 
                    style="padding-right: 10px; cursor: pointer;"
                    class="listing" 
                    name="land-type" 
                    id="land-type" 
                    placeholder="Select Land Type"
                    readonly
                    onclick='handleOptionInput("land-type")'
                />
                <label class="listing-dropdown" onclick='handleOptionInput("land-type")' id="land-type-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                <div class="option-list" id="land-type-list">
                    <?php
                    $landTypes  = ['Bare Land', 'Beachfront Land', 'Cultivated Land', 'Coconut Land', 'Waterfront Land', 'Tea Land', 'Cinnamon Land', 'Paddy Land'];
                
                    foreach ($landTypes as $landType) {
                        echo "
                        <div class='option-item' onclick='optionItemClick(\"land-type\",\"$landType\")'>
                            $landType
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <div class="listing" id="commercial-type-container" style="display: none;">
                <input 
                    style="padding-right: 10px; cursor: pointer;"
                    class="listing" 
                    name="commercial-type" 
                    id="commercial-type" 
                    placeholder="Select Commercial Type (Sale / Rent)"
                    readonly
                    onclick='handleOptionInput("commercial-type")'
                />
                <label class="listing-dropdown" onclick='handleOptionInput("commercial-type")' id="commercial-type-dropdown"><i class="fa-solid fa-caret-down"></i></label>
                <div class="option-list" id="commercial-type-list">
                    <?php
                    $commercialTypes  = ['Office Space', 'Buildings', 'Shop Space', 'Multipurpose', 'Warehouse', 'Hotel', 'Factory', 'Guest House'];
                
                    foreach ($commercialTypes as $commercialType) {
                        echo "
                        <div class='option-item' onclick='optionItemClick(\"commercial-type\",\"$commercialType\")'>
                            $commercialType
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>
    
</section>