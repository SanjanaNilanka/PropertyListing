document.addEventListener('DOMContentLoaded', function() {
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
});

//for property type

document.addEventListener('DOMContentLoaded', function() {
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

        // Check if input value matches the condition
        if (input === 'land') {
            landTypeDiv.style.display = 'block'; // Show the div
            commercialTypeDiv.style.display = 'none'; // Show the div
            priceTagLabel.style.display = 'block';
            priceTagLabel.innerText = 'LKR  Per Purch';
        } else if (input === 'commercial') {
            commercialTypeDiv.style.display = 'block'; // Show the div
            landTypeDiv.style.display = 'none'; // Show the div
            priceTagLabel.innerText = 'LKR';
        } else {
            commercialTypeDiv.style.display = 'none'; // Hide the div
            landTypeDiv.style.display = 'none'; // Hide the div
            priceTagLabel.innerText = 'LKR';
        }
    }

    // Function to generate options dynamically
    function generateOptions() {
        types.forEach(function(type, index) {
            const span = document.createElement('div');
            span.innerHTML = `<span><img src='${imgURLs[index]}' /></span><span>${type}</span>`;
            span.classList.add('type-option');
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