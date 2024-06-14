
import '../styles/pages/admin.scss';
document.addEventListener('DOMContentLoaded', function () {

    const modalDialog = document.querySelector('.modal-dialog');
    modalDialog.classList.add("modal-dialog-centered");

   const tsControl = document.querySelector('.ts-control');
   if (tsControl !== null) { 

        const formFieldsetBody = document.querySelector(".field-select");
        const role = tsControl;
        
        // Création de l'élément pour le message d'erreur
        const errorMessageContainer = document.createElement("div");
        errorMessageContainer.id = "error-message-container";
        errorMessageContainer.style.color = "red";
        
        // Fonction pour vérifier la sélection des rôles
        function checkSelection() {
            const vrpSelected = tsControl.querySelector('div[data-value="VRP"]');
            const sfSelected = tsControl.querySelector('div[data-value="SF"]');
        // Sélectionne la div enfant de #flash-messages avec la classe .alert
const addFlash = document.querySelector("#flash-messages > .alert");

// Vérifie si l'élément a été trouvé avant de manipuler ses classes et son texte
if (addFlash) {
    addFlash.classList.remove("alert-success");
    addFlash.classList.add("alert-danger");
    addFlash.innerText = "Une erreur est apparue lors de la soumission du formulaire";
}


            
            // Vérification de la sélection des rôles SF et VRP ou VRP et SF
            if (sfSelected && vrpSelected || vrpSelected && sfSelected) {
                // Les deux rôles sont sélectionnés, donc afficher un message d'erreur et empêcher la soumission du formulaire
                role.classList.add('errorRole'); 
                const errorMessage = "Vous ne pouvez pas sélectionner SF et VRP pour un utilisateur.";
                tsControl.style.cssText += 'color:red;border: 1px solid red !important; box-shadow: 0 0 0 3 red !important;';
                errorMessageContainer.innerText = errorMessage;
                errorMessageContainer.classList.add('pulse', 'circle', 'mt-2', 'errorRole');


            } else {
                // Réinitialisation du style et du comportement du bouton de soumission
                tsControl.style.cssText = ''; // Réinitialisation du style
                errorMessageContainer.innerText = ''; // Réinitialisation du message d'erreur
                role.classList.remove('errorRole'); // Suppression de la classe d'erreur
            }
        }
        
        // Exécuter la fonction checkSelection chaque fois que le contenu de tsControl est modifié
        tsControl.addEventListener('change', checkSelection);
        
        // Appeler la fonction checkSelection une première fois pour vérifier l'état initial
        checkSelection();
        
        // Ajouter le conteneur du message d'erreur au document
        formFieldsetBody.appendChild(errorMessageContainer);
        
   }
})
