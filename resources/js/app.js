import './bootstrap';
import Alpine from 'alpinejs';
import 'slick-carousel/slick/slick.css';
import 'slick-carousel/slick/slick-theme.css';
import 'slick-carousel';
import './slick-slider';
import AOS from 'aos';
import 'aos/dist/aos.css'; // You can also use <link> for styles
// ..

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
AOS.init();

// You can also pass an optional settings object
// below listed default settings
AOS.init({
    // Global settings:
    disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
    startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
    initClassName: 'aos-init', // class applied after initialization
    animatedClassName: 'aos-animate', // class applied on animation
    useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
    disableMutationObserver: false, // disables automatic mutations' detections (advanced)
    debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
    throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


    // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
    offset: 120, // offset (in px) from the original trigger point
    delay: 0, // values from 0 to 3000, with step 50ms
    duration: 400, // values from 0 to 3000, with step 50ms
    easing: 'ease', // default easing for AOS animations
    once: false, // whether animation should happen only once - while scrolling down
    mirror: false, // whether elements should animate out while scrolling past them
    anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation

});