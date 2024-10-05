import './bootstrap';
import Alpine from 'alpinejs';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel';
import './slick-slider';

import './countup';

// import Swiper from 'swiper';
// import 'swiper/swiper-bundle.min.css';

// document.addEventListener('DOMContentLoaded', function () {
//     // Initialize Swiper
//     const swiper = new Swiper('.swiper-container', {
//         slidesPerView: 1,
//         spaceBetween: 30,
//         loop: true,
//         autoplay: {
//             delay: 2500,
//             disableOnInteraction: false,
//         },
//         navigation: {
//             nextEl: '.swiper-button-next',
//             prevEl: '.swiper-button-prev',
//         },
//         pagination: {
//             el: '.swiper-pagination',
//             clickable: true,
//         },
//     });
// });







window.Alpine = Alpine;

Alpine.start();
