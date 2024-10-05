// resources/js/slick-slider.js
import $ from 'jquery';

// $(document).ready(function () {
//     $('.slick-carousel').slick({
//         dots: true,
//         infinite: true,
//         speed: 300,
//         slidesToShow: 1,
//         autoplay: true,
//         autoplaySpeed: 2000,
//         arrows: true,
//     });
// });
// $('.slick-carousel').slick({
//     dots: false,
//     infinite: true,
//     slidesToShow: 4,
//     slidesToScroll: 1,
//     autoplay: true,
//     autoplaySpeed: 1000,
//     arrows: true,
//     responsive: [
//         {
//             breakpoint: 1200,
//             settings: {
//                 slidesToShow: 3,
//                 slidesToScroll: 1,
//                 infinite: true,
//                 dots: false,
//             },
//         },
//         {
//             breakpoint: 992,
//             settings: {
//                 slidesToShow: 2,
//                 slidesToScroll: 1,
//                 infinite: true,
//                 dots: false,
//             },
//         },
//         {
//             breakpoint: 600,
//             settings: {
//                 slidesToShow: 1,
//                 slidesToScroll: 1,
//             },
//         },
//     ],
// });

$(document).ready(function () {
    $('.slick-carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,              // Display 3 images at a time
        slidesToScroll: 1,
        centerMode: true,             // Center the active slide
        centerPadding: '250px',        // Show 60px of the side slides
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [
            {
                breakpoint: 768,      // Adjust settings for mobile screens
                settings: {
                    slidesToShow: 1,
                    centerPadding: '30px',
                },
            },
            {
                breakpoint: 1024,     // Adjust settings for tablet screens
                settings: {
                    slidesToShow: 3,
                    // centerPadding: '40px',
                },
            },
        ],
    });
});