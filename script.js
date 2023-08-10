var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
    },
    loop: true,
    autoplay: {
        delay: 2000,
    },
});

const nav = document.querySelector('nav');

window.addEventListener('scroll', () => {
    if (window.scrollY > 100) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

document.addEventListener("DOMContentLoaded", function() {
    const gallery = document.querySelector(".gallery");
    const label = document.querySelector(".label");
    const maxImagesToShow = 8; // Change this number as needed

    const images = gallery.querySelectorAll("a");
    const hiddenImages = images.length - maxImagesToShow;

    if (hiddenImages > 0) {
        label.innerHTML = `${hiddenImages}+ pictures`;
        label.classList.remove("hidden");
    }
});