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

// document.addEventListener("DOMContentLoaded", function () {
//     const container = document.querySelector('.container');
//     const gallery = document.querySelector(".gallery");
//     if (gallery) {
//         const links = gallery.querySelectorAll("a");
//         const totalLink = 6;
//         const remainingLink = links.length - totalLink;
//         if (links.length < 6) {
//             const swiperContainer = document.createElement('div');
//             swiperContainer.className = 'swiper mySwiper';

//             const swiperWrapper = document.createElement('div');
//             swiperWrapper.className = 'swiper-wrapper gallery';

//             links.forEach(link => {
//                 const imgSrc = link.querySelector('img').getAttribute('src');
//                 const swiperSlide = document.createElement('a');
//                 swiperSlide.className = 'swiper-slide';
//                 swiperSlide.href = imgSrc;
//                 swiperSlide.innerHTML = `<img src="${imgSrc}" alt="">`;
//                 swiperWrapper.appendChild(swiperSlide);
//             });

//             const swiperPagination = document.createElement('div');
//             swiperPagination.className = 'swiper-pagination';

//             swiperContainer.appendChild(swiperWrapper);
//             swiperContainer.appendChild(swiperPagination);

//             // Replace the original gallery with the new Swiper structure
//             container.removeChild(gallery);
//             // gallery.parentNode.removeChild(gallery);
//             container.appendChild(swiperContainer);
//             const galleryNew = document.querySelector(".gallery");
//             galleryNew.style.display = "flex";

//             var swiper = new Swiper(".mySwiper", {
//                 pagination: {
//                     el: ".swiper-pagination",
//                 },
//                 loop: true,
//                 autoplay: {
//                     delay: 2000,
//                 },
//             });
//             const lightbox = new SimpleLightbox('.gallery a');



//         } else {
//             const lightbox = new SimpleLightbox('.gallery a');
//             links.forEach((link, index) => {
//                 let className = "";

//                 switch (index) {
//                     case 0:
//                         className = "grid-satu";
//                         link.classList.add(className);
//                         break;
//                     case 1:
//                         className = "grid-dua";
//                         link.classList.add(className);
//                         break;
//                     case 2:
//                         className = "grid-tiga";
//                         link.classList.add(className);
//                         break;
//                     case 3:
//                         className = "grid-empat";
//                         link.classList.add(className);
//                         break;
//                     case 4:
//                         className = "grid-lima";
//                         link.classList.add(className);
//                         break;
//                     case 5:
//                         className = "grid-enam";
//                         link.classList.add(className);
//                         link.classList.add("empty");
//                         const h1Element = document.createElement("h1");
//                         h1Element.innerHTML = `${remainingLink}+`;
//                         link.appendChild(h1Element);
//                         break;
//                     default:
//                         className = "hidden";
//                         link.classList.add(className);
//                         break;
//                 }
//             });
//         }
//     }

// });
document.addEventListener("DOMContentLoaded", function () {
    const gallery = document.querySelector(".gallery");
    if (gallery) {
        const links = gallery.querySelectorAll("a");;
    const lightbox = new SimpleLightbox('.gallery a');
    const totalLink = 6;
    const remainingLink = links.length - totalLink;
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
    
});
// rating

const allStars = document.querySelectorAll('.star');
const ratingInput = document.querySelector('input[name="rating"]');
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
        ratingInput.value = current_star_level;
        // console.log(ratingInput.value);
    }
});


// preview komen

function previewGambar() {
    
    var gambarInput = document.getElementById('image');
    var gambarPreview = document.getElementById('gambarPreview');
    var gambarNama = document.getElementById('gambarNama');
    var icon = document.getElementById('addIcon');

    var fileGambar = gambarInput.files[0];
    var namaGambar = fileGambar.name;

    var reader = new FileReader();
    reader.onload = function (e) {
        // icon.style.display = 'none';
        gambarPreview.src = e.target.result;
        gambarPreview.style.display = 'block';
        // gambarNama.textContent = 'Nama Gambar: ' + namaGambar;
    }
    reader.readAsDataURL(fileGambar);
}
function previewGambarReply() {
    
    var gambarInput = document.getElementById('image-reply');
    var gambarPreview = document.getElementById('gambarPreview-reply');
    var gambarNama = document.getElementById('gambarNama');
    var icon = document.getElementById('addIcon-reply');

    var fileGambar = gambarInput.files[0];
    var namaGambar = fileGambar.name;

    var reader = new FileReader();
    reader.onload = function (e) {
        // icon.style.display = 'none';
        gambarPreview.src = e.target.result;
        gambarPreview.style.display = 'block';
        // gambarNama.textContent = 'Nama Gambar: ' + namaGambar;
    }
    reader.readAsDataURL(fileGambar);
}

document.addEventListener('DOMContentLoaded', function() {
    var replyImages = document.querySelectorAll('.gambar-komen');

    replyImages.forEach(function(image) {
        image.addEventListener('load', function() {
            // Image loaded successfully
        });

        image.addEventListener('error', function() {
            // Image failed to load, hide it
            this.style.display = 'none';
        });
    });
});
// const gambarKomen = document.querySelectorAll('.gambar-komen');
// $(document).ready(function() {
//     $('.gambar-komen').on('error', function() {
//         $(this).hide();
//     });
// });
// gambarKomen.forEach(img => {
//     if (!img.getAttribute('src') || image.getAttribute('src')==NULL) {
//         img.style.display = 'none';
//     }
// });


