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