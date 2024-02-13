/*document.addEventListener('DOMContentLoaded', function() {
    const options = document.querySelectorAll('.option');
    const saleOption = document.querySelector('.option[data-target="sale"]');

    // Function to show the sale form and highlight the sale option
    function showSaleForm() {
        const saleForm = document.getElementById('sale');
        saleForm.style.display = 'block';

        options.forEach(function(opt) {
            opt.style.backgroundColor = 'transparent';
        });
        saleOption.style.backgroundColor = '#3cb64a';
        saleOption.style.color = '#fff';
    }

    // Show sale form and highlight sale option when the page loads
    showSaleForm();

    // Add click event listeners to all options
    options.forEach(function(option) {
        option.addEventListener('click', function() {
            const targetId = option.dataset.target;
            const targetForm = document.getElementById(targetId);

            // Hide all forms
            document.querySelectorAll('form').forEach(function(form) {
                form.style.display = 'none';
            });

            // Show the target form
            targetForm.style.display = 'block';

            // Highlight the clicked span
            options.forEach(function(opt) {
                opt.style.backgroundColor = 'transparent';
                opt.style.color = '#000';
                opt.style.border = '1px solid #aaa';
            });
            option.style.backgroundColor = '#3cb64a';
            option.style.color = '#fff';
            option.style.border = '1px solid#3cb64a';
        });
    });
});*/



document.addEventListener('DOMContentLoaded', function() {
    const offerTypesContainer = document.querySelector('.offer-types');
    const selectedOfferTypeInput = document.getElementById('offer-type');
    const landSpan = document.getElementById('type-land');

    const offerTypes = ['Sale', 'Rent'];
    
    

    // Function to generate options dynamically
    function generateOptions() {
        offerTypes.forEach(function(type, index) {
            const div = document.createElement('div');
            div.innerHTML = `<span>${type}</span>`;
            div.classList.add('option');
            div.dataset.target = type.toLowerCase();
            div.addEventListener('click', function() {
                // Update value of input on click
                selectedOfferTypeInput.value = type;
                
                // Highlight the clicked span
                highlightSelectedSpan(div);
            });
            offerTypesContainer.appendChild(div);
        });
    }

    

    // Function to highlight the selected span
    function highlightSelectedSpan(selectedSpan) {
        const spans = document.querySelectorAll('.option');
        spans.forEach(function(span) {
            span.style.backgroundColor = 'transparent';
            span.style.color = '#000';
            span.style.border = '1px solid #aaa';
        });
        selectedSpan.style.backgroundColor = '#3cb64a';
        selectedSpan.style.color = '#ddd';
        selectedSpan.style.border = '1px solid #3cb64a';
    }

    // Call the function to generate options
    generateOptions();

    // Initially highlight the first option
    const initialSpan = document.querySelector('.option');
    highlightSelectedSpan(initialSpan);
});


//for property type

