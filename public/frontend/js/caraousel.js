const radios = document.querySelectorAll('input[type="radio"]');
const cards = document.querySelector('.cards');
const indicators = document.querySelectorAll('.indicator');

let currentSlide = 0;

// Update slide function
function updateSlide() {
    // Set the current slide index
    cards.style.setProperty('--current-slide', currentSlide);

    // Update indicators
    indicators.forEach((indicator, index) => {
        indicator.style.backgroundColor = index === currentSlide ? 'blue' : 'gray';
    });
}

// Event listeners for buttons
document.getElementById('prev').addEventListener('click', () => {
    currentSlide = (currentSlide - 1 + radios.length) % radios.length;
    updateSlide();
});

document.getElementById('next').addEventListener('click', () => {
    currentSlide = (currentSlide + 1) % radios.length;
    updateSlide();
});

// Initial update
updateSlide();
