<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Component/options.html.twig */
class __TwigTemplate_dd658d176eccd6c9030d10e0047125ff extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/options.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/options.html.twig"));

        // line 1
        yield "<div class=\"d-flex justify-content-center flex-wrap dossierAffichage\">

    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-all-dossiers\" data-turbo-stream name=\"dossier-type\" checked />
        <label for=\"btn-all-dossiers\" class=\"btn btn-options m-2 btn-light btn-three text-black\" style=\"color: black;\" data-turbo-stream>Tous les dossiers <span class=\"badge text-bg-dark\" id=\"number-All\"> </span></label>
    </div>
    ";
        // line 8
        yield "    ";
        if (CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "user", [], "any", false, false, false, 8), "roles", [], "any", false, false, false, 8))) {
            // line 9
            yield "
    ";
        } else {
            // line 11
            yield "        ";
            // line 12
            yield "        <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nouveau");
            yield "\" data-turbo-prefetch=\"true\" data-turbo=\"true\" class=\"btn btn-options m-2 btn-primary btn-three\">Nouveau Dossier</a>    
    ";
        }
        // line 14
        yield "
  <!-- Ajoutez un attribut data-sort-order pour stocker l'ordre de tri -->
    <div>
        <input type=\"radio\" data-sort-order=\"desc\"  class=\"d-none\" id=\"btn-dossier-traite\" data-turbo-stream name=\"dossier-type\"  />
        <label for=\"btn-dossier-traite\" class=\"btn btn-options m-2 btn-success btn-three\"  data-turbo-stream>Dossier Traité <span id =\"number-Traite\"class=\"badge text-bg-dark\"></span></label>
    </div>
    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-dossier-en-cours\" data-turbo-stream name=\"dossier-type\"/>
        <label for=\"btn-dossier-en-cours\" class=\"btn btn-options m-2 btn-warning btn-three\" data-turbo-stream>Dossier en cours de traitement <span class=\"badge text-bg-dark\" id =\"number-EnCours\"></span></label>
    </div>

    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-dossier-non-traite\" data-turbo-stream name=\"dossier-type\"/>
        <label for=\"btn-dossier-non-traite\" class=\"btn btn-options m-2 btn-danger btn-three\" data-turbo-stream>Dossier non traité <span class=\"badge text-bg-dark\"id =\"number-NonTraite\"></span></label>
    </div>
</div>

<section class=\"d-flex justify-content-center gap-2 mb-4\">
    <div class=\"bloc-sort\">
        <div class=\"btn-group btn-group-toggle z-0 gap-3\" id=\"sortParent\"data-toggle=\"buttons\">
            <button type=\"button\"  id=\"ASC\" class=\"btn animate__bounceInUp__delay-2s btn-secondary glow-on-active btn-sm btn-sort-asc ";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "query", [], "any", false, false, false, 34), "get", ["sortOrder", "desc"], "method", false, false, false, 34) == "asc"), "html", null, true);
        yield "\" style=\"width: fit-content;\" data-turbo-prefetch=\"true\" data-turbo=\"true\">
                <span class=\"me-1\">
                    <i class=\"bi bi-arrow-down\"></i>
                </span>
                Trier par les plus anciens crées
            </button>
            <button type=\"button\" id=\"DESC\"class=\"btn btn-secondary glow-on-active btn-sm btn-sort-desc ";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 40, $this->source); })()), "request", [], "any", false, false, false, 40), "query", [], "any", false, false, false, 40), "get", ["sortOrder", "desc"], "method", false, false, false, 40) == "desc"), "html", null, true);
        yield " active\" style=\"width: fit-content;\" data-turbo-prefetch=\"true\" data-turbo=\"true\">
                <span class=\"me-1\">
                    <i class=\"bi bi-arrow-up\"></i>
                </span>
                Trier par les plus récents crées
            </button>
        </div>
    </div>
   <div class=\"dropdown\">
        
        ";
        // line 50
        if ((CoreExtension::inFilter("SF", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "roles", [], "any", false, false, false, 50)) || CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 50, $this->source); })()), "user", [], "any", false, false, false, 50), "roles", [], "any", false, false, false, 50)))) {
            // line 51
            yield "            <button id='btnOptionsTri' class=\"glow-on-active  w-100\" style=\"background: #111;\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><span class=\"text-white p-2\"> Options tri<span class=\"text-danger fw-bold\"> [0]</span></span></button>
            
            <ul class=\"dropdown-menu checkbox-menu allow-focus \" id=\"btnDropdownOptions\" aria-labelledby=\"dropdownMenu1\">

                <li style=\"padding-left: 0.25rem;padding-right: 0.25rem;text-wrap: nowrap;\">
                    <label class=\"w-100 btn text-start label-optionsTri\">
                        <input type=\"checkbox\" id=\"hideArchive\"> Cacher les dossiers Archivé <span class=\"numberArchived badge text-bg-secondary \"></span></input>
                    </label>
                </li>
                <li style=\"padding-left: 0.25rem;padding-right: 0.25rem;text-wrap: nowrap;\">
                    <label class=\"w-100 btn text-start label-optionsTri\">
                        <input type=\"checkbox\" id=\"showOnlyArchive\"> Afficher uniquement les dossiers archivés <span class=\"numberArchived badge text-bg-secondary \"></span></input>
                    </label>
                </li>

            </ul>
        ";
        }
        // line 68
        yield "    </div>
</section>

<style>.dropdown-toggle::after {

  margin-left: 0!important; }
  
  </style>
<script lazy>

    // Variable globale pour stocker les dossiers affichés
    let displayedDossiers = [];
    function main() {
        document.addEventListener('DOMContentLoaded', function() {    

            let numberTriActive = 0; // Variable globale pour suivre le nombre total d'éléments filtrés

            // Fonction pour mettre à jour le texte du bouton
            function updateBtnOptionsTri() {
                const btnOptionsTri = document.getElementById('btnOptionsTri');
                if (btnOptionsTri) {
                    btnOptionsTri.innerHTML = `<span class=\"text-white p-2\"> Options tri<span class=\"text-danger fw-bold\"> [\${numberTriActive}]</span>`;
                }
            }

            // Fonction pour gérer le filtrage des dossiers archivés
            function toggleArchivedElements(shouldHide) {
                if (shouldHide) {
                    numberTriActive++;
                } else {
                    numberTriActive--;
                }

                const archivedElements = document.querySelectorAll('.spanDate.Archivé');
                archivedElements.forEach(function(element) {
                    const parentA = element.closest('a');
                    if (parentA) {
                        if (shouldHide) {
                            parentA.classList.add('d-none');
                            btnOptionsTri.classList.add(\"glow-on-active\", \"active\");
                        } else {
                            parentA.classList.remove('d-none');
                            btnOptionsTri.classList.remove(\"active\");
                            checkActiveTri()

                        }
                    }
                });

                updateBtnOptionsTri(); // Met à jour le texte du bouton après chaque changement
            }

            // Fonction pour gérer le filtrage des dossiers non archivés
            function toggleArchivedElementsShowOnly(shouldHide) {
                if (shouldHide) {
                    numberTriActive++;
                } else {
                    numberTriActive--;
                }

                const notArchivedElements = document.querySelectorAll('.spanDate:not(.Archivé)');
                notArchivedElements.forEach(element => {
                    const parentA = element.closest('a');
                    if (parentA) {
                        if (shouldHide) {
                            parentA.classList.add('d-none');
                            btnOptionsTri.classList.add(\"glow-on-active\", \"active\");

                        } else {
                            parentA.classList.remove('d-none');
                            btnOptionsTri.classList.remove(\"active\");
                            checkActiveTri()

                        }
                    }
                });

                updateBtnOptionsTri(); // Met à jour le texte du bouton après chaque changement
            }

            function checkActiveTri(){
                // Ajout de la classe glow-on-active et active si au moins un des filtres est actif
                if (numberTriActive > 0) {
                    btnOptionsTri.classList.add(\"glow-on-active\", \"active\");
                } else {
                    btnOptionsTri.classList.remove(\"active\");
                }
            }

            // Gestionnaire d'événements pour la case à cocher \"Cacher les dossiers Archivés\"
            let hideArchive = document.getElementById('hideArchive');
            if (hideArchive) {
                const allArchivedElements = document.querySelectorAll('span.bg-1');
                let numberArchived = document.querySelectorAll('.numberArchived');
                numberArchived.forEach(element => {
                    element.innerText = allArchivedElements.length;
                });                
                hideArchive.addEventListener('change', function(e) {
                    toggleArchivedElements(this.checked);
                });
            }

            // Gestionnaire d'événements pour la case à cocher \"Cacher les dossiers non Archivés\"
            let showOnlyArchive = document.getElementById('showOnlyArchive');
            if (showOnlyArchive) {
                showOnlyArchive.addEventListener('change', function(e) {
                    toggleArchivedElementsShowOnly(this.checked);
                });
            }

                   
           
            //Affichage nombre dossiers sur le bouton Tous les dossiers
            const dossierContainer = document.querySelector(\".dossier-container\");
            const spanNumberAll = document.querySelector(\"#number-All\");
            
            if (dossierContainer) {
                const dossierContainerChildTotal = dossierContainer.children.length;
                if (spanNumberAll) {
                    spanNumberAll.innerText = dossierContainerChildTotal;
                }
            }else{
                spanNumberAll.innerText = 0;               
            }

            const ASC = document.getElementById('ASC');
            const DESC = document.getElementById('DESC');

            // Ajouter des gestionnaires d'événements pour les boutons de tri
            ASC.addEventListener('click', () => {
                sortDossiers('asc');
                DESC.classList.remove(\"active\");
                ASC.classList.add(\"active\");
            });

            DESC.addEventListener('click', () => {
                sortDossiers('desc');
                ASC.classList.remove(\"active\");
                DESC.classList.add(\"active\");
            });

            //Tri des dossiers selons les dates de créations des dossiers
            function sortDossiers(order) {  
                const activeButton = document.querySelector(order === 'asc' ? '.btn-sort-asc' : '.btn-sort-desc');
                const dossiersList = document.querySelector('.all-dossiers');
                const dossiers = Array.from(document.querySelectorAll('.all-dossiers'));

                const compareDates = (date1, date2) => {
                    const [day1, month1, year1, hour1, minute1, second1] = date1.split(/[\\/\\s:]+/).map(Number);
                    const [day2, month2, year2, hour2, minute2, second2] = date2.split(/[\\/\\s:]+/).map(Number);

                    const dateObj1 = new Date(year1, month1 - 1, day1, hour1, minute1, second1);
                    const dateObj2 = new Date(year2, month2 - 1, day2, hour2, minute2, second2);

                    if (order === 'asc') {
                        return dateObj1 - dateObj2;
                    } else {
                        return dateObj2 - dateObj1;
                    }
                };

                dossiers.sort((a, b) => {
                    const dateTextA = a.querySelector('.dateCreation').innerText.trim();
                    const dateTextB = b.querySelector('.dateCreation').innerText.trim();
                    return compareDates(dateTextA, dateTextB);
                });

                // Mettre à jour la liste des dossiers affichés avec les dossiers triés
                displayedDossiers = dossiers;

                displaySortedDossiers(displayedDossiers);
            }

            // Fonction pour afficher les dossiers triés
            function displaySortedDossiers(dossiers) {
                const dossiersList = document.querySelector('.list-dossiers');
        
                // Réinsérer les dossiers triés dans le conteneur dossier-container
                dossiers.forEach(dossier => {
                    dossiersList.parentElement.appendChild(dossier);
                });
            }
        });
    }    

    document.addEventListener('DOMContentLoaded', function() {  

        const searchBar = document.getElementById('searchBar');
        // Ajouter un écouteur d'événements sur l'input pour détecter les changements
        searchBar.addEventListener('input', checkURLAndToggleButton);

        function checkURLAndToggleButton() {
            const currentURL = window.location.href;
            const noResultLive = document.querySelector('.noResultLive');
   
            const searchBarValue = searchBar.value.trim(); // Obtient la valeur de l'input en supprimant les espaces vides au début et à la fin
            if (searchBarValue === '') {
                if (allDossiersButton) {
                    allDossiersButton.checked = true;   
                }
            }

        }
        //En premier temps je récupere les informations des dossiers, ici les nombres des dossiers traités
        // Définir l'ordre de tri initial
        let sortOrder = 'desc';
        
        const spanNumberTraite = document.querySelector(\"#number-Traite\");
        const spanNumberEnCours= document.querySelector(\"#number-EnCours\");
        const spanNumberNonTraite = document.querySelector(\"#number-NonTraite\");

        let roleUser = document.getElementById(\"roleUser\");
        if(roleUser.innerText==\"Service Feux\"|| roleUser.innerText==\"Admin\"){
            if(!localStorage.getItem(\"dossiersNumberTraiteSF\")){
                // Effectuer la requête fetch
                fetch('/dossiers/findAllTraiteDossiers?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberTraite.innerText = dossiersNumber;
                    // Stocker le nombre de dossiers traités dans le localStorage
                    localStorage.setItem('dossiersNumberTraiteSF', dossiersNumber);
                })
      
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-2');
                spanNumberTraite.innerText = allFlexElements.length;
            }
               
            if(!localStorage.getItem(\"dossiersNumberEnCoursSF\")){

                fetch('/dossiers/findAllEnCoursDeTraitement?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberEnCours.innerText = dossiersNumber;
                    localStorage.setItem('dossiersNumberEnCoursSF', dossiersNumber);

                })
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-3');
                spanNumberEnCours.innerText = allFlexElements.length;  
            }

            if(!localStorage.getItem(\"dossiersNumberNonTraiteSF\")){

                fetch('/dossiers/findAllNonTraite?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberNonTraite.innerText = dossiersNumber;
                    localStorage.setItem('dossiersNumberNonTraiteSF', dossiersNumber);

                })
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-4');
                spanNumberNonTraite.innerText = allFlexElements.length;  
            }


        }else{

            if(!localStorage.getItem(\"dossiersNumberTraite\")){
                // Effectuer la requête fetch pour les dossiers traités
                fetch('/dossiers/findAllTraiteDossiersVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberTraite.innerText = dossiersNumber;
                    
                    // Stocker le nombre de dossiers traités dans le localStorage
                    localStorage.setItem('dossiersNumberTraite', dossiersNumber);
                });
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-2');
                spanNumberTraite.innerText = allFlexElements.length;
            }

            if(!localStorage.getItem(\"dossiersNumberEnCours\")){
                // Effectuer la requête fetch pour les dossiers en cours de traitement
                fetch('/dossiers/findAllEnCoursDeTraitementVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberEnCours.innerText = dossiersNumber;
                    
                    // Stocker le nombre de dossiers en cours de traitement dans le localStorage
                    localStorage.setItem('dossiersNumberEnCours', dossiersNumber);
                });
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-3');
                spanNumberEnCours.innerText = allFlexElements.length;  
            }
            
            if(!localStorage.getItem(\"dossiersNumberNonTraite\")){
                // Effectuer la requête fetch pour les dossiers non traités
                fetch('/dossiers/findAllNonTraiteVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberNonTraite.innerText = dossiersNumber;

                    // Stocker le nombre de dossiers non traités dans le localStorage
                    localStorage.setItem('dossiersNumberNonTraite', dossiersNumber);
                });

            }else{
                let allFlexElements = document.querySelectorAll('span.bg-4');
                spanNumberNonTraite.innerText = allFlexElements.length;  
            }


        }
        
        //Déclaration des variables
        const allDossiersButton = document.getElementById('btn-all-dossiers');
        const noFile = document.getElementById(\"noFile\");
        
        const buttons = [
            document.getElementById('btn-dossier-traite'),
            document.getElementById('btn-all-dossiers'),
            document.getElementById('btn-dossier-en-cours'),
            document.getElementById('btn-dossier-non-traite')
        ];


        // Le script suivant détecte les roles utilisateurs, en fonction du roles met des requetes approprié pour le tri des dossiers
        let messageDisplayed = false; // Variable pour suivre si le message d'erreur a déjà été affiché
        if (roleUser.innerText==\"Service Feux\" || roleUser.innerText==\"Admin\"){
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (button.id === 'btn-dossier-traite') {
                        const noFile = document.querySelector('#noDossierFound');
                        const dossierContainer = document.querySelector('.dossier-container');
                        const sortParentTraite = document.getElementById(\"sortParentTraite\");
                        // Variable contenant les dossiers traites du service feu dans le local storage
                        let storedTraiteDossiers = localStorage.getItem(\"traiteSf\");

                        if (!storedTraiteDossiers || JSON.parse(storedTraiteDossiers).length === 0) {

                            fetchAndUpdateDossiers();
                        } else {
                            storedTraiteDossiers = JSON.parse(storedTraiteDossiers);

                            updateDossierDisplay(storedTraiteDossiers);
                        }

                        function fetchAndUpdateDossiers() {
                            fetch('/dossiers/findAllTraiteDossiers')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('traiteSf', JSON.stringify(data.dossiers));
                                    if(localStorage.getItem('traiteSf') == \"[]\")
                                    {
                                        updateDossierDisplay(data.dossiers)
                                    }
                                    
                                })
                                .catch(error => console.error('Error:', error));
                        }

                         function updateDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const dossierContainer = document.querySelector('.list-dossiers'); 
                        
                            if (!dossierContainer) {
                                console.error('dossierContainer is not found');
                                return;
                            }

                            if (dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                                });

                                const bgColorClass = 'bg-'+ couleur; // Utilisation de la couleur pour définir la classe bgColorClass
                                dossierElements.forEach(dossierElement => {
                                    const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                    let hasBgVert = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));
                                    
                                    if (hasBgVert) {
                                        dossierElement.style = 'display: flex!important;'; // Affiche l'élément si l'un des span a la classe bg-orange
                                    } else {
                                        dossierElement.style = 'display: none!important;'; // Masque l'élément si aucun span n'a la classe bg-orange
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none!important;\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });
                                if (noFile) {
                                    noFile.style = 'display: none!important;'; 
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-all-dossiers') {
                        const noFile = document.querySelector('.noFile');
                        const fetchAndUpdateAllDossiers = () => {
                            if(noFile){
                                noFile.style = \"display: none !important;\";

                            }
                            fetch('/dossiers/findAllDossiers')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('allDossiers', JSON.stringify(data.dossiers));

                                    updateAllDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        const storedAllDossiers = localStorage.getItem('allDossiers');
                        if (storedAllDossiers) {
                            const dossiers = JSON.parse(storedAllDossiers);
                            updateAllDossierDisplay(dossiers);
                        } else {
                            fetchAndUpdateAllDossiers();
                        }
                    }

                    else if (button.id === 'btn-dossier-en-cours') {
                        let storedEnCoursDeTraitementDossiersVRP = localStorage.getItem('enCoursDeTraitementSf');

                        if (!storedEnCoursDeTraitementDossiersVRP || JSON.parse(storedEnCoursDeTraitementDossiersVRP).length === 0) {
                            
                            fetchAndUpdateEnCoursDeTraitement();
                        } else {
                            
                            storedEnCoursDeTraitementDossiersVRP = JSON.parse(storedEnCoursDeTraitementDossiersVRP);

                            updateDossierDisplay(storedEnCoursDeTraitementDossiersVRP);
                        }
                        function updateDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');

                            if (dossiers.dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                              
                                });

                                const bgColorClass = 'bg-' + couleur; // Utilisation de la couleur pour définir la classe bgColorClass
                                dossierElements.forEach(dossierElement => {
                                    const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                    let hasBgOrange = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));
                                  
                                    if (hasBgOrange) {
                                        dossierElement.style = 'display: flex!important;'; // Affiche l'élément si l'un des span a la classe bg-orange
                                    } else {
                                        dossierElement.style = 'display: none!important;'; // Masque l'élément si aucun span n'a la classe bg-orange
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none!important;\";
                                }
                            } else {                            
                             
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });
                                if (noFile) {
                                    noFile.style = 'display: none!important;'; 
                                }
                            }
                        }

                        function fetchAndUpdateEnCoursDeTraitement() {
                            fetch('/dossiers/findAllEnCoursDeTraitement')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('enCoursDeTraitementSf', JSON.stringify(data));

                                     if(localStorage.getItem('enCoursDeTraitementSf') == \"[]\")
                                    {
                                        //Si aucun dossier dans le local storage joue la methode updateDossierDisplay qui verifie et display none 
                                        updateDossierDisplay(data.dossiers)
                                    }
                                
                                })
                                .catch(error => console.error('Error:', error));
                        }

                      
                    }

                    else if (button.id === 'btn-dossier-non-traite') {      
            
                        const fetchAndUpdateNonTraiteDossiers = () => {
                            fetch('/dossiers/findAllNonTraite')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('nonTraiteDossiers', JSON.stringify(data.dossiers));      
                                    updateNonTraiteDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        let storedNonTraiteDossiers = localStorage.getItem('nonTraiteDossiers');

                        if (!storedNonTraiteDossiers || JSON.parse(storedNonTraiteDossiers).length === 0) {

                            fetchAndUpdateNonTraiteDossiers();
                        } else {
                            storedNonTraiteDossiers = JSON.parse(storedNonTraiteDossiers);

                            updateNonTraiteDossierDisplay(storedNonTraiteDossiers);
                        }

                        function updateNonTraiteDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossiers.length > 0 && dossiers[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossiers[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = '';

                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none !important;\";
                                }
                            } else {                            
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }
                    }
                });
            });
        }else{
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (button.id === 'btn-dossier-traite') {
                        let storedTraiteDossiers = localStorage.getItem('traiteVrp');

                        if (!storedTraiteDossiers || JSON.parse(storedTraiteDossiers).length === 0) {
                            fetchAndUpdateDossiers();
                        } else {
                            fetchAndUpdateDossiers();

                            storedTraiteDossiers = JSON.parse(storedTraiteDossiers);
                            updateDossierDisplay(storedTraiteDossiers);
                        }

                        function fetchAndUpdateDossiers() {
                            fetch('/dossiers/findAllTraiteDossiersVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('traiteVrp', JSON.stringify(data.dossiers));
                                    localStorage.removeItem(\"traiteVrp\");

                                    updateDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        }

                        function updateDossierDisplay(dossiers) {
                            const dossierContainer = document.querySelector('.dossier-container');
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('.no-file'); // Ensure noFile is defined

                            if (dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                                });

                                const bgColorClass = 'bg-' + couleur; // Utilisation de la couleur pour définir la classe bgColorClass

                                if (dossierElements){
                                    dossierElements.forEach(dossierElement => {
                                        const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                        let hasBgColorClass = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));

                                        if (hasBgColorClass) {
                                            dossierElement.style= 'display: flex !important'; // Affiche l'élément si l'un des span a la classe bgColorClass
                                        } else {
                                            dossierElement.style= 'display: none !important'; // Masque l'élément si aucun span n'a la classe bgColorClass
                                        }
                                    });
                                }

                                if (noFile) {
                                    noFile.style.display = \"none\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });

                                if (noFile) {
                                    noFile.style.display = \"flex\";
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-all-dossiers') {
                        const fetchAndUpdateAllDossiers = () => {
                            if(noFile){
                                noFile.style = \"display: none !important;\";

                            }
                          
                            fetch('/dossiers/findAllDossiersVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('allDossiers', JSON.stringify(data.dossiers));
                                    updateAllDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        const storedAllDossiers = localStorage.getItem('allDossiers');

                        if (storedAllDossiers) {
                            const dossiers = JSON.parse(storedAllDossiers);
                     
                            updateAllDossierDisplay(dossiers);
                        } else {
                            
                            fetchAndUpdateAllDossiers();
                        }
                    }

                    else if (button.id === 'btn-dossier-en-cours') {

                       let storedEnCoursDeTraitementDossiersVRP = localStorage.getItem('enCoursDeTraitementVrp');
                        if (!storedEnCoursDeTraitementDossiersVRP || JSON.parse(storedEnCoursDeTraitementDossiersVRP).dossiers.length === 0) {

                            fetchAndUpdateEnCoursDeTraitementVrp();
                        }else{
                            storedEnCoursDeTraitementDossiersVRP = JSON.parse(storedEnCoursDeTraitementDossiersVRP);
                            updateDossierDisplayVrp(storedEnCoursDeTraitementDossiersVRP);
                        }

                        function fetchAndUpdateEnCoursDeTraitementVrp() {
                            fetch('/dossiers/findAllEnCoursDeTraitementVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('enCoursDeTraitementVrp', JSON.stringify(data));
                                    updateDossierDisplayVrp(data);

                                })
                                .catch(error => console.error('Error:', error));
                        }
                        function updateDossierDisplayVrp(dossiers) {
                                 
                            const dossierUpdateArray = dossiers.dossiers;

                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossierUpdateArray.length > 0 && dossierUpdateArray[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossierUpdateArray[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = ''; 
                                    const parentElement = dossierElement.parentNode;
                                    if (!parentElement.classList.contains('dossier-traite')) {
                                        parentElement.style = 'display:flex !important';
                                    } else {
                                        parentElement.style = 'display:none !important';
                                    }
                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                        const dossierItemsUpdate = document.querySelectorAll(`.list-dossiers .dossier-item span.\${bgColorClass}`);
                                        
                                        // Met à jour le texte de l'élément avec l'ID number-NonTraite
                                        const spanNumberUpdate = document.querySelector(\"#number-EnCours\").innerText = dossierItemsUpdate.length; 
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"displauy: none !important;\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-dossier-non-traite') {  
                      
                        const fetchAndUpdateNonTraiteDossiers = () => {
                            fetch('/dossiers/findAllNonTraiteVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('nonTraiteDossiersVrp', JSON.stringify(data.dossiers));
                                    updateNonTraiteDossierDisplayVRP(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        let storedNonTraiteDossiers = localStorage.getItem('nonTraiteDossiersVrp');
                        localStorage.removeItem('nonTraiteDossiersVrp');

                        if (!storedNonTraiteDossiers || JSON.parse(storedNonTraiteDossiers).length === 0) {

                            fetchAndUpdateNonTraiteDossiers();
                        } else {
                            storedNonTraiteDossiers = JSON.parse(storedNonTraiteDossiers);

                            updateNonTraiteDossierDisplayVRP(storedNonTraiteDossiers);
                        }

                        function updateNonTraiteDossierDisplayVRP(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossiers.length > 0 && dossiers[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossiers[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = ''; 
                                    const parentElement = dossierElement.parentNode;

                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                        const dossierItemsNonTraite = document.querySelectorAll(`.list-dossiers .dossier-item span.\${bgColorClass}`);
                                        // Met à jour le texte de l'élément avec l'ID number-NonTraite
                                        const spanNumberNonTraite = document.querySelector(\"#number-NonTraite\").innerText = dossierItemsNonTraite.length; 
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none !important;\";
                                }
                            } else {


                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }

                    }
                });
            });
        }

        function handleSortClick(order) {
            sortDossiers(order);
            const oppositeOrder = order === 'asc' ? 'desc' : 'asc';
            document.getElementById(order).classList.add(\"active\");
            document.getElementById(oppositeOrder).classList.remove(\"active\");
        }

        function fetchAndUpdateDossiers() {
            fetch('/dossiers/findAllTraiteDossiersVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    updateDossierDisplayTraite(data.dossiers);
                    localStorage.setItem('dossiersTraites', JSON.stringify(data.dossiers));
                })
                .catch(error => console.error('Error:', error));
        }

        function updateDossierDisplayTraite(dossiers) {
            const noFile = document.querySelector('#noDossierFound');
            if (dossiers.length > 0) {
                if (noFile) {
                    noFile.style = \"displauy: none !important;\";
                }
                dossiers.forEach(dossier => displayDossier(dossier));
            } else {
                if (noFile) {
                    noFile.style.display = \"flex !important\";
                }
            }
        }

        function displayDossier(dossier) {
            const idDossier = dossier.id;
            if (!document.getElementById('dossier-' + idDossier)) {
                const dossierItem = createDossierItem(dossier);
                dossierContainer.appendChild(dossierItem);
            }
        }

        function createDossierItem(dossier) {
            const bgColorClass = \"bg-\" + dossier.statut.couleur.toLowerCase();
            const dossierItem = document.createElement('ul');
            dossierItem.classList.add('list-group', 'list-dossiers', 'w-90', 'list-group-flush', 'dossier-traite');
            dossierItem.setAttribute('id', 'dossier-' + dossier.id);
            const editLink = \"/dossiers/\" + dossier.id + \"/edit\";
            dossierItem.innerHTML = `
                <a href=\"\${editLink}\" data-turbo-prefetch=\"true\" data-turbo-stream=\"\" class=\"mt-3 mb-3 card dossier-item d-flex flex-row w-100 justify-content-between text-white\" style=\"text-decoration: none; border: 1px solid white; padding: 0.5rem 0 0.5rem 0.1rem;\">
                    <div style=\"margin: 0.4rem;\">
                        <p><i class=\"fas fa-folder\"></i> Nom du dossier : \${dossier.nom} &nbsp; <i class=\"far fa-calendar-alt\"></i> Date de tir : \${dossier.dateTir ? dossier.dateTir : ''}</p>
                        <p><i class=\"fas fa-fire\"></i> Type de feu : \${dossier.typeFeu}</p>
                    </div>
                    <span class=\"d-flex justify-content-center align-items-center text-center \${bgColorClass} spanDate\">
                        <p class=\"mb-0\"> Date de création : <span class=\"dateCreation\">\${dossier.dateCreation ? dossier.dateCreation : ''}</span></p>
                    </span>
                </a>
            `;
            return dossierItem;
        }

        function compareDates(date1, date2, order) {
            const [day1, month1, year1, hour1, minute1, second1] = date1.split(/[\\/\\s:]+/).map(Number);
            const [day2, month2, year2, hour2, minute2, second2] = date2.split(/[\\/\\s:]+/).map(Number);

            const dateObj1 = new Date(year1, month1 - 1, day1, hour1, minute1, second1);
            const dateObj2 = new Date(year2, month2 - 1, day2, hour2, minute2, second2);

            if (order === 'asc') {
                return dateObj1 - dateObj2;
            } else {
                return dateObj2 - dateObj1;
            }
        }

        function updateAllDossierDisplay(dossiers) {
            if (dossiers.length > 0) {
    
                let dossierContainer = document.querySelector(\".dossier-container\");
                if (!dossierContainer) {
                    let divSearch = document.querySelector(\".divSearch\");
                    divSearch.insertAdjacentHTML(\"afterend\", \"<div class='mt-3 row w-85 dossier-container justify-content-center'></div>\");
                }
            }

            const dossierElements = document.querySelectorAll('.dossier-item');
            dossierElements.forEach(dossierElement => {
                dossierElement.style = ''; 
                dossierElement.parentElement.style = ''; 

                const contentVrp = document.querySelector('.content-vrp') || document.querySelector('.content-sf');
                const pElements = contentVrp.querySelectorAll('#noDossierFound');

                pElements.forEach(pElement => {
                    pElement.parentNode.removeChild(pElement);
                });
                
                

                const parentElement = dossierElement.parentNode;
                if (!parentElement.classList.contains('dossier-traite')) {
                    parentElement.style.display = 'flex !important';
                } else {
                    parentElement.style.display = 'none !important';
                }

                if (dossierElement.style === 'display: flex !important;') {
                    dossierElement.style = 'display: none !important';
                } else if (dossierElement.style === 'display: none !important;') {
                    dossierElement.style = 'display: none !important';
                }
            });
        }
       
    });

    // Appel de la fonction principale après le chargement du DOM
    main();
</script>

";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Component/options.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  132 => 68,  113 => 51,  111 => 50,  98 => 40,  89 => 34,  67 => 14,  61 => 12,  59 => 11,  55 => 9,  52 => 8,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div class=\"d-flex justify-content-center flex-wrap dossierAffichage\">

    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-all-dossiers\" data-turbo-stream name=\"dossier-type\" checked />
        <label for=\"btn-all-dossiers\" class=\"btn btn-options m-2 btn-light btn-three text-black\" style=\"color: black;\" data-turbo-stream>Tous les dossiers <span class=\"badge text-bg-dark\" id=\"number-All\"> </span></label>
    </div>
    {# Vérifiez si l'utilisateur a le rôle ROLE_ADMIN #}
    {% if 'ROLE_ADMIN' in app.user.roles %}

    {% else %}
        {# L'utilisateur n'a pas le rôle ROLE_ADMIN, donc le lien est actif #}
        <a href=\"{{ path('app_nouveau') }}\" data-turbo-prefetch=\"true\" data-turbo=\"true\" class=\"btn btn-options m-2 btn-primary btn-three\">Nouveau Dossier</a>    
    {% endif %}

  <!-- Ajoutez un attribut data-sort-order pour stocker l'ordre de tri -->
    <div>
        <input type=\"radio\" data-sort-order=\"desc\"  class=\"d-none\" id=\"btn-dossier-traite\" data-turbo-stream name=\"dossier-type\"  />
        <label for=\"btn-dossier-traite\" class=\"btn btn-options m-2 btn-success btn-three\"  data-turbo-stream>Dossier Traité <span id =\"number-Traite\"class=\"badge text-bg-dark\"></span></label>
    </div>
    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-dossier-en-cours\" data-turbo-stream name=\"dossier-type\"/>
        <label for=\"btn-dossier-en-cours\" class=\"btn btn-options m-2 btn-warning btn-three\" data-turbo-stream>Dossier en cours de traitement <span class=\"badge text-bg-dark\" id =\"number-EnCours\"></span></label>
    </div>

    <div>
        <input type=\"radio\" class=\"d-none\" id=\"btn-dossier-non-traite\" data-turbo-stream name=\"dossier-type\"/>
        <label for=\"btn-dossier-non-traite\" class=\"btn btn-options m-2 btn-danger btn-three\" data-turbo-stream>Dossier non traité <span class=\"badge text-bg-dark\"id =\"number-NonTraite\"></span></label>
    </div>
</div>

<section class=\"d-flex justify-content-center gap-2 mb-4\">
    <div class=\"bloc-sort\">
        <div class=\"btn-group btn-group-toggle z-0 gap-3\" id=\"sortParent\"data-toggle=\"buttons\">
            <button type=\"button\"  id=\"ASC\" class=\"btn animate__bounceInUp__delay-2s btn-secondary glow-on-active btn-sm btn-sort-asc {{ app.request.query.get('sortOrder', 'desc') == 'asc' }}\" style=\"width: fit-content;\" data-turbo-prefetch=\"true\" data-turbo=\"true\">
                <span class=\"me-1\">
                    <i class=\"bi bi-arrow-down\"></i>
                </span>
                Trier par les plus anciens crées
            </button>
            <button type=\"button\" id=\"DESC\"class=\"btn btn-secondary glow-on-active btn-sm btn-sort-desc {{ app.request.query.get('sortOrder', 'desc') == 'desc' }} active\" style=\"width: fit-content;\" data-turbo-prefetch=\"true\" data-turbo=\"true\">
                <span class=\"me-1\">
                    <i class=\"bi bi-arrow-up\"></i>
                </span>
                Trier par les plus récents crées
            </button>
        </div>
    </div>
   <div class=\"dropdown\">
        
        {% if 'SF' in app.user.roles or 'ROLE_ADMIN' in app.user.roles %}
            <button id='btnOptionsTri' class=\"glow-on-active  w-100\" style=\"background: #111;\" type=\"button\" data-bs-toggle=\"dropdown\" aria-expanded=\"false\"><span class=\"text-white p-2\"> Options tri<span class=\"text-danger fw-bold\"> [0]</span></span></button>
            
            <ul class=\"dropdown-menu checkbox-menu allow-focus \" id=\"btnDropdownOptions\" aria-labelledby=\"dropdownMenu1\">

                <li style=\"padding-left: 0.25rem;padding-right: 0.25rem;text-wrap: nowrap;\">
                    <label class=\"w-100 btn text-start label-optionsTri\">
                        <input type=\"checkbox\" id=\"hideArchive\"> Cacher les dossiers Archivé <span class=\"numberArchived badge text-bg-secondary \"></span></input>
                    </label>
                </li>
                <li style=\"padding-left: 0.25rem;padding-right: 0.25rem;text-wrap: nowrap;\">
                    <label class=\"w-100 btn text-start label-optionsTri\">
                        <input type=\"checkbox\" id=\"showOnlyArchive\"> Afficher uniquement les dossiers archivés <span class=\"numberArchived badge text-bg-secondary \"></span></input>
                    </label>
                </li>

            </ul>
        {% endif %}
    </div>
</section>

<style>.dropdown-toggle::after {

  margin-left: 0!important; }
  
  </style>
<script lazy>

    // Variable globale pour stocker les dossiers affichés
    let displayedDossiers = [];
    function main() {
        document.addEventListener('DOMContentLoaded', function() {    

            let numberTriActive = 0; // Variable globale pour suivre le nombre total d'éléments filtrés

            // Fonction pour mettre à jour le texte du bouton
            function updateBtnOptionsTri() {
                const btnOptionsTri = document.getElementById('btnOptionsTri');
                if (btnOptionsTri) {
                    btnOptionsTri.innerHTML = `<span class=\"text-white p-2\"> Options tri<span class=\"text-danger fw-bold\"> [\${numberTriActive}]</span>`;
                }
            }

            // Fonction pour gérer le filtrage des dossiers archivés
            function toggleArchivedElements(shouldHide) {
                if (shouldHide) {
                    numberTriActive++;
                } else {
                    numberTriActive--;
                }

                const archivedElements = document.querySelectorAll('.spanDate.Archivé');
                archivedElements.forEach(function(element) {
                    const parentA = element.closest('a');
                    if (parentA) {
                        if (shouldHide) {
                            parentA.classList.add('d-none');
                            btnOptionsTri.classList.add(\"glow-on-active\", \"active\");
                        } else {
                            parentA.classList.remove('d-none');
                            btnOptionsTri.classList.remove(\"active\");
                            checkActiveTri()

                        }
                    }
                });

                updateBtnOptionsTri(); // Met à jour le texte du bouton après chaque changement
            }

            // Fonction pour gérer le filtrage des dossiers non archivés
            function toggleArchivedElementsShowOnly(shouldHide) {
                if (shouldHide) {
                    numberTriActive++;
                } else {
                    numberTriActive--;
                }

                const notArchivedElements = document.querySelectorAll('.spanDate:not(.Archivé)');
                notArchivedElements.forEach(element => {
                    const parentA = element.closest('a');
                    if (parentA) {
                        if (shouldHide) {
                            parentA.classList.add('d-none');
                            btnOptionsTri.classList.add(\"glow-on-active\", \"active\");

                        } else {
                            parentA.classList.remove('d-none');
                            btnOptionsTri.classList.remove(\"active\");
                            checkActiveTri()

                        }
                    }
                });

                updateBtnOptionsTri(); // Met à jour le texte du bouton après chaque changement
            }

            function checkActiveTri(){
                // Ajout de la classe glow-on-active et active si au moins un des filtres est actif
                if (numberTriActive > 0) {
                    btnOptionsTri.classList.add(\"glow-on-active\", \"active\");
                } else {
                    btnOptionsTri.classList.remove(\"active\");
                }
            }

            // Gestionnaire d'événements pour la case à cocher \"Cacher les dossiers Archivés\"
            let hideArchive = document.getElementById('hideArchive');
            if (hideArchive) {
                const allArchivedElements = document.querySelectorAll('span.bg-1');
                let numberArchived = document.querySelectorAll('.numberArchived');
                numberArchived.forEach(element => {
                    element.innerText = allArchivedElements.length;
                });                
                hideArchive.addEventListener('change', function(e) {
                    toggleArchivedElements(this.checked);
                });
            }

            // Gestionnaire d'événements pour la case à cocher \"Cacher les dossiers non Archivés\"
            let showOnlyArchive = document.getElementById('showOnlyArchive');
            if (showOnlyArchive) {
                showOnlyArchive.addEventListener('change', function(e) {
                    toggleArchivedElementsShowOnly(this.checked);
                });
            }

                   
           
            //Affichage nombre dossiers sur le bouton Tous les dossiers
            const dossierContainer = document.querySelector(\".dossier-container\");
            const spanNumberAll = document.querySelector(\"#number-All\");
            
            if (dossierContainer) {
                const dossierContainerChildTotal = dossierContainer.children.length;
                if (spanNumberAll) {
                    spanNumberAll.innerText = dossierContainerChildTotal;
                }
            }else{
                spanNumberAll.innerText = 0;               
            }

            const ASC = document.getElementById('ASC');
            const DESC = document.getElementById('DESC');

            // Ajouter des gestionnaires d'événements pour les boutons de tri
            ASC.addEventListener('click', () => {
                sortDossiers('asc');
                DESC.classList.remove(\"active\");
                ASC.classList.add(\"active\");
            });

            DESC.addEventListener('click', () => {
                sortDossiers('desc');
                ASC.classList.remove(\"active\");
                DESC.classList.add(\"active\");
            });

            //Tri des dossiers selons les dates de créations des dossiers
            function sortDossiers(order) {  
                const activeButton = document.querySelector(order === 'asc' ? '.btn-sort-asc' : '.btn-sort-desc');
                const dossiersList = document.querySelector('.all-dossiers');
                const dossiers = Array.from(document.querySelectorAll('.all-dossiers'));

                const compareDates = (date1, date2) => {
                    const [day1, month1, year1, hour1, minute1, second1] = date1.split(/[\\/\\s:]+/).map(Number);
                    const [day2, month2, year2, hour2, minute2, second2] = date2.split(/[\\/\\s:]+/).map(Number);

                    const dateObj1 = new Date(year1, month1 - 1, day1, hour1, minute1, second1);
                    const dateObj2 = new Date(year2, month2 - 1, day2, hour2, minute2, second2);

                    if (order === 'asc') {
                        return dateObj1 - dateObj2;
                    } else {
                        return dateObj2 - dateObj1;
                    }
                };

                dossiers.sort((a, b) => {
                    const dateTextA = a.querySelector('.dateCreation').innerText.trim();
                    const dateTextB = b.querySelector('.dateCreation').innerText.trim();
                    return compareDates(dateTextA, dateTextB);
                });

                // Mettre à jour la liste des dossiers affichés avec les dossiers triés
                displayedDossiers = dossiers;

                displaySortedDossiers(displayedDossiers);
            }

            // Fonction pour afficher les dossiers triés
            function displaySortedDossiers(dossiers) {
                const dossiersList = document.querySelector('.list-dossiers');
        
                // Réinsérer les dossiers triés dans le conteneur dossier-container
                dossiers.forEach(dossier => {
                    dossiersList.parentElement.appendChild(dossier);
                });
            }
        });
    }    

    document.addEventListener('DOMContentLoaded', function() {  

        const searchBar = document.getElementById('searchBar');
        // Ajouter un écouteur d'événements sur l'input pour détecter les changements
        searchBar.addEventListener('input', checkURLAndToggleButton);

        function checkURLAndToggleButton() {
            const currentURL = window.location.href;
            const noResultLive = document.querySelector('.noResultLive');
   
            const searchBarValue = searchBar.value.trim(); // Obtient la valeur de l'input en supprimant les espaces vides au début et à la fin
            if (searchBarValue === '') {
                if (allDossiersButton) {
                    allDossiersButton.checked = true;   
                }
            }

        }
        //En premier temps je récupere les informations des dossiers, ici les nombres des dossiers traités
        // Définir l'ordre de tri initial
        let sortOrder = 'desc';
        
        const spanNumberTraite = document.querySelector(\"#number-Traite\");
        const spanNumberEnCours= document.querySelector(\"#number-EnCours\");
        const spanNumberNonTraite = document.querySelector(\"#number-NonTraite\");

        let roleUser = document.getElementById(\"roleUser\");
        if(roleUser.innerText==\"Service Feux\"|| roleUser.innerText==\"Admin\"){
            if(!localStorage.getItem(\"dossiersNumberTraiteSF\")){
                // Effectuer la requête fetch
                fetch('/dossiers/findAllTraiteDossiers?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberTraite.innerText = dossiersNumber;
                    // Stocker le nombre de dossiers traités dans le localStorage
                    localStorage.setItem('dossiersNumberTraiteSF', dossiersNumber);
                })
      
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-2');
                spanNumberTraite.innerText = allFlexElements.length;
            }
               
            if(!localStorage.getItem(\"dossiersNumberEnCoursSF\")){

                fetch('/dossiers/findAllEnCoursDeTraitement?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberEnCours.innerText = dossiersNumber;
                    localStorage.setItem('dossiersNumberEnCoursSF', dossiersNumber);

                })
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-3');
                spanNumberEnCours.innerText = allFlexElements.length;  
            }

            if(!localStorage.getItem(\"dossiersNumberNonTraiteSF\")){

                fetch('/dossiers/findAllNonTraite?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    let dossiersNumber = data.dossiers.length;
                    spanNumberNonTraite.innerText = dossiersNumber;
                    localStorage.setItem('dossiersNumberNonTraiteSF', dossiersNumber);

                })
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-4');
                spanNumberNonTraite.innerText = allFlexElements.length;  
            }


        }else{

            if(!localStorage.getItem(\"dossiersNumberTraite\")){
                // Effectuer la requête fetch pour les dossiers traités
                fetch('/dossiers/findAllTraiteDossiersVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberTraite.innerText = dossiersNumber;
                    
                    // Stocker le nombre de dossiers traités dans le localStorage
                    localStorage.setItem('dossiersNumberTraite', dossiersNumber);
                });
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-2');
                spanNumberTraite.innerText = allFlexElements.length;
            }

            if(!localStorage.getItem(\"dossiersNumberEnCours\")){
                // Effectuer la requête fetch pour les dossiers en cours de traitement
                fetch('/dossiers/findAllEnCoursDeTraitementVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberEnCours.innerText = dossiersNumber;
                    
                    // Stocker le nombre de dossiers en cours de traitement dans le localStorage
                    localStorage.setItem('dossiersNumberEnCours', dossiersNumber);
                });
            }else{
                let allFlexElements = document.querySelectorAll('span.bg-3');
                spanNumberEnCours.innerText = allFlexElements.length;  
            }
            
            if(!localStorage.getItem(\"dossiersNumberNonTraite\")){
                // Effectuer la requête fetch pour les dossiers non traités
                fetch('/dossiers/findAllNonTraiteVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    // Supposons que data.dossiers contient les dossiers
                    const dossiersNumber = data.dossiers.length;
                    spanNumberNonTraite.innerText = dossiersNumber;

                    // Stocker le nombre de dossiers non traités dans le localStorage
                    localStorage.setItem('dossiersNumberNonTraite', dossiersNumber);
                });

            }else{
                let allFlexElements = document.querySelectorAll('span.bg-4');
                spanNumberNonTraite.innerText = allFlexElements.length;  
            }


        }
        
        //Déclaration des variables
        const allDossiersButton = document.getElementById('btn-all-dossiers');
        const noFile = document.getElementById(\"noFile\");
        
        const buttons = [
            document.getElementById('btn-dossier-traite'),
            document.getElementById('btn-all-dossiers'),
            document.getElementById('btn-dossier-en-cours'),
            document.getElementById('btn-dossier-non-traite')
        ];


        // Le script suivant détecte les roles utilisateurs, en fonction du roles met des requetes approprié pour le tri des dossiers
        let messageDisplayed = false; // Variable pour suivre si le message d'erreur a déjà été affiché
        if (roleUser.innerText==\"Service Feux\" || roleUser.innerText==\"Admin\"){
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (button.id === 'btn-dossier-traite') {
                        const noFile = document.querySelector('#noDossierFound');
                        const dossierContainer = document.querySelector('.dossier-container');
                        const sortParentTraite = document.getElementById(\"sortParentTraite\");
                        // Variable contenant les dossiers traites du service feu dans le local storage
                        let storedTraiteDossiers = localStorage.getItem(\"traiteSf\");

                        if (!storedTraiteDossiers || JSON.parse(storedTraiteDossiers).length === 0) {

                            fetchAndUpdateDossiers();
                        } else {
                            storedTraiteDossiers = JSON.parse(storedTraiteDossiers);

                            updateDossierDisplay(storedTraiteDossiers);
                        }

                        function fetchAndUpdateDossiers() {
                            fetch('/dossiers/findAllTraiteDossiers')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('traiteSf', JSON.stringify(data.dossiers));
                                    if(localStorage.getItem('traiteSf') == \"[]\")
                                    {
                                        updateDossierDisplay(data.dossiers)
                                    }
                                    
                                })
                                .catch(error => console.error('Error:', error));
                        }

                         function updateDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const dossierContainer = document.querySelector('.list-dossiers'); 
                        
                            if (!dossierContainer) {
                                console.error('dossierContainer is not found');
                                return;
                            }

                            if (dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                                });

                                const bgColorClass = 'bg-'+ couleur; // Utilisation de la couleur pour définir la classe bgColorClass
                                dossierElements.forEach(dossierElement => {
                                    const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                    let hasBgVert = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));
                                    
                                    if (hasBgVert) {
                                        dossierElement.style = 'display: flex!important;'; // Affiche l'élément si l'un des span a la classe bg-orange
                                    } else {
                                        dossierElement.style = 'display: none!important;'; // Masque l'élément si aucun span n'a la classe bg-orange
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none!important;\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });
                                if (noFile) {
                                    noFile.style = 'display: none!important;'; 
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-all-dossiers') {
                        const noFile = document.querySelector('.noFile');
                        const fetchAndUpdateAllDossiers = () => {
                            if(noFile){
                                noFile.style = \"display: none !important;\";

                            }
                            fetch('/dossiers/findAllDossiers')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('allDossiers', JSON.stringify(data.dossiers));

                                    updateAllDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        const storedAllDossiers = localStorage.getItem('allDossiers');
                        if (storedAllDossiers) {
                            const dossiers = JSON.parse(storedAllDossiers);
                            updateAllDossierDisplay(dossiers);
                        } else {
                            fetchAndUpdateAllDossiers();
                        }
                    }

                    else if (button.id === 'btn-dossier-en-cours') {
                        let storedEnCoursDeTraitementDossiersVRP = localStorage.getItem('enCoursDeTraitementSf');

                        if (!storedEnCoursDeTraitementDossiersVRP || JSON.parse(storedEnCoursDeTraitementDossiersVRP).length === 0) {
                            
                            fetchAndUpdateEnCoursDeTraitement();
                        } else {
                            
                            storedEnCoursDeTraitementDossiersVRP = JSON.parse(storedEnCoursDeTraitementDossiersVRP);

                            updateDossierDisplay(storedEnCoursDeTraitementDossiersVRP);
                        }
                        function updateDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');

                            if (dossiers.dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                              
                                });

                                const bgColorClass = 'bg-' + couleur; // Utilisation de la couleur pour définir la classe bgColorClass
                                dossierElements.forEach(dossierElement => {
                                    const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                    let hasBgOrange = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));
                                  
                                    if (hasBgOrange) {
                                        dossierElement.style = 'display: flex!important;'; // Affiche l'élément si l'un des span a la classe bg-orange
                                    } else {
                                        dossierElement.style = 'display: none!important;'; // Masque l'élément si aucun span n'a la classe bg-orange
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none!important;\";
                                }
                            } else {                            
                             
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });
                                if (noFile) {
                                    noFile.style = 'display: none!important;'; 
                                }
                            }
                        }

                        function fetchAndUpdateEnCoursDeTraitement() {
                            fetch('/dossiers/findAllEnCoursDeTraitement')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('enCoursDeTraitementSf', JSON.stringify(data));

                                     if(localStorage.getItem('enCoursDeTraitementSf') == \"[]\")
                                    {
                                        //Si aucun dossier dans le local storage joue la methode updateDossierDisplay qui verifie et display none 
                                        updateDossierDisplay(data.dossiers)
                                    }
                                
                                })
                                .catch(error => console.error('Error:', error));
                        }

                      
                    }

                    else if (button.id === 'btn-dossier-non-traite') {      
            
                        const fetchAndUpdateNonTraiteDossiers = () => {
                            fetch('/dossiers/findAllNonTraite')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('nonTraiteDossiers', JSON.stringify(data.dossiers));      
                                    updateNonTraiteDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        let storedNonTraiteDossiers = localStorage.getItem('nonTraiteDossiers');

                        if (!storedNonTraiteDossiers || JSON.parse(storedNonTraiteDossiers).length === 0) {

                            fetchAndUpdateNonTraiteDossiers();
                        } else {
                            storedNonTraiteDossiers = JSON.parse(storedNonTraiteDossiers);

                            updateNonTraiteDossierDisplay(storedNonTraiteDossiers);
                        }

                        function updateNonTraiteDossierDisplay(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossiers.length > 0 && dossiers[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossiers[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = '';

                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none !important;\";
                                }
                            } else {                            
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }
                    }
                });
            });
        }else{
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    if (button.id === 'btn-dossier-traite') {
                        let storedTraiteDossiers = localStorage.getItem('traiteVrp');

                        if (!storedTraiteDossiers || JSON.parse(storedTraiteDossiers).length === 0) {
                            fetchAndUpdateDossiers();
                        } else {
                            fetchAndUpdateDossiers();

                            storedTraiteDossiers = JSON.parse(storedTraiteDossiers);
                            updateDossierDisplay(storedTraiteDossiers);
                        }

                        function fetchAndUpdateDossiers() {
                            fetch('/dossiers/findAllTraiteDossiersVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('traiteVrp', JSON.stringify(data.dossiers));
                                    localStorage.removeItem(\"traiteVrp\");

                                    updateDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        }

                        function updateDossierDisplay(dossiers) {
                            const dossierContainer = document.querySelector('.dossier-container');
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('.no-file'); // Ensure noFile is defined

                            if (dossiers.length > 0) {
                                let couleur; // Déclaration de la variable couleur en dehors de la boucle forEach
                                dossiers.forEach((dossier) => {
                                    couleur = dossier.statut.couleur; // Stockage de la couleur pour chaque dossier
                                });

                                const bgColorClass = 'bg-' + couleur; // Utilisation de la couleur pour définir la classe bgColorClass

                                if (dossierElements){
                                    dossierElements.forEach(dossierElement => {
                                        const spanElements = Array.from(dossierElement.querySelectorAll('.spanDate'));
                                        let hasBgColorClass = spanElements.some(spanElement => spanElement.classList.contains(bgColorClass));

                                        if (hasBgColorClass) {
                                            dossierElement.style= 'display: flex !important'; // Affiche l'élément si l'un des span a la classe bgColorClass
                                        } else {
                                            dossierElement.style= 'display: none !important'; // Masque l'élément si aucun span n'a la classe bgColorClass
                                        }
                                    });
                                }

                                if (noFile) {
                                    noFile.style.display = \"none\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none!important;\"; // Masque l'élément si aucun dossier n'est présent
                                });

                                if (noFile) {
                                    noFile.style.display = \"flex\";
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-all-dossiers') {
                        const fetchAndUpdateAllDossiers = () => {
                            if(noFile){
                                noFile.style = \"display: none !important;\";

                            }
                          
                            fetch('/dossiers/findAllDossiersVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('allDossiers', JSON.stringify(data.dossiers));
                                    updateAllDossierDisplay(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        const storedAllDossiers = localStorage.getItem('allDossiers');

                        if (storedAllDossiers) {
                            const dossiers = JSON.parse(storedAllDossiers);
                     
                            updateAllDossierDisplay(dossiers);
                        } else {
                            
                            fetchAndUpdateAllDossiers();
                        }
                    }

                    else if (button.id === 'btn-dossier-en-cours') {

                       let storedEnCoursDeTraitementDossiersVRP = localStorage.getItem('enCoursDeTraitementVrp');
                        if (!storedEnCoursDeTraitementDossiersVRP || JSON.parse(storedEnCoursDeTraitementDossiersVRP).dossiers.length === 0) {

                            fetchAndUpdateEnCoursDeTraitementVrp();
                        }else{
                            storedEnCoursDeTraitementDossiersVRP = JSON.parse(storedEnCoursDeTraitementDossiersVRP);
                            updateDossierDisplayVrp(storedEnCoursDeTraitementDossiersVRP);
                        }

                        function fetchAndUpdateEnCoursDeTraitementVrp() {
                            fetch('/dossiers/findAllEnCoursDeTraitementVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('enCoursDeTraitementVrp', JSON.stringify(data));
                                    updateDossierDisplayVrp(data);

                                })
                                .catch(error => console.error('Error:', error));
                        }
                        function updateDossierDisplayVrp(dossiers) {
                                 
                            const dossierUpdateArray = dossiers.dossiers;

                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossierUpdateArray.length > 0 && dossierUpdateArray[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossierUpdateArray[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = ''; 
                                    const parentElement = dossierElement.parentNode;
                                    if (!parentElement.classList.contains('dossier-traite')) {
                                        parentElement.style = 'display:flex !important';
                                    } else {
                                        parentElement.style = 'display:none !important';
                                    }
                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                        const dossierItemsUpdate = document.querySelectorAll(`.list-dossiers .dossier-item span.\${bgColorClass}`);
                                        
                                        // Met à jour le texte de l'élément avec l'ID number-NonTraite
                                        const spanNumberUpdate = document.querySelector(\"#number-EnCours\").innerText = dossierItemsUpdate.length; 
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"displauy: none !important;\";
                                }
                            } else {
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }
                    }

                    else if (button.id === 'btn-dossier-non-traite') {  
                      
                        const fetchAndUpdateNonTraiteDossiers = () => {
                            fetch('/dossiers/findAllNonTraiteVrp')
                                .then(response => response.json())
                                .then(data => {
                                    localStorage.setItem('nonTraiteDossiersVrp', JSON.stringify(data.dossiers));
                                    updateNonTraiteDossierDisplayVRP(data.dossiers);
                                })
                                .catch(error => console.error('Error:', error));
                        };

                        let storedNonTraiteDossiers = localStorage.getItem('nonTraiteDossiersVrp');
                        localStorage.removeItem('nonTraiteDossiersVrp');

                        if (!storedNonTraiteDossiers || JSON.parse(storedNonTraiteDossiers).length === 0) {

                            fetchAndUpdateNonTraiteDossiers();
                        } else {
                            storedNonTraiteDossiers = JSON.parse(storedNonTraiteDossiers);

                            updateNonTraiteDossierDisplayVRP(storedNonTraiteDossiers);
                        }

                        function updateNonTraiteDossierDisplayVRP(dossiers) {
                            const dossierElements = document.querySelectorAll('.dossier-item');
                            const noFile = document.querySelector('#noDossierFound'); 

                            if (dossiers.length > 0 && dossiers[0].statut.couleur) {
                                const bgColorClass = \"bg-\" + dossiers[0].statut.couleur;
                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = ''; 
                                    const parentElement = dossierElement.parentNode;

                                    const spanElement = dossierElement.children[1];
                                    if (spanElement.classList.contains(bgColorClass))  {
                                        dossierElement.style = 'display: flex !important';
                                        const dossierItemsNonTraite = document.querySelectorAll(`.list-dossiers .dossier-item span.\${bgColorClass}`);
                                        // Met à jour le texte de l'élément avec l'ID number-NonTraite
                                        const spanNumberNonTraite = document.querySelector(\"#number-NonTraite\").innerText = dossierItemsNonTraite.length; 
                                    } else {
                                        // Si la couleur n'est pas rouge, masquer l'élément
                                        dossierElement.style = 'display: none !important';
                                    }
                                });
                                if (noFile) {
                                    noFile.style = \"display: none !important;\";
                                }
                            } else {


                                dossierElements.forEach(dossierElement => {
                                    dossierElement.style = \"display: none !important\";
                                });
                                if (noFile) {
                                    noFile.style.display = \"flex !important\";
                                }
                            }
                        }

                    }
                });
            });
        }

        function handleSortClick(order) {
            sortDossiers(order);
            const oppositeOrder = order === 'asc' ? 'desc' : 'asc';
            document.getElementById(order).classList.add(\"active\");
            document.getElementById(oppositeOrder).classList.remove(\"active\");
        }

        function fetchAndUpdateDossiers() {
            fetch('/dossiers/findAllTraiteDossiersVrp?sortOrder=' + sortOrder)
                .then(response => response.json())
                .then(data => {
                    updateDossierDisplayTraite(data.dossiers);
                    localStorage.setItem('dossiersTraites', JSON.stringify(data.dossiers));
                })
                .catch(error => console.error('Error:', error));
        }

        function updateDossierDisplayTraite(dossiers) {
            const noFile = document.querySelector('#noDossierFound');
            if (dossiers.length > 0) {
                if (noFile) {
                    noFile.style = \"displauy: none !important;\";
                }
                dossiers.forEach(dossier => displayDossier(dossier));
            } else {
                if (noFile) {
                    noFile.style.display = \"flex !important\";
                }
            }
        }

        function displayDossier(dossier) {
            const idDossier = dossier.id;
            if (!document.getElementById('dossier-' + idDossier)) {
                const dossierItem = createDossierItem(dossier);
                dossierContainer.appendChild(dossierItem);
            }
        }

        function createDossierItem(dossier) {
            const bgColorClass = \"bg-\" + dossier.statut.couleur.toLowerCase();
            const dossierItem = document.createElement('ul');
            dossierItem.classList.add('list-group', 'list-dossiers', 'w-90', 'list-group-flush', 'dossier-traite');
            dossierItem.setAttribute('id', 'dossier-' + dossier.id);
            const editLink = \"/dossiers/\" + dossier.id + \"/edit\";
            dossierItem.innerHTML = `
                <a href=\"\${editLink}\" data-turbo-prefetch=\"true\" data-turbo-stream=\"\" class=\"mt-3 mb-3 card dossier-item d-flex flex-row w-100 justify-content-between text-white\" style=\"text-decoration: none; border: 1px solid white; padding: 0.5rem 0 0.5rem 0.1rem;\">
                    <div style=\"margin: 0.4rem;\">
                        <p><i class=\"fas fa-folder\"></i> Nom du dossier : \${dossier.nom} &nbsp; <i class=\"far fa-calendar-alt\"></i> Date de tir : \${dossier.dateTir ? dossier.dateTir : ''}</p>
                        <p><i class=\"fas fa-fire\"></i> Type de feu : \${dossier.typeFeu}</p>
                    </div>
                    <span class=\"d-flex justify-content-center align-items-center text-center \${bgColorClass} spanDate\">
                        <p class=\"mb-0\"> Date de création : <span class=\"dateCreation\">\${dossier.dateCreation ? dossier.dateCreation : ''}</span></p>
                    </span>
                </a>
            `;
            return dossierItem;
        }

        function compareDates(date1, date2, order) {
            const [day1, month1, year1, hour1, minute1, second1] = date1.split(/[\\/\\s:]+/).map(Number);
            const [day2, month2, year2, hour2, minute2, second2] = date2.split(/[\\/\\s:]+/).map(Number);

            const dateObj1 = new Date(year1, month1 - 1, day1, hour1, minute1, second1);
            const dateObj2 = new Date(year2, month2 - 1, day2, hour2, minute2, second2);

            if (order === 'asc') {
                return dateObj1 - dateObj2;
            } else {
                return dateObj2 - dateObj1;
            }
        }

        function updateAllDossierDisplay(dossiers) {
            if (dossiers.length > 0) {
    
                let dossierContainer = document.querySelector(\".dossier-container\");
                if (!dossierContainer) {
                    let divSearch = document.querySelector(\".divSearch\");
                    divSearch.insertAdjacentHTML(\"afterend\", \"<div class='mt-3 row w-85 dossier-container justify-content-center'></div>\");
                }
            }

            const dossierElements = document.querySelectorAll('.dossier-item');
            dossierElements.forEach(dossierElement => {
                dossierElement.style = ''; 
                dossierElement.parentElement.style = ''; 

                const contentVrp = document.querySelector('.content-vrp') || document.querySelector('.content-sf');
                const pElements = contentVrp.querySelectorAll('#noDossierFound');

                pElements.forEach(pElement => {
                    pElement.parentNode.removeChild(pElement);
                });
                
                

                const parentElement = dossierElement.parentNode;
                if (!parentElement.classList.contains('dossier-traite')) {
                    parentElement.style.display = 'flex !important';
                } else {
                    parentElement.style.display = 'none !important';
                }

                if (dossierElement.style === 'display: flex !important;') {
                    dossierElement.style = 'display: none !important';
                } else if (dossierElement.style === 'display: none !important;') {
                    dossierElement.style = 'display: none !important';
                }
            });
        }
       
    });

    // Appel de la fonction principale après le chargement du DOM
    main();
</script>

", "Component/options.html.twig", "/var/www/html/PyroConnect/templates/Component/options.html.twig");
    }
}
