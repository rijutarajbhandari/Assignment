let slides = document.querySelectorAll(".banner img");
let index = 0;

function changeSlide() {
    slides.forEach((slide, i) => {
        slide.style.opacity = i === index ? "1" : "0";
    });
    index = (index + 1) % slides.length;
}

setInterval(changeSlide, 3000);