document.addEventListener('DOMContentLoaded', function handleTypes() {
    const optionContainer = document.querySelector('.type-options');
    const selectedOptionInput = document.getElementById('propertyType');
    const priceTagLabel = document.getElementById('price-tag');

    const types = ['House', 'Apartment', 'Land', 'Commercial', 'Bunglow', 'Villa'];

    const imgURLs = [
        '../assets/house.webp',
        '../assets/apartment.webp',
        '../assets/land.webp',
        '../assets/commercial.webp',
        '../assets/bunglow.webp',
        '../assets/villa.webp',
    ]

    function displayLandType() {
        var input = document.getElementById('propertyType').value.toLowerCase();
        var landTypeDiv = document.getElementById('land-types');
        var commercialTypeDiv = document.getElementById('commercial-types');
        var floorAreaContainer = document.getElementById('floor-area-container');
        var description = document.getElementById('description');
        var constructionStatusContainer = document.getElementById('construction-status-container');
        var furnishingStatusContainer = document.getElementById('furnishing-status-container');

        // Check if input value matches the condition
        if (input === 'land') {
            landTypeDiv.style.display = 'block'; // Show the div
            commercialTypeDiv.style.display = 'none'; // Show the div
            priceTagLabel.style.display = 'block';
            priceTagLabel.innerText = 'LKR  Per Purch';
            floorAreaContainer.style.display = 'none'
            description.style.height='155px'
            constructionStatusContainer.style.display='none'
            furnishingStatusContainer.style.display='none'
        } else if (input === 'commercial') {
            commercialTypeDiv.style.display = 'block'; // Show the div
            landTypeDiv.style.display = 'none'; // Show the div
            priceTagLabel.innerText = 'LKR';
            floorAreaContainer.style.display = 'block'
            description.style.height='212px'
            constructionStatusContainer.style.display='block'
            furnishingStatusContainer.style.display='block'
        } else {
            commercialTypeDiv.style.display = 'none'; // Hide the div
            landTypeDiv.style.display = 'none'; // Hide the div
            priceTagLabel.innerText = 'LKR';
            floorAreaContainer.style.display = 'block'
            description.style.height='212px'
            constructionStatusContainer.style.display='block'
            furnishingStatusContainer.style.display='block'
        }
    }

    // Function to generate options dynamically
    function generateOptions() {
        types.forEach(function(type, index) {
            const span = document.createElement('div');
            span.innerHTML = `<span><img src='${imgURLs[index]}' /></span><span>${type}</span>`;
            span.classList.add('type-option');
            span.id = `type-${type.toLowerCase()}`
            span.dataset.target = type.toLowerCase();
            span.addEventListener('click', function() {
                // Update value of input on click
                selectedOptionInput.value = type;
                displayLandType();
                // Highlight the clicked span
                highlightSelectedSpan(span);
            });
            optionContainer.appendChild(span);
        });
    }

    // Function to highlight the selected span
    function highlightSelectedSpan(selectedSpan) {
        const spans = document.querySelectorAll('.type-option');
        spans.forEach(function(span) {
            span.style.backgroundColor = 'transparent';
            span.style.color = '#000';
            span.style.border = '1px solid #aaa';
        });
        selectedSpan.style.backgroundColor = '#3cb64a';
        selectedSpan.style.color = '#ddd';
        selectedSpan.style.border = '1px solid #3cb64a';
    }

    // Call the function to generate options
    generateOptions();

    // Initially highlight the first option
    const initialSpan = document.querySelector('.type-option');
    highlightSelectedSpan(initialSpan);
});

//landType

document.addEventListener('DOMContentLoaded', function() {
    const landOptionContainer = document.querySelector('.land-type-options');
    const selectedLandOptionInput = document.getElementById('landType');

    const landTypes = ['Bare Land', 'Beachfront Land', 'Cultivated Land', 'Coconut Land', 'Waterfront Land', 'Tea Land', 'Cinnamon Land', 'Paddy Land'];
    const imgURLs = [
        '../assets/house.webp',
        '../assets/apartment.webp',
        '../assets/land.webp',
        '../assets/commercial.webp',
        '../assets/bunglow.webp',
        '../assets/villa.webp',
    ]

    // Function to generate options dynamically
    function generateOptions() {
        landTypes.forEach(function(type, index) {
            const div = document.createElement('div');
            div.innerHTML = `<span></span><span>${type}</span>`;
            div.classList.add('land-type-option');
            div.dataset.target = type.toLowerCase();
            div.addEventListener('click', function() {
                // Update value of input on click
                selectedLandOptionInput.value = type;
                // Highlight the clicked span
                highlightSelectedSpan(div);
            });
            landOptionContainer.appendChild(div);
        });
    }

    // Function to highlight the selected span
    function highlightSelectedSpan(selectedSpan) {
        const spans = document.querySelectorAll('.land-type-option');
        spans.forEach(function(span) {
            span.style.backgroundColor = 'transparent';
            span.style.color = '#000';
            span.style.border = '1px solid #aaa';
        });
        selectedSpan.style.backgroundColor = '#3cb64a';
        selectedSpan.style.color = '#ddd';
        selectedSpan.style.border = '1px solid #3cb64a';
    }

    // Call the function to generate options
    generateOptions();

    // Initially highlight the first option
    const initialSpan = document.querySelector('.land-type-option');
    highlightSelectedSpan(initialSpan);
});

//commercialType

