// resources/js/countup.js
import { CountUp } from 'countup.js';

// Wait for the document to be fully loaded before starting the animation
document.addEventListener("DOMContentLoaded", () => {
    // Select all elements with the class 'countup' and animate each of them
    const countUpElements = document.querySelectorAll('.countup');

    countUpElements.forEach(element => {
        const endValue = parseFloat(element.getAttribute('data-end-value')) || 0;
        const options = {
            duration: 2,  // Duration of the animation in seconds
            separator: ',', // Use comma as the thousand separator
        };

        // Create a new CountUp instance for the element
        const countUp = new CountUp(element, endValue, options);

        // Start the animation
        if (!countUp.error) {
            countUp.start();
        } else {
            console.error(countUp.error);
        }
    });
});
