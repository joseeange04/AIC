/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';

// start the Stimulus application
import './bootstrap';

import Vue from 'vue'

var app = new Vue({
    el: "#all",
    data: {  
    menus : [
        {
        titre:"Itinéraire",
        texte: "Vous aider pour les cultures que vous voulez",
        source:"assets/itineraire.jpg",
        ref:"views/itineraire.html"
        },
        {
        titre:"Calendrier",
        texte: "Pour vous guider avec le changement de climat et la plantation",
        source:"assets/calendrier1.png",
        ref:"views/calendrier.html"
        },
        {
        titre:"Technique",
        texte: "Avoir les bonnes techniques pour vos plantations",
        source:"assets/technique.jpg",
        ref:"views/solution.html"
        }
    ],
    connaissances: [
        {
        source:"https://www.youtube.com/embed/MNeHbOlh-94",
        subtitle:"#Agriculture-Intelligente-Face-Au-Climat"
        },
        {
        source:"https://www.youtube.com/embed/g_CG397SRIY",
        subtitle:"#Culture rentable en Afrique"
        }
    ]

    }
})