// preview post
// function previewInputImage() {
//     const imageInput = document.getElementById('imageUpload');
//     const imagePreview = document.getElementById('imagePreview');
//     const image = document.getElementById('image-input');
//     if (imageInput.files && imageInput.files[0]) {
//         const reader = new FileReader();

//         reader.onload = function (e) {
//             image.src = e.target.result;
//             // imagePreview.innerHTML = `<img src="${e.target.result}" alt="Uploaded Image">`;
//         };

//         reader.readAsDataURL(imageInput.files[0]);
//     }

// }
function previewInputImages() {
    const imageInput = document.getElementById('imageUpload');
    const imagePreview = document.getElementById('imagePreview');

    if (imageInput.files && imageInput.files.length > 0) {
        imagePreview.innerHTML = ''; // Clear previous previews if any

        for (let i = 0; i < imageInput.files.length; i++) {
            const reader = new FileReader();
            const image = document.createElement('img');

            reader.onload = function (e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(imageInput.files[i]);
            imagePreview.appendChild(image);
        }
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


// lokasi
// $(document).ready(function () {
//     // Fetch provinces and populate the "Provinsi" select
//     $.ajax({
//         url: '/get-provinces', // Adjust the URL to your Laravel route
//         type: 'GET',
//         dataType: 'json',
//         success: function (data) {
//             var provinsiSelect = $('#provinsi');
//             provinsiSelect.empty();
//             provinsiSelect.append($('<option>', {
//                 value: '',
//                 text: 'Provinsi'
//             }));
//             $.each(data, function (key, value) {
//                 provinsiSelect.append($('<option>', {
//                     value: key,
//                     text: value
//                 }));
//             });
//         }
//     });

//     // Fetch cities and populate the "Kabupaten/Kota" select
//     $('#provinsi').on('change', function () {
//         var selectedProvinceId = $(this).val();
//         if (selectedProvinceId) {
//             $.ajax({
//                 url: '/get-cities/' + selectedProvinceId, // Adjust the URL to your Laravel route
//                 type: 'GET',
//                 dataType: 'json',
//                 success: function (data) {
//                     var citiesSelect = $('#cities');
//                     citiesSelect.empty();
//                     citiesSelect.append($('<option>', {
//                         value: '',
//                         text: 'Kabupaten/Kota'
//                     }));
//                     $.each(data, function (key, value) {
//                         citiesSelect.append($('<option>', {
//                             value: key,
//                             text: value
//                         }));
//                     });
//                 }
//             });
//         } else {
//             // If no province is selected, clear the cities select
//             $('#cities').empty();
//         }
//     });
// });

$(document).ready(function () {
    // Fetch provinces and populate the "Provinsi" select
    var myProvince = $('#myProvince').text();
    $.ajax({
        url: '/get-provinces', // Adjust the URL to your Laravel route
        type: 'GET',
        dataType: 'json',
        success: function (data) {
            var provinsiSelect = $('#provinsi');
            provinsiSelect.empty();
            provinsiSelect.append($('<option>', {
                value: '',
                text: 'Provinsi'
            }));
            $.each(data, function (key, value) {
                provinsiSelect.append($('<option>', {
                    value: key,
                    text: value
                }));
            });

            // Set the selected province based on the value in the select
            provinsiSelect.val(myProvince); // Replace with your Blade variable

            // Trigger the change event on the province select to populate cities
            provinsiSelect.trigger('change');
        }
    });

    // Fetch cities and populate the "Kabupaten/Kota" select
    $('#provinsi').on('change', function () {
        var selectedProvinceId = $(this).val();
        if (selectedProvinceId) {
            var myCity = $('#myCity').text();
            $.ajax({
                url: '/get-cities/' + selectedProvinceId, // Adjust the URL to your Laravel route
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    var citiesSelect = $('#cities');
                    citiesSelect.empty();
                    citiesSelect.append($('<option>', {
                        value: '',
                        text: 'Kabupaten/Kota'
                    }));
                    $.each(data, function (key, value) {
                        citiesSelect.append($('<option>', {
                            value: key,
                            text: value
                        }));
                    });

                    // Set the selected city based on the value in the select
                    citiesSelect.val(myCity); // Replace with your Blade variable
                }
            });
        } else {
            // If no province is selected, clear the cities select
            $('#cities').empty();
        }
    });
});





// document.getElementById('myForm').addEventListener('submit', function (e) {
//     const fileInput = document.getElementById('imageUpload');
//     var fileRequiredMessage = document.getElementById('fileRequiredMessage');
//     if (fileInput.files.length <= 0) {
//         e.preventDefault(); // Prevent form submission if no file is selected
//         fileRequiredMessage.style.display = 'block';
//         // fileRequiredMessage.style.zIndex = '2';
//     }
// });

const myForm = document.getElementById('myForm');

// Check if 'myForm' is not null before attaching the event listener.
if (myForm) {
    myForm.addEventListener('submit', function (e) {
        const fileInput = document.getElementById('imageUpload');
        const fileRequiredMessage = document.getElementById('fileRequiredMessage');

        if (fileInput && fileInput.files.length <= 0) {
            e.preventDefault(); // Prevent form submission if no file is selected
            if (fileRequiredMessage) {
                fileRequiredMessage.style.display = 'block';
            }
        }
    });
}



// const myModal = document.getElementById('myModal')
// const myInput = document.getElementById('myInput')

// myModal.addEventListener('shown.bs.modal', () => {
//   myInput.focus()
// })
