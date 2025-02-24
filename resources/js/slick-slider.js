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
    // First Carousel
    $('.slick-carousel').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,             // Display 3 images at a time
        slidesToScroll: 1,
        centerMode: true,            // Center the active slide
        centerPadding: '200px',      // Initial center padding for large screens
        autoplay: true,
        autoplaySpeed: 4000,
        arrows: true,
        responsive: [
            {
                breakpoint: 1440,    // For large desktops
                settings: {
                    slidesToShow: 3,
                    centerPadding: '150px', // Adjust for large screens
                },
            },
            {
                breakpoint: 1200,    // For smaller desktops
                settings: {
                    slidesToShow: 3,
                    centerPadding: '100px', // Reduced padding
                },
            },
            {
                breakpoint: 1024,    // For tablets
                settings: {
                    slidesToShow: 2,
                    centerPadding: '50px',  // Further reduced padding
                },
            },
            {
                breakpoint: 768,     // For mobile devices
                settings: {
                    slidesToShow: 2,
                    centerMode: true, // Disable centering
                    arrows: false,     // Hide arrows for simplicity
                    dots: false,        // Enable dots for better navigation
                    centerPadding: '50px',  // Further reduced padding

                },
            },
            {
                breakpoint: 480,     // For very small devices
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    dots: false,
                    // centerPadding: '10px', // Minimal padding
                },
            },
        ],
    });

    // Second Carousel
    $('.slick-carousel2').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 2,             // Display 2 images at a time
        // slidesToScroll: 1,
        centerMode: true,            // Center the active slide
        centerPadding: '150px',      // Initial padding for large screens
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: false,               // Hide arrows by default
        responsive: [
            {
                breakpoint: 1440,    // For large desktops
                settings: {
                    slidesToShow: 2,
                    centerPadding: '100px', // Adjust padding for large screens
                },
            },
            {
                breakpoint: 1200,    // For smaller desktops
                settings: {
                    slidesToShow: 2,
                    centerPadding: '50px', // Reduced padding
                },
            },
            {
                breakpoint: 1024,    // For tablets
                settings: {
                    slidesToShow: 2,
                    centerMode: false,     // Disable centering
                    centerPadding: '30px', // Smaller padding
                },
            },
            {
                breakpoint: 768,     // For mobile devices
                settings: {
                    fade: true,
                    slidesToShow: 2,
                    centerMode: false, // Disable centering
                    arrows: false,     // Hide arrows for simplicity
                    dots: false,        // Enable dots for better navigation
                    centerPadding: '50px',           // Enable dots for navigation
                },
            },
            {
                breakpoint: 480,     // For very small devices
                settings: {
                    slidesToShow: 1,
                    centerMode: false,
                    centerPadding: '10px', // Minimal padding
                    dots: true,            // Enable dots
                },
            },
        ],
    });
});


