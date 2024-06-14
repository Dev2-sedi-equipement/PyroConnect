


    // // Récupérer les éléments du DOM
    // const personnelInput = document.getElementById("dossiers_edit_archive_nomPersonnel");
    // const personnelValueInput = document.getElementById("personnelValue");
    // const personnelBtnSubmit = document.getElementById("personnelBtnSubmit");
    // const iconDelete = document.getElementById("icon-delete");
    // const nbPersonnelInput = document.getElementById("dossiers_edit_archive_nbPersonnel");

    // // Fonction pour mettre à jour le nombre de personnels
    // function updateNbPersonnel() {
    //     // Séparer les valeurs actuelles par une virgule
    //     const personnelValues = personnelInput.value.split(", ");
    //     // Mettre à jour le champ de nombre de personnels avec la longueur du tableau
    //     nbPersonnelInput.value = personnelValues.length;
    // }

    // // Ajouter un écouteur d'événements sur le bouton de soumission
    // personnelBtnSubmit.addEventListener("click", function(event) {
    //     event.preventDefault();
    //     const value = personnelValueInput.value.trim();
    //     if (value !== "") {
    //         // Ajouter la valeur à l'input readonly
    //         personnelInput.value += (personnelInput.value ? ", " : "") + value;
    //         // Effacer la valeur saisie
    //         personnelValueInput.value = "";
    //         // Mettre à jour le nombre de personnels
    //         updateNbPersonnel();
    //         // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
    //         event.stopPropagation();
    //     }
    // });

    // // Ajouter un écouteur d'événements sur l'icône de suppression
    // iconDelete.addEventListener("click", function(event) {
    //     // Récupérer les valeurs actuelles dans l'input readonly
    //     let currentValues = personnelInput.value.split(", ");
    //     // Supprimer la dernière valeur ajoutée
    //     currentValues.pop();
    //     // Mettre à jour l'input readonly avec les valeurs restantes
    //     personnelInput.value = currentValues.join(", ");
    //     // Mettre à jour le nombre de personnels
    //     updateNbPersonnel();
    //     // Si la liste des valeurs personnelles est vide, mettre à jour nbPersonnelInput à 0
    //     if (currentValues.length === 0) {
    //         nbPersonnelInput.value = 0;
    //     }
    //     // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
    //     event.stopPropagation();
    // });

