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

//add class grid

document.addEventListener("DOMContentLoaded", function () {
    const container = document.querySelector('.container');
    const gallery = document.querySelector(".gallery");
    if (gallery) {
        const links = gallery.querySelectorAll("a");
        const totalLink = 6;
        const remainingLink = links.length - totalLink;
        if (links.length < 6) {
            const swiperContainer = document.createElement('div');
            swiperContainer.className = 'swiper mySwiper';

            const swiperWrapper = document.createElement('div');
            swiperWrapper.className = 'swiper-wrapper gallery';

            links.forEach(link => {
                const imgSrc = link.querySelector('img').getAttribute('src');
                const swiperSlide = document.createElement('a');
                swiperSlide.className = 'swiper-slide';
                swiperSlide.href = imgSrc;
                swiperSlide.innerHTML = `<img src="${imgSrc}" alt="">`;
                swiperWrapper.appendChild(swiperSlide);
            });

            const swiperPagination = document.createElement('div');
            swiperPagination.className = 'swiper-pagination';

            swiperContainer.appendChild(swiperWrapper);
            swiperContainer.appendChild(swiperPagination);

            // Replace the original gallery with the new Swiper structure
            container.removeChild(gallery);
            container.appendChild(swiperContainer);
            const galleryNew = document.querySelector(".gallery");
            galleryNew.style.display = "flex";

            var swiper = new Swiper(".mySwiper", {
                pagination: {
                    el: ".swiper-pagination",
                },
                loop: true,
                autoplay: {
                    delay: 2000,
                },
            });
            const lightbox = new SimpleLightbox('.gallery a');



        } else {
            const lightbox = new SimpleLightbox('.gallery a');
            links.forEach((link, index) => {
                let className = "";

                switch (index) {
                    case 0:
                        className = "grid-satu";
                        link.classList.add(className);
                        break;
                    case 1:
                        className = "grid-dua";
                        link.classList.add(className);
                        break;
                    case 2:
                        className = "grid-tiga";
                        link.classList.add(className);
                        break;
                    case 3:
                        className = "grid-empat";
                        link.classList.add(className);
                        break;
                    case 4:
                        className = "grid-lima";
                        link.classList.add(className);
                        break;
                    case 5:
                        className = "grid-enam";
                        link.classList.add(className);
                        link.classList.add("empty");
                        const h1Element = document.createElement("h1");
                        h1Element.innerHTML = `${remainingLink}+`;
                        link.appendChild(h1Element);
                        break;
                    default:
                        className = "hidden";
                        link.classList.add(className);
                        break;
                }
            });
        }
    } 





});



