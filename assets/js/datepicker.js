flatpickr(".flatpickr-input", {

    dateFormat: "Y-m-d",
    // minDate: 30j plus tard
    minDate: new Date().fp_incr(30),
    // enableTime: true, //pour activer les heures et minutes
     

    
    locale: {
        firstDayOfWeek: 1, // Commence la semaine le lundi
        weekdays: {
            shorthand: ["dim", "lun", "mar", "mer", "jeu", "ven", "sam"],
            longhand: [
                "dimanche",
                "lundi",
                "mardi",
                "mercredi",
                "jeudi",
                "vendredi",
                "samedi",
            ],
        },
        months: {
            shorthand: [
                "Janv",
                "Févr",
                "Mars",
                "Avr",
                "Mai",
                "Juin",
                "Juil",
                "Août",
                "Sept",
                "Oct",
                "Nov",
                "Déc",
            ],
            longhand: [
                "Janvier",
                "Février",
                "Mars",
                "Avril",
                "Mai",
                "Juin",
                "Juillet",
                "Août",
                "Septembre",
                "Octobre",
                "Novembre",
                "Décembre",
            ],
        },

    }
    // Ajoutez d'autres options Flatpickr selon vos besoins
});


