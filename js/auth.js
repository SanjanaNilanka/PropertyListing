document.addEventListener("DOMContentLoaded", function() {
  let slides = document.querySelectorAll('.slide');
  let navigationBars = document.querySelector('.navigation-bars');
  let currentIndex = 0;
  let startX = 0;
  let isDragging = false;
  let isMouseOverSlide = false; // Flag to track mouse over slide

  // Generate navigation bars
  for (let i = 0; i < slides.length; i++) {
    let navigationBar = document.createElement('div');
    navigationBar.className = 'navigation-bar';
    navigationBars.appendChild(navigationBar);
  }

  function updateSlide(index) {
    slides.forEach(function(slide, i) {
      slide.style.display = (i === index) ? 'block' : 'none';
    });
    currentIndex = index;

    // Update navigation bars
    let navigationBars = document.querySelectorAll('.navigation-bar');
    navigationBars.forEach(function(bar, i) {
      bar.style.backgroundColor = i === currentIndex ? '#fff' : '#333';
    });
  }

  updateSlide(0); // Show initial slide

  let slideChangeInterval = setInterval(function() {
    if (!isMouseOverSlide) {
      let nextIndex = (currentIndex + 1) % slides.length;
      updateSlide(nextIndex);
    }
  }, 3000);

  slides.forEach(function(slide) {
    slide.addEventListener('mousedown', function(e) {
      isDragging = true;
      startX = e.clientX;
    });

    slide.addEventListener('mouseup', function() {
      isDragging = false;
    });

    slide.addEventListener('mousemove', function(e) {
      if (!isDragging) return;
      let deltaX = e.clientX - startX;
      if (deltaX > 50) {
        let newIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
        updateSlide(newIndex);
        isDragging = false;
      } else if (deltaX < -50) {
        let newIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
        updateSlide(newIndex);
        isDragging = false;
      }
    });

    slide.addEventListener('mouseover', function() {
      isMouseOverSlide = true;
      clearInterval(slideChangeInterval); // Pause automatic slide change
    });

    slide.addEventListener('mouseout', function() {
      isMouseOverSlide = false;
      slideChangeInterval = setInterval(function() {
        if (!isMouseOverSlide) {
          let nextIndex = (currentIndex + 1) % slides.length;
          updateSlide(nextIndex);
        }
      }, 3000);
    });
  });
});
