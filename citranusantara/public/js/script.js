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
    if (window.scrollY > 10) {
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

// rating

const allStars = document.querySelectorAll('.star');
let current_star_level;
allStars.forEach((star, i) => {
    star.onclick = function () {
        current_star_level = i + 1;

        allStars.forEach((star, j) => {
            if (current_star_level >= j + 1) {
                star.style.color = "#FFE500";
            } else {
                star.style.color = "black";
            }
        });
    }
});
const ratingInput = document.querySelector('input[name="rating"]');
if (ratingInput) {
    ratingInput.value = current_star_level;
} 

// preview komen

function previewGambar() {
    var gambarInput = document.getElementById('image');
    var gambarPreview = document.getElementById('gambarPreview');
    var gambarNama = document.getElementById('gambarNama');
    var icon = document.getElementById('addIcon');

    var fileGambar = gambarInput.files[0];
    var namaGambar = fileGambar.name;

    var reader = new FileReader();
    reader.onload = function(e) {
        // icon.style.display = 'none';
        gambarPreview.src = e.target.result;
        gambarPreview.style.display = 'block';
        // gambarNama.textContent = 'Nama Gambar: ' + namaGambar;
    }
    reader.readAsDataURL(fileGambar);
}


const gambarKomen = document.querySelectorAll('.gambar-komen');
gambarKomen.forEach(img => {
    if (!img.getAttribute('src')) {
        img.style.display = 'none';
    }
});


// preview post
function previewInputImage() {
    const imageInput = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');
    const image = document.getElementById('image-input');
    if (imageInput.files && imageInput.files[0]) {
        const reader = new FileReader();
        
        reader.onload = function (e) {
            image.src = e.target.result;
            // imagePreview.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
        };
        
        reader.readAsDataURL(imageInput.files[0]);
    }

}



const replyItems = document.querySelectorAll('.opsi-balas');

// Loop through the reply items and attach click event handlers
replyItems.forEach(replyItem => {
    replyItem.addEventListener('click', event => {
        // Find the closest parent with the class "komen-parent"
        const parentKomen = event.target.closest('.komen-parent');

        // Find the corresponding "balas-komen" section within the parent
        const balasKomenSection = parentKomen.querySelector('.balas-komen');

        // Toggle the display of "balas-komen" section
        if (balasKomenSection.style.display === 'none') {
            balasKomenSection.style.display = 'flex';
        } else {
            balasKomenSection.style.display = 'none';
        }
    });
});