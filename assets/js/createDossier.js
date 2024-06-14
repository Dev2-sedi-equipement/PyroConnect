
    let btnBack = document.querySelector(".btnBack");
    btnBack.addEventListener("click",()=>{
        var audio = document.getElementById("audio");
        audio.play();
        btnBack.classList.add("animatePress");
    })

  
    const dossiers_assignVrp = document.getElementById("dossiers_assignVrp");
    const dossiers_dpt = document.getElementById("dossiers_dpt");

    dossiers_assignVrp.addEventListener("mousedown", function(e) {
        e.preventDefault();
    });

    dossiers_dpt.addEventListener("mousedown", function(e) {
        e.preventDefault();
    });

    //Après la soumission du form refresh le formulaire
    document.addEventListener('turbo:submit-end', () => {
        // Réinitialisez le formulaire
        let dossierGenerer = document.querySelector('.dossier-generated');
        dossierGenerer.reset();
        const dossiers_dpt = document.getElementById("dossiers_dpt");
        const dossiers_typeFeu = document.getElementById("dossiers_typeFeu");
        const dossiers_dateTir = document.getElementById("dossiers_dateTir");
        const dossiers_montant = document.getElementById("dossiers_montant");
        const assignVrp = document.getElementById("dossiers_assignVrp");
        const selectClient = document.getElementById("selectClient");

        dossiers_dpt.classList.remove("success-style");
        dossiers_typeFeu.classList.remove("success-style");
        dossiers_dateTir.classList.remove("success-style");
        dossiers_montant.classList.remove("success-style");
        assignVrp.classList.remove("success-style");
        selectClient.innerText="";

    });


    //Récupérer les éléments du DOM 
    const personnelInput = document.getElementById("dossiers_nomPersonnel");
    const personnelValueInput = document.getElementById("personnelValue");
    const personnelBtnSubmit = document.getElementById("personnelBtnSubmit");
    const iconDelete = document.getElementById("icon-delete");
    const nbPersonnelInput = document.getElementById("dossiers_nbPersonnel");

    //Fonction pour mettre à jour le nombre de personnels 
    function updateNbPersonnel() {
        // Séparer les valeurs actuelles par une virgule
        const personnelValues = personnelInput.value.split(", ");
        // Mettre à jour le champ de nombre de personnels avec la longueur du tableau
        nbPersonnelInput.value = personnelValues.length;
    }

    //Ajouter un écouteur d'événements sur le bouton de soumission 
    personnelBtnSubmit.addEventListener("click", function(event) {
        event.preventDefault();
        const value = personnelValueInput.value.trim();
        if (value !== "") {
            // Ajouter la valeur à l'input readonly
            personnelInput.value += (personnelInput.value ? ", " : "") + value;
            // Effacer la valeur saisie
            personnelValueInput.value = "";
            // Mettre à jour le nombre de personnels
            updateNbPersonnel();
            // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
            event.stopPropagation();
        }
    });

    // Evenement pour supprimer les elements dans le input nbPersonnel 
    iconDelete.addEventListener("click", function(event) {
        // Récupérer les valeurs actuelles dans l'input readonly
        let currentValues = personnelInput.value.split(", ");
        // Supprimer la dernière valeur ajoutée
        currentValues.pop();
        // Mettre à jour l'input readonly avec les valeurs restantes
        personnelInput.value = currentValues.join(", ");
        // Mettre à jour le nombre de personnels
        updateNbPersonnel();
        // Si la liste des valeurs personnelles est vide, mettre à jour nbPersonnelInput à 0
        if (currentValues.length === 0) {
            nbPersonnelInput.value = 0;
        }
        // Empêcher la propagation de l'événement de clic pour éviter la fermeture du dropdown
        event.stopPropagation();
    });


    document.addEventListener('DOMContentLoaded', function() {
        const form = document.querySelector('.dossier-generated');
        const feu = document.getElementById('dossiers_nbPersonnel');
        const assignVrpField = document.getElementById('dossiers_assignVrp');
        const typeFeuField = document.getElementById('dossiers_typeFeu');
        const dateTirField = document.getElementById('dossiers_dateTir');
        const departementField = document.getElementById('dossiers_dpt');
        
        //Applique du style lors du changement dans les select
        [assignVrpField, typeFeuField, dateTirField, departementField].forEach(field => {
            field.addEventListener('change', function() {
           
                // Supprimez le tooltip s'il existe
                if (field.hasAttribute('data-bs-original-title')) {
                    field.removeAttribute('data-bs-toggle');
                    field.removeAttribute('data-bs-placement');
                    field.removeAttribute('title');
                    let tooltip = bootstrap.Tooltip.getInstance(field);
                    if (tooltip) {
                        tooltip.dispose();
                    }
                }
                if (field.value !== '') {
                    // Appliquez le style de succès si le champ est rempli
                    field.classList.remove("error-style");
                    field.classList.add("success-style");
                } else {
                    // Sinon, appliquez le style d'erreur
                    field.classList.remove("success-style");
                    field.classList.add("error-style");
                }
            });
        });
        
        //Contraintes de validations si les elements sont vides
        form.addEventListener('submit', function(event) {
            const fields = [
                { field: assignVrpField, errorMessage: 'Vous devez assigner ce dossier à un VRP.' },
                { field: typeFeuField, errorMessage: 'Le type feu doit être sélectionné.' },
                { field: dateTirField, errorMessage: 'Veuillez remplir la date de tir du feu.' },
                { field: departementField, errorMessage: 'Veuillez remplir le departement.' },
    
            ];
        
            fields.forEach(({ field, errorMessage }) => {
                if (field.offsetParent !== null && (field.value === '' || field.selectedIndex === 0)) {
                    field.classList.add("error-style");
                    field.setAttribute('data-bs-toggle', 'tooltip');
                    field.setAttribute('data-bs-placement', 'bottom');
                    field.setAttribute('title', errorMessage);
                    event.preventDefault();
                    // Initialisation du tooltip Bootstrap
                    new bootstrap.Tooltip(field);
                } else {
                    field.classList.add("success-style");
                    field.classList.remove("error-style");
                }
            });
        });

        const assignVrp = document.getElementById('dossiers_assignVrp');
        const nomVrp = document.getElementById('dossiers_nomVrp');   
        const montantField = document.getElementById('dossiers_montant');

        assignVrp.addEventListener('change', function() {
            const selectedOption = assignVrp.options[assignVrp.selectedIndex];
            nomVrp.setAttribute('value', selectedOption.innerHTML);
        });
        
        // Fonction pour mettre à jour la box shadow en vert si le champ est rempli ou sélectionné
        function updateBoxShadow(field) {
            if (field.value !== '' && field.selectedIndex !== 0) {
                field.classList.add("success-style");

            } else {
                field.classList.remove("success-style");
            }
        }

        // Écouter les événements de changement pour chaque champ de formulaire
        assignVrpField.addEventListener('change', function() {
            updateBoxShadow(assignVrpField);
        });

        typeFeuField.addEventListener('change', function() {
            updateBoxShadow(typeFeuField);
        });

        dateTirField.addEventListener('change', function() {
            updateBoxShadow(dateTirField);
        });

        montantField.addEventListener('change', function() {
            updateBoxShadow(montantField);
        });

        departementField.addEventListener('change', function() {
            updateBoxShadow(departementField);
        });

    });



