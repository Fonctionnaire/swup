import './bootstrap.js';

/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';
import './styles/xp.scss';

import './bootstrap';


var element = document.getElementById('elementt');
console.log(element);
element.addEventListener('animationend', function(event) {
    if (event.animationName === 'firstAnimation') {
        element.style.animation = 'secondAnimation 2s forwards';
    } else if (event.animationName === 'secondAnimation') {
        element.style.animation = 'thirdAnimation 1s forwards';
    } else if (event.animationName === 'thirdAnimation') {
        element.style.animation = 'fourthAnimation 2s forwards';
    } else if (event.animationName === 'fourthAnimation') {
        // Toutes les animations sont terminées
        console.log('Toutes les animations sont terminées !');
    }
});