document.addEventListener('DOMContentLoaded', function() {
    const commercialOptionContainer = document.querySelector('.commercial-type-options');
    const selectedCommercialOptionInput = document.getElementById('commercialType');

    const commercialTypes = ['Office Space', 'Buildings', 'Shop Space', 'Multipurpose', 'Warehouse', 'Hotel', 'Factory', 'Guest House'];
    const imgURLs = [
        '../assets/house.webp',
        '../assets/apartment.webp',
        '../assets/land.webp',
        '../assets/commercial.webp',
        '../assets/bunglow.webp',
        '../assets/villa.webp',
    ]

    // Function to generate options dynamically
    function generateOptions() {
        commercialTypes.forEach(function(type, index) {
            const div = document.createElement('div');
            div.innerHTML = `<span></span><span>${type}</span>`;
            div.classList.add('commercial-type-option');
            div.dataset.target = type.toLowerCase();
            div.addEventListener('click', function() {
                // Update value of input on click
                selectedCommercialOptionInput.value = type;
                // Highlight the clicked span
                highlightSelectedSpan(div);
            });
            commercialOptionContainer.appendChild(div);
        });
    }

    // Function to highlight the selected span
    function highlightSelectedSpan(selectedSpan) {
        const spans = document.querySelectorAll('.commercial-type-option');
        spans.forEach(function(span) {
            span.style.backgroundColor = 'transparent';
            span.style.color = '#000';
            span.style.border = '1px solid #aaa';
        });
        selectedSpan.style.backgroundColor = '#3cb64a';
        selectedSpan.style.color = '#ddd';
        selectedSpan.style.border = '1px solid #3cb64a';
    }

    // Call the function to generate options
    generateOptions();

    // Initially highlight the first option
    const initialSpan = document.querySelector('.commercial-type-option');
    highlightSelectedSpan(initialSpan);
});



function handleOptionInput(optionType){
    var currentStatusList = document.getElementById('current-status-list')
    var constructionStatusList = document.getElementById('construction-status-list')
    var furnishingStatusList = document.getElementById('furnishing-status-list')

    var currentStatusDrop = document.getElementById('current-status-dropdown')
    var constructionStatusDrop = document.getElementById('construction-status-dropdown')
    var furnishingStatusDrop = document.getElementById('furnishing-status-dropdown')

    if(optionType == 'currentStatus'){
        constructionStatusList.classList.remove('visible') 
        furnishingStatusList.classList.remove('visible') 
        if(currentStatusList.classList.contains('visible')){
            currentStatusList.classList.remove('visible') 
            currentStatusDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
            
        }
        else{
            currentStatusList.classList.add('visible')
            currentStatusDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }if(optionType == 'constructionStatus'){
        currentStatusList.classList.remove('visible') 
        furnishingStatusList.classList.remove('visible') 
        if(constructionStatusList.classList.contains('visible')){
            constructionStatusList.classList.remove('visible') 
            constructionStatusDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
        }
        else{
            constructionStatusList.classList.add('visible')
            constructionStatusDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }if(optionType == 'furnishingStatus'){
        currentStatusList.classList.remove('visible') 
        constructionStatusList.classList.remove('visible') 
        if(furnishingStatusList.classList.contains('visible')){
            furnishingStatusList.classList.remove('visible') 
            furnishingStatusDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
        }
        else{
            furnishingStatusList.classList.add('visible')
            furnishingStatusDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }
}

function optionItemClick(optionType, optionValue){
    var currentStatus = document.getElementById('current-status')
    var constructionStatus = document.getElementById('construction-status')
    var furnishingStatus = document.getElementById('furnishing-status')
    if(optionType == 'currentStatus'){
        currentStatus.value = `${optionValue}`
        handleOptionInput(optionType)
    }if(optionType == 'constructionStatus'){
        constructionStatus.value = `${optionValue}`
        handleOptionInput(optionType)
    }if(optionType == 'furnishingStatus'){
        furnishingStatus.value = `${optionValue}`
        handleOptionInput(optionType)
    }
}

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('city');
    const searchResults = document.getElementById('city-list');
  
  
    fetch('../js/cities.json')
    .then(response => response.json())
    .then(data => {
      searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();
        let resultsHtml = '';
        let count = 0;

        if (searchTerm.length > 0) {
          for (const district in data) {
            data[district].cities.forEach(city => {
              if (count < 10 && city.toLowerCase().includes(searchTerm)) {
                resultsHtml += `<div class="city-item">
                                  <span class="city">${city}</span>
                                  <span class="district">,&nbsp;${district} District</span>
                                </div>`;
                count++;
              }
            });
          }

          if (resultsHtml !== '') {
            searchResults.innerHTML = resultsHtml;
            searchResults.style.display = 'block';
            const resultDivs = searchResults.querySelectorAll('.city-item');
            resultDivs.forEach(div => {
              div.addEventListener('click', function() {
                searchInput.value = div.querySelector('.city').textContent;
                searchResults.style.display = 'none';
              });
            });
          } else {
            searchResults.innerHTML = '';
            searchResults.style.display = 'none';
          }
        } else {
          searchResults.innerHTML = '';
          searchResults.style.display = 'none';
        }
      });
    })
    .catch(error => console.error('Error fetching JSON:', error));

  });
  