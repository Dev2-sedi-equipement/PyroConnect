document.addEventListener('DOMContentLoaded', function() {
    const noNotif = document.querySelector(".noNotif");
    const filterButtons = document.querySelectorAll('.filter-notification');
    const toasts = document.querySelectorAll(".toast");

    // Tri des notification en fonctions du type 
    // Fonction pour gérer l'affichage des notifications en fonction du type sélectionné
    function filterNotifications(type) {
        let hasVisibleNotifications = false;

        toasts.forEach(notification => {
            if (notification.classList.contains(type)) {
                notification.classList.remove('d-none');
                hasVisibleNotifications = true;
            } else {
                notification.classList.add('d-none');
                hasVisibleNotifications = false;

            }
        });

      
    }

    // Ajouter des écouteurs d'événements pour les boutons de filtrage
    filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Empêcher le comportement par défaut du lien

            // Récupérer le type de notification à afficher
            const type = this.getAttribute('data-type');
            if (this.classList.contains('btnToutesNotifs')) {
                // Sélectionner toutes les notifications
                const notifications = document.querySelectorAll('.toast');
    
                // Supprimer la classe d-none de toutes les notifications
                notifications.forEach(notification => {
                    notification.classList.remove('d-none');
                });
            } else {
                // Filtrer les notifications
                filterNotifications(type);
            }
            // Mettre à jour l'état actif des boutons
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
        });
    });
    


    function checkedSort() {
        const ascButton = document.getElementById('ASC');
        const descButton = document.getElementById('DESC');
        if(ascButton){
            // Ajouter des écouteurs d'événements pour les boutons ASC et DESC
            ascButton.addEventListener('click', function() {
                this.checked = true;
                this.classList.add('active');
                
                descButton.checked = false;
                descButton.classList.remove("active"); 
                descButton.style.border = ""; // Supprimer la bordure
                
            });
        }
        if(descButton){

            descButton.addEventListener('click', function() {
                this.checked = true;
                this.classList.add('active');
            
                ascButton.checked = false;
                ascButton.classList.remove("active"); 
                ascButton.style.border = ""; // Supprimer la bordure
            
            
            });
        }
    }

    // Appelez la fonction
    checkedSort();
    
    
});
