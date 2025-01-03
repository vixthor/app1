// document.addEventListener('DOMContentLoaded', function () {

//     const themeToggle = document.getElementById('theme-toggle');
//     const html = document.documentElement;

//     // Check localStorage for theme preference
//     const userTheme = localStorage.getItem('theme');
//     const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

//     // Apply the theme based on preference or system default
//     if (userTheme === 'dark' || (!userTheme && systemTheme)) {
//         html.classList.add('dark');
//         localStorage.setItem('theme', 'dark');
//     } else {
//         html.classList.remove('dark');
//         localStorage.setItem('theme', 'light');
//     }

//     // Theme toggle button functionality
//     themeToggle?.addEventListener('click', () => {
//         if (html.classList.contains('dark')) {
//             html.classList.remove('dark');
//             localStorage.setItem('theme', 'light');
//         } else {
//             html.classList.add('dark');
//             localStorage.setItem('theme', 'dark');
//         }
//     });
// });
// document.addEventListener('DOMContentLoaded', function () {
//     const themeToggle = document.getElementById('theme-toggle');
//     const html = document.documentElement;

//     // Check localStorage for theme preference
//     const userTheme = localStorage.getItem('theme');
//     const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches;

//     // Apply the theme based on preference or system default
//     if (userTheme === 'dark' || (!userTheme && systemTheme)) {
//         html.classList.add('dark');
//         localStorage.setItem('theme', 'dark');
//     } else {
//         html.classList.remove('dark');
//         localStorage.setItem('theme', 'light');
//     }

//     // Theme toggle button functionality
//     themeToggle?.addEventListener('click', () => {
//         if (html.classList.contains('dark')) {
//             html.classList.remove('dark');
//             localStorage.setItem('theme', 'light');
//         } else {
//             html.classList.add('dark');
//             localStorage.setItem('theme', 'dark');
//         }
//     });
// });


document.addEventListener('DOMContentLoaded', function () {
    console.log('DOM fully loaded and parsed');

    const themeToggle = document.getElementById('theme-toggle');
    const html = document.documentElement;

    // Check if the button exists
    if (!themeToggle) {
        console.error('Theme toggle button not found!');
        return;
    }

    // Log current theme
    console.log('Current theme:', html.classList.contains('dark') ? 'dark' : 'light');

    // Add event listener
    themeToggle.addEventListener('click', () => {
        console.log('Toggle button clicked');
        if (html.classList.contains('dark')) {
            html.classList.remove('dark');
            localStorage.setItem('theme', 'light');
            console.log('Switched to light theme');
        } else {
            html.classList.add('dark');
            localStorage.setItem('theme', 'dark');
            console.log('Switched to dark theme');
        }
    });
});
