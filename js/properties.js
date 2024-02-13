

document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('city');
    const searchResults = document.getElementById('city-list');
  
    const data = ["apple", "banana", "orange", "grape", "pineapple", "watermelon", "kiwi", "melon"];
  
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
              if (count < 6 && city.toLowerCase().includes(searchTerm)) {
                resultsHtml += `<div class="city-item">
                                  <span class="city">${city}</span>
                                  <span class="district">${district} District</span>
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

function handleOptionInput(optionType){
    var offerTypeList = document.getElementById('offer-type-list')
    var propertyTypeList = document.getElementById('property-type-list')
    var landTypeList = document.getElementById('land-type-list')
    var comercialTypeList = document.getElementById('commercial-type-list')

    var offerTypeDrop = document.getElementById('offer-type-dropdown')
    var propertyTypeDrop = document.getElementById('property-type-dropdown')
    var landTypeDrop = document.getElementById('land-type-dropdown')
    var commercialTypeDrop = document.getElementById('commercial-type-dropdown')

    if(optionType == 'offer-type'){
        if(offerTypeList.classList.contains('visible')){
            offerTypeList.classList.remove('visible') 
            offerTypeDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
            
        }
        else{
            offerTypeList.classList.add('visible')
            offerTypeDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }
    if(optionType == 'property-type'){
        if(propertyTypeList.classList.contains('visible')){
            propertyTypeList.classList.remove('visible') 
            propertyTypeDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
            
        }
        else{
            propertyTypeList.classList.add('visible')
            propertyTypeDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }
    if(optionType == 'land-type'){
        if(landTypeList.classList.contains('visible')){
            landTypeList.classList.remove('visible') 
            landTypeDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
            
        }
        else{
            landTypeList.classList.add('visible')
            landTypeDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }
    if(optionType == 'commercial-type'){
        if(comercialTypeList.classList.contains('visible')){
            comercialTypeList.classList.remove('visible') 
            commercialTypeDrop.innerHTML = '<i class="fa-solid fa-caret-down"></i>'
            
        }
        else{
            comercialTypeList.classList.add('visible')
            commercialTypeDrop.innerHTML = '<i class="fa-solid fa-caret-up"></i>'
        }
    }
}

function optionItemClick(optionType, optionValue){
    var offerTypeInput = document.getElementById('offer-type')
    var propertyTypeInput = document.getElementById('property-type')
    var landTypeInput = document.getElementById('land-type')
    var commercialTypeInput = document.getElementById('commercial-type')

    var landTypeContainer = document.getElementById('land-type-container')
    var commercialTypeContainer = document.getElementById('commercial-type-container')

    if(optionType == 'offer-type'){
        offerTypeInput.value = `${optionValue}`
        handleOptionInput(optionType)
    }if(optionType == 'property-type'){
        propertyTypeInput.value = `${optionValue}`
        handleOptionInput(optionType)
        if(propertyTypeInput.value === 'Land'){
            landTypeContainer.style.display = 'block'
            commercialTypeContainer.style.display = 'none'
        }else if(propertyTypeInput.value === 'Commercial'){
            commercialTypeContainer.style.display = 'block'
            landTypeContainer.style.display = 'none'
        }else{
            landTypeContainer.style.display = 'none'
            commercialTypeContainer.style.display = 'none'
        }
    }if(optionType == 'land-type'){
        landTypeInput.value = `${optionValue}`
        handleOptionInput(optionType)
    }if(optionType == 'commercial-type'){
        commercialTypeInput.value = `${optionValue}`
        handleOptionInput(optionType)
    }
}