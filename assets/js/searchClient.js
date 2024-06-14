let timeoutId;
    const searchCache = {}; // Objet pour stocker les résultats en cache

    // Fonction pour effacer le contenu des autres champs de recherche
    function clearOtherSearchFields(currentFieldId) {
        const fieldIds = ['searchVille', 'searchName', 'searchCodeClient'];
        fieldIds.forEach(function (fieldId) {
            if (fieldId !== currentFieldId) {
                document.getElementById(fieldId).value = '';
            }
        });
    }

    // Fonction pour sélectionner les éléments du dropdown
    function selectDropdownItems() {
        const dropdownItems = document.querySelectorAll('#searchClientUl .dropdown-item');
        dropdownItems.forEach(function(item) {
            item.addEventListener('click', function() {
                const clientId = item.getAttribute('data-id');
                const dataName = item.getAttribute('data-name');
                const dataDpt = item.getAttribute('data-dpt');
                const dataInsee = item.getAttribute('data-insee');
                const dataVrp = item.getAttribute('data-vrp');

                let dossiersClientId = document.getElementById('dossiers_clientId');
                let dossiersDpt = document.getElementById('dossiers_dpt');
                let selectClient = document.getElementById('selectClient');
                let dossiersNomVrp = document.getElementById('dossiers_nomVrp');
                let dossiersDataName = document.getElementById('dossiers_data_name');
                let dossiersUserId = document.getElementById('dossiers_userId');
                let dossiersAssignVrp = document.getElementById('dossiers_assignVrp');

                dossiersClientId.value = clientId;
                dossiersDpt.value = dataDpt;
                dossiersDpt.classList.add("success-style");
                selectClient.innerHTML = "Client sélectionné : " + dataName + " | Code Insee : " + dataInsee;
                dossiersNomVrp.value = dossiersAssignVrp.options[dossiersAssignVrp.selectedIndex].text;
                dossiersDataName.value = dataName;
                dossiersUserId.value = dataVrp;
                dossiersAssignVrp.value = dataVrp.trim();
                dossiersAssignVrp.classList.add("success-style");


                
            });
        });
    }

    // Fonction pour effectuer une requête AJAX et mettre à jour le dropdown
    function handleInput(inputId, endpoint) {
        clearOtherSearchFields(inputId);
        clearTimeout(timeoutId);

        timeoutId = setTimeout(function () {
            const searchTerm = document.getElementById(inputId).value.trim();

            // Vérifier si le résultat est en cache
            const cacheKey = endpoint + '?' + searchTerm;
            if (searchCache[cacheKey]) {
                updateDropdown(searchCache[cacheKey]);
            } else {
                const xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4) {
                        if (xhr.status === 200) {
                            const data = JSON.parse(xhr.responseText);
                            searchCache[cacheKey] = data; // Stocker les résultats en cache
                            updateDropdown(data);
                        } else {
                            console.error('Une erreur est survenue lors de la requête AJAX');
                        }
                    }
                };
                xhr.open('GET', endpoint + '?search_term=' + encodeURIComponent(searchTerm), true);
                xhr.send();
            }
        }, 800);
    }

    // Fonction pour mettre à jour le dropdown
    function updateDropdown(data) {
        let options = '';
        if (data.length === 0) {
            options += '<li class="p-3" style="max-width: 524px;"><span class="" href="#">Aucun client trouvé</span></li>';
        } else {
            data.forEach(function (client) {
                let nomClient = client.nom !== '' ? client.nom + ' - Département : ' + client.codeDpt : 'Aucun client trouvé';
                let ville = " | Ville : " + client.ville;
                options += '<li style="max-width: 524px;"><a style="text-wrap: wrap;" class="dropdown-item" href="#" data-id="' + client.id + '" data-name="'+ client.nom + '" data-dpt="'+ client.codeDpt + '" data-insee="'+ client.codeInsee + '" data-vrp="'+ client.userId + '" data-ville="'+ client.ville + '">' + nomClient + ville + '</a></li>';
            });
        }
        const dropdownList = document.querySelector('#searchClientUl');
        if(dropdownList){

        dropdownList.innerHTML = options;
        }
        selectDropdownItems();
        const dropdown = document.querySelector('.dropdown');
        dropdown.classList.add('show');
    }

    // Récupérer le rôle de l'utilisateur
    const roleUser = document.getElementById("roleUser");

    if(roleUser.innerHTML === "Vrp"){
        // Routes pour les autres rôles
        document.getElementById('searchVille').addEventListener('input', function () {
            handleInput('searchVille', '/searchVille');
        });
        document.getElementById('searchName').addEventListener('input', function () {
            handleInput('searchName', '/searchClient');
        });

        document.getElementById('searchCodeClient').addEventListener('input', function () {
            handleInput('searchCodeClient', '/searchC0');
        });

        document.getElementById('dropdownSelectClient').addEventListener('click', function() {
            handleInput('searchVille', '/searchVille');
        });
    }else{        

        // Routes pour le rôle de Vrp
        document.getElementById('searchName').addEventListener('input', function () {
            handleInput('searchName', '/searchClientSf');
        });

        document.getElementById('searchVille').addEventListener('input', function () {
            handleInput('searchVille', '/searchVilleSf');
        });

        document.getElementById('searchCodeClient').addEventListener('input', function () {
            handleInput('searchCodeClient', '/searchC0Sf');
        });

        document.getElementById('dropdownSelectClient').addEventListener('click', function() {
            handleInput('searchVille', '/searchVilleSf');
        });
    
    }
