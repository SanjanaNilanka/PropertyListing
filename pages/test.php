<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <style>
    .container {
    margin: 50px auto;
    width: 300px;
    }

    input {
    width: 100%;
    padding: 10px;
    font-size: 16px;
    }

    .search-results {
    display: none;
    margin-top: 10px;
    }

    .result-span {
    display: block;
    padding: 5px;
    background-color: #f4f4f4;
    margin-bottom: 5px;
    cursor: pointer;
    }

    .result-span:hover {
    background-color: #e0e0e0;
    }

  </style>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');

    const data = ["apple", "banana", "orange", "grape", "pineapple", "watermelon", "kiwi", "melon"];

    searchInput.addEventListener('input', function() {
        const searchTerm = searchInput.value.toLowerCase();
        const filteredResults = data.filter(item => item.toLowerCase().includes(searchTerm));

        if (searchTerm.length > 0) {
        searchResults.innerHTML = '';

        if (filteredResults.length > 0) {
            searchResults.style.display = 'block';
            filteredResults.forEach(result => {
            const span = document.createElement('span');
            span.textContent = result;
            span.classList.add('result-span');
            span.addEventListener('click', function() {
                searchInput.value = result;
                searchResults.style.display = 'none';
            });
            searchResults.appendChild(span);
            });
        } else {
            searchResults.style.display = 'none';
        }
        } else {
        searchResults.style.display = 'none';
        }
    });
    });

  </script>
</head>
<body>
  <div class="container">
    <input type="text" id="searchInput" placeholder="Type to search">
    <div id="searchResults" class="search-results"></div>
  </div>


  <div class="slideshow-container">
        <div class="slide" style="background-color: #aaa;">Slide 1</div>
        <div class="slide" style="background-color: #bbb;">Slide 2</div>
        <div class="slide" style="background-color: #ccc;">Slide 3</div>
        <div class="slide" style="background-color: #ddd;">Slide 4</div>
        <div class="slide" style="background-color: #eee;">Slide 5</div>
    </div>
    <div class="navigation-bars"></div>
    <script>
        let startX = 0;
        let isDragging = false;
        let slideshow = document.querySelector('.slideshow-container');

        slideshow.addEventListener('mousedown', (e) => {
            startX = e.pageX;
            isDragging = true;
        });

        document.addEventListener('mousemove', (e) => {
            if (isDragging) {
            const diffX = e.pageX - startX;
            slideshow.scrollLeft -= diffX / 2.5;
            startX = e.pageX;
            }
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
        });
    </script>
</body>
</html>
