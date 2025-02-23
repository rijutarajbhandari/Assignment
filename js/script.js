document.addEventListener("DOMContentLoaded", function () {
    let slides = document.querySelectorAll(".banner img");
    let index = 0;
    let interval;

    if (slides.length > 0) {
        slides[index].style.opacity = "1"; // Ensure first image is visible

        function changeSlide(next = true) {
            slides[index].style.opacity = "0"; // Hide current slide
            index = next ? (index + 1) % slides.length : (index - 1 + slides.length) % slides.length;
            slides[index].style.opacity = "1"; // Show next/previous slide
        }

        function startSlider() {
            interval = setInterval(() => changeSlide(true), 3000);
        }

        function stopSlider() {
            clearInterval(interval);
        }

        // Start the slider on load
        startSlider();

        // Next & Previous button event listeners
        document.getElementById("next").addEventListener("click", function () {
            changeSlide(true);
            stopSlider(); startSlider();
        });

        document.getElementById("prev").addEventListener("click", function () {
            changeSlide(false);
            stopSlider(); startSlider();
        });

        // Pause on hover
        document.querySelector(".banner").addEventListener("mouseenter", stopSlider);
        document.querySelector(".banner").addEventListener("mouseleave", startSlider);
    }
});

