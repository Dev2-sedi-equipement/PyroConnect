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

/* Component/navbar/Desktop/navbar.html.twig */
class __TwigTemplate_f1d116c9ab7fd69cee79e4468602960d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/navbar/Desktop/navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/navbar/Desktop/navbar.html.twig"));

        // line 1
        yield "<!-- Desktop Navigation -->
";
        // line 2
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 7
        yield "
";
        // line 8
        if (array_key_exists("user", $context)) {
            // line 9
            yield "
  <nav class=\"navbar navbar-dark bg-dark d-none d-md-flex p-0 w-100 position-fixed \" style=\"z-index:1;top: 0;overflow: hidden;\" >
    <div class=\"col-4 d-flex flex-row align-items-center ps-3 nav-style\" style=\"height: 100px;\">
      <button style=\"display: flex; background: #212529;border: 0px;\"class=\"align-items-end\" id=\"navRightOnClick\"type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasWithBothOptions\" aria-controls=\"offcanvasWithBothOptions\" aria-label=\"Toggle navigation\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" height=\"65\" fill=\"currentColor\" class=\"bi bi-person text-white\" viewBox=\"0 0 16 16\"> 
          <path d=\"M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z\"/>
        </svg>
          ";
            // line 16
            if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 16, $this->source); })()) && CoreExtension::inFilter("SF", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 16, $this->source); })()), "roles", [], "any", false, false, false, 16)))) {
                // line 17
                yield "            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Service Feux </span>&ensp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "name", [], "any", false, false, false, 17), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 17, $this->source); })()), "lastname", [], "any", false, false, false, 17), "html", null, true);
                yield " </h4>
          ";
            } elseif ((            // line 18
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()) && CoreExtension::inFilter("VRP", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 18, $this->source); })()), "roles", [], "any", false, false, false, 18)))) {
                // line 19
                yield "            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\"class=\"badge text-bg-secondary text-white\">Vrp</span>&ensp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "name", [], "any", false, false, false, 19), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "lastname", [], "any", false, false, false, 19), "html", null, true);
                yield " </h4>

          ";
            } else {
                // line 22
                yield "            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Admin </span>&ensp;";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "name", [], "any", false, false, false, 22), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 22, $this->source); })()), "lastname", [], "any", false, false, false, 22), "html", null, true);
                yield " </h4>
          ";
            }
            // line 24
            yield "
      </button>

        <div class=\"offcanvas offcanvas-start bg-dark\" tabindex=\"-1\" id=\"offcanvasWithBothOptions\" aria-labelledby=\"offcanvasNavbarLabel\">
          <div class=\"p-3\">
            <div class=\"offcanvas-head-title d-flex\">
              <a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none\">
                  <svg class=\"bi pe-none me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
                  <span class=\"fs-4\">Mon Profil</span>
              </a>
              <button type=\"button\" class=\"btn-close btn-close-white text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
            </div>
            <hr>
          </div>

          <div class=\"offcanvas-body d-flex justify-content-between flex-column\">
            <ul class=\"nav flex-column\">
              <li class=\"nav-item linkNav\">
                ";
            // line 42
            if ((((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()) && "SF") || CoreExtension::inFilter("VRP", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 42, $this->source); })()), "roles", [], "any", false, false, false, 42)))) {
                // line 43
                yield "                  <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_index");
                yield "\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link active\" style=\"font-size: 18px;\" >Accueil</a>
                ";
            } else {
                // line 45
                yield "                  <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
                yield "\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link active\" style=\"font-size: 18px;\" >Partie Admin</a>
                ";
            }
            // line 47
            yield "              </li>
              <li class=\"nav-item linkNav\">
                  <a href=\"";
            // line 49
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nouveau");
            yield "\"data-turbo-prefetch=\"true\"  data-turbo=\"false\"class=\"nav-link\"style=\"font-size: 18px;\" >Créer un Dossier</a>
              </li>
              <li class=\"nav-item linkNav\" style=\"font-size: 18px;\"> 

                ";
            // line 53
            if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 53, $this->source); })()) && CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 53, $this->source); })()), "roles", [], "any", false, false, false, 53)))) {
                // line 54
                yield "                  <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
                yield "\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link \"style=\"font-size: 18px;\" >Partie Admin</a>
                ";
            } else {
                // line 56
                yield "                <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_gestion_profil");
                yield "\"data-turbo-prefetch=\"true\"  class=\"nav-link\"style=\"font-size: 18px;\" >Mon Profil</a>
                ";
            }
            // line 58
            yield "          
              </li> 
            </ul>
            <div>
              <hr>
              <a href=\"";
            // line 63
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" class=\"btn btn-primary w-100 text-center\" href=\"#\"style=\"font-size: 18px;\" >Se déconnecter</a>
            </div>
          </div>
        </div>
    </div>

    <div class=\"container-fluid col-4 d-flex justify-content-center\">
      ";
            // line 70
            if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 70, $this->source); })()) && CoreExtension::inFilter("VRP", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 70, $this->source); })()), "roles", [], "any", false, false, false, 70)))) {
                // line 71
                yield "        <a class=\"w-100 h-100 d-flex justify-content-center\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_vrp");
                yield "\">
          <img src=\"";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/Pyro_Connect-removebg-preview.png"), "html", null, true);
                yield "\" alt=\"PyroConnect Logo\" loading=\"lazy\" height=\"100\">
        </a>
      ";
            } else {
                // line 75
                yield "        <a class=\"w-100 h-100 d-flex justify-content-center\" href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_index");
                yield "\">
          <img src=\"";
                // line 76
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/Pyro_Connect-removebg-preview.png"), "html", null, true);
                yield "\" alt=\"PyroConnect Logo\" loading=\"lazy\" height=\"100\">
        </a>
      ";
            }
            // line 79
            yield "
    </div>

    <div style=\"height: 100px;\" class=\" btn col-4 d-flex flex-row align-items-center justify-content-end pe-3\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarToggleExternalContent\" aria-controls=\"navbarToggleExternalContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <button class=\"btn d-flex\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample\" aria-controls=\"offcanvasExample\">
        <svg id=\"toggleMenu\" xmlns=\"http://www.w3.org/2000/svg\" height=\"50\" fill=\"currentColor\" class=\"bi bi-bell ";
            // line 84
            if ((array_key_exists("notificationsLength", $context) && ((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 84, $this->source); })()) > 0))) {
                yield "text-danger";
            } else {
                yield "text-light";
            }
            yield " \" viewBox=\"0 0 16 16\">
          <path d=\"M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6\"/>
        </svg>
        <p id=\"numberNotif\" class=\"text-danger mb-0 ";
            // line 87
            if ((array_key_exists("notificationsLength", $context) && ((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 87, $this->source); })()) > 0))) {
                yield "text-danger";
            } else {
                yield "text-light";
            }
            yield "\" style=\"margin: 2rem 0 0 0 !important;\">";
            (((array_key_exists("notificationsLength", $context) &&  !(null === (isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 87, $this->source); })())))) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 87, $this->source); })()), "html", null, true)) : (yield ""));
            yield "</p>

      </button>
    </div>

    <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasExample\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header \">
          <h5 class=\"offcanvas-title\" id=\"offcanvasExampleLabel\">Mes Notifications </h5>
          <button type=\"button\" class=\"btn-close text-reset bg-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\">
          </button>
      </div>

      <div class=\"offcanvas-body gap-2\" id=\"notificationContainer\" >
        <div class=\"d-flex mb-2 gap-3\" style=\"max-width: 359px;\">
          <button id=\"btnRecentes\"class=\"glow-on-active bg-white w-100\">Récentes <i class=\"bi bi-sort-down\"></i></button>
          <button id =\"btnAnciennes\"class=\"glow-on-active  bg-white w-100\">Anciennes <i class=\"bi bi-sort-up\"></i></button>
        </div>
        <div class=\"notification-buttons parent-grid\">
       
          <input type=\"radio\" id=\"toutesNotif\" name=\"notification-type\" class=\"d-none\" value=\"toutesNotif\"   />
          <label for=\"toutesNotif\" class=\"btn bg-ttes btn-sm filter-notification m-1 btnToutesNotifs text-white active\" onclick=\"checkRadio('toutesNotif')\"><p>Toutes</p></label>

          <input type=\"radio\" id=\"creation\" name=\"notification-type\" class=\"d-none\" value=\"creation\" />
          <label for=\"creation\" class=\"btn bg-creation btn-sm filter-notification m-1 text-white\" data-type=\"création\" onclick=\"checkRadio('creation')\"><p>Notifications de création </p></label>

          <input type=\"radio\" id=\"lecture\" name=\"notification-type\" class=\"d-none\" value=\"lecture\" />
          <label for=\"lecture\" class=\"btn bg-lecture btn-sm filter-notification m-1 text-white\" data-type=\"lecture\" onclick=\"checkRadio('lecture')\"><p>Notifications de lecture </p></label>

          <input type=\"radio\" id=\"modification\" name=\"notification-type\" class=\"d-none\" value=\"modification\" />
          <label for=\"modification\" class=\"btn bg-modif btn-sm filter-notification m-1 text-white\" data-type=\"modification\" onclick=\"checkRadio('modification')\"><p>Notifications de modification </p></label>

          <input type=\"radio\" id=\"archivage\" name=\"notification-type\" class=\"d-none\" value=\"archivage\" />
          <label for=\"archivage\" class=\"btn bg-archivage btn-sm filter-notification m-1 text-white\" data-type=\"archivé\" onclick=\"checkRadio('archivage')\"><p>Notifications d'archivage </p></label>

          <button type=\"button\" href=\"#\" class=\"btn bg-selectAll btn-sm d-none m-1 text-white d-flex justify-content-center align-items-center\" id=\"btnDeleteNotificationsSelected\" data-bs-toggle=\"modal\" data-bs-target=\"#lebest\" data-type=\"archivé\" ><p>Tous supprimer </p></button>
        </div>
     
        <div>  
          <button type=\"button\" class=\"btn btn-danger m-2 d-none\" id=\"btn-delete-all\">Supprimer les notifications sélectionnées</button>
          <!-- Modal pour le formulaire de suppression -->
          <div class=\"modal fade\" id=\"lebest\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered\">
              <div class=\"modal-content\">
                <div class=\"modal-header bg-danger\">
                    <h5 class=\"modal-title text-black\">Confirmer la suppression</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body text-black\">
                    <p>Êtes-vous sûr de vouloir supprimer les notifications sélectionnées ?</p>
                </div>
                <div class=\"modal-footer\" data-bs-spy=\"scroll\" data-bs-smooth-scroll=\"true\" style=\"overflow-y:scroll; max-height:400px\">
                  <!-- Formulaire de suppression -->
                  <button id=\"deleteNotificationsButton\" class=\"btn btn-danger\">Supprimer les notifications</button>
                  <!-- Bouton pour fermer le modal -->
                  <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"noNotif mt-5 ";
            // line 148
            if ((array_key_exists("notifications", $context) &&  !Twig\Extension\CoreExtension::testEmpty((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 148, $this->source); })())))) {
                yield "d-none";
            }
            yield "\">Vous avez actuellement aucune nouvelle notification.</div>
          <div class=\"notifContainer\">
            ";
            // line 150
            yield from             $this->loadTemplate("Component/notifications.html.twig", "Component/navbar/Desktop/navbar.html.twig", 150)->unwrap()->yield($context);
            // line 151
            yield "          </div>
        </div>
      </div>
    </div>
  </nav>
";
        }
        // line 157
        yield "

<style>

  /* Désactive le z-index de .modal-backdrop */
  .modal-backdrop {
    z-index: initial !important; /* Utilise la valeur par défaut */
  }

  
</style>

<script defer>


  document.querySelectorAll('.glow-on-active').forEach(button => {
      button.addEventListener('click', function() {
          // Retirer la classe 'active' de tous les boutons
          document.querySelectorAll('.glow-on-active').forEach(btn => btn.classList.remove('active'));
          
          // Ajouter la classe 'active' au bouton cliqué
          this.classList.add('active');
          
          // Vérifier si #btnOptionsTri contient deux éléments <span>
          const btnOptionsTri = document.getElementById('btnOptionsTri');
          if(btnOptionsTri){
            const spans = btnOptionsTri.querySelectorAll('span');
            if (spans.length === 2) {
                btnOptionsTri.classList.add('active');
            } else {
                btnOptionsTri.classList.remove('active');
            }
          }
      });
  });


  // Récupérer les boutons pour trier les notifications par date de création
  const btnRecentes = document.querySelector('#btnRecentes');
  const btnAnciennes = document.querySelector('#btnAnciennes');
  const toutesNotif = document.querySelector('.bg-ttes');



  // Événements de clic pour les boutons
  btnRecentes.addEventListener('click', () => {
      const notifContainer = document.querySelector('.notifContainer');
      const children = notifContainer.children;
    // Sélectionne tous les labels avec la classe 'active' et leur enlève cette classe
    const activeLabels = document.querySelectorAll('label.active');
    activeLabels.forEach(label => {
        label.classList.remove('active');
        label.style=\"filter: brightness(50%);\";
    });

    toutesNotif.classList.add(\"active\");

      // Remove classes
      for (let i = 0; i < children.length; i++) {
          children[i].classList.remove(\"animate__animated\", \"animate__bounceInUp\");
          children[i].classList.add(\"d-none\");

      }

     // Add classes with delay
    for (let i = 0; i < children.length; i++) {
        (function(index) {
        children[i].classList.remove(\"d-none\");
            const delay = index === 0 ? 20 : 20 + 350 * index;
            setTimeout(function() {
                children[index].classList.add(\"animate__animated\", \"animate__bounceInUp\");
            }, delay);
        })(i);
    }

      if (triAscendant) {
          triAscendant = false;
          trierNotifications(triAscendant);
      }
  });


 btnAnciennes.addEventListener('click', () => {
    // Sélectionne tous les labels avec la classe 'active' et leur enlève cette classe
    const activeLabels = document.querySelectorAll('label.active');
    activeLabels.forEach(label => {
        label.classList.remove('active');
        label.style=\"filter: brightness(50%);\";
    });

    toutesNotif.classList.add(\"active\");



  const notifContainer = document.querySelector('.notifContainer');

  if (notifContainer) {
      const children = notifContainer.children;
        // Remove classes
      for (let i = 0; i < children.length; i++) {
          children[i].classList.remove(\"animate__animated\", \"animate__bounceInUp\");
          children[i].classList.add(\"d-none\");


      }
       // Add classes with delay
    for (let i = 0; i < children.length; i++) {
        (function(index) {
        children[i].classList.remove(\"d-none\");
            const delay = index === 0 ? 20 : 20 + 350 * index;
            setTimeout(function() {
                children[index].classList.add(\"animate__animated\", \"animate__bounceInUp\");
            }, delay);
        })(i);
    }
  }


  
  // Retire les classes d'animation après un court délai pour pouvoir les réappliquer


  if (!triAscendant) {
    triAscendant = true;
    trierNotifications(triAscendant);
  }
});




let triAscendant = true; // Variable globale pour garder une trace de l'état du tri

// Fonction pour convertir la date de notification en objet Date
function convertirDate(dateString) {
    const [datePart, timePart] = dateString.split(' ');
    const [day, month, year] = datePart.split('-');
    return new Date(`\${year}-\${month}-\${day}T\${timePart}`);
}

// Fonction pour trier les notifications
function trierNotifications(ascendant) {
    const notifContainer = document.querySelector('.notifContainer');
    const notifs = Array.from(notifContainer.children);

    
    // Trier les notifications
    notifs.sort((a, b) => {
        const dateA = convertirDate(a.querySelector('.dateCreationNotification').textContent);
        const dateB = convertirDate(b.querySelector('.dateCreationNotification').textContent);
        return ascendant ? dateA - dateB : dateB - dateA;
    });
    
    // Vider le conteneur de notifications
    while (notifContainer.firstChild) {
        notifContainer.removeChild(notifContainer.firstChild);
    }
  // Ajouter les notifications triées au conteneur
  notifs.forEach(notif => {
      notifContainer.appendChild(notif);
      
  });
}



















  ";
        // line 340
        yield "  const alignCheckboxDivs = document.querySelectorAll('.alignChekboxAndDiv');
  const alignCheckboxDivsCount = alignCheckboxDivs.length;
  const btnAllDelete = document.getElementById(\"deleteNotificationsButton\");
  const noNotif = document.querySelector('.noNotif');

  // Vérifier si le bouton a été trouvé
  if (btnAllDelete) {
    // Ajouter un gestionnaire d'événements click au bouton
    btnAllDelete.addEventListener(\"click\", function() {
      const btnTousSupprimer = document.getElementById(\"btnDeleteNotificationsSelected\");
      btnTousSupprimer.classList.add(\"d-none\");


      deleteAllNotifications();
    });
  }

  function checkRadio(id) {
    document.getElementById(id).checked = true;
  }

  // Fonction pour supprimer toutes les notifications de l'utilisateur
  function deleteAllNotifications() {
    fetch('/notification/deleteByUser')
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la suppression des notifications.');
        }
   
        // Sélectionner toutes les divs avec l'ID \"notification_108\" et la classe \"alignChekboxAndDiv\"
        const notifications = document.querySelectorAll('div[id^=\"notification_\"][class*=\"alignChekboxAndDiv\"]');

        // Supprimer chaque notification sélectionnée
        notifications.forEach(notification => {
          notification.remove();
          noNotif.classList.remove(\"d-none\");
        });

        // Fermer le modal
        const modal = document.querySelector('.modal.fade.show');
        if (modal) {
          modal.classList.remove(\"show\");
          const modalBackdrop = document.querySelector('.modal-backdrop');
          if (modalBackdrop) {
            modalBackdrop.remove();
          }
        }
        
        const numberNotif = document.getElementById(\"numberNotif\");
        const toggleMenu = document.getElementById(\"toggleMenu\");
        numberNotif.classList.add(\"text-light\");
        toggleMenu.classList.add(\"text-light\");
        numberNotif.classList.remove(\"text-danger\");
        toggleMenu.classList.remove(\"text-danger\");

        numberNotif.innerHTML = 0;

        return response.json();
      })
      .catch(error => {
        console.error('Erreur lors de la suppression des notifications :', error);
      });
  }

  // Vérifier si des notifications sont présentes dans la nouvelle page
  const notificationsExist = alignCheckboxDivsCount > 0;
  const toggleMenu = document.getElementById('toggleMenu');
  if (notificationsExist) {
    const btnAllDelete = document.getElementById(\"btnDeleteNotificationsSelected\");
    btnAllDelete.classList.remove(\"d-none\");
    btnAllDelete.classList.add(\"d-flex\");
  } else {
    toggleMenu.classList.remove(\"text-danger\");
    toggleMenu.classList.add(\"text-light\");
    numberNotif.classList.add(\"text-light\");
    numberNotif.classList.remove(\"text-danger\");
  }

  // Fonction pour fermer le modal
  function closeModal() {
    const modalBackdrops = document.querySelectorAll('.modal-backdrop');
    modalBackdrops.forEach(function(modalBackdrop) {
      modalBackdrop.classList.remove('show');
    });
  }

  async function deleteNotification(notificationId) {
    const form = document.querySelector(`#deleteForm\${notificationId}`);
    const formData = new FormData(form);
    const notif = form.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    const backdrop = document.querySelector(\".modal-backdrop\");
    const notifContainer = document.querySelector(\".notifContainer\");
    const noNotif = document.querySelector(\".noNotif\");
    const btnAllDelete = document.querySelector(\"#btnDeleteNotificationsSelected\");
    if (notifContainer.childElementCount === 0) {
      noNotif.classList.remove(\"d-none\");
      btnAllDelete.classList.add(\"d-none\");
    }
    notif.remove();
    backdrop.remove();
    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData
      });
      
      if (!response.ok) {
        throw new Error('Une erreur s\\'est produite lors de la suppression de la notification.');
      }
      // Recalculer le nombre de notifications après suppression
      const alignCheckboxDivs = document.querySelectorAll('.alignChekboxAndDiv');
      const alignCheckboxDivsCount = alignCheckboxDivs.length;
      numberNotif.innerHTML = alignCheckboxDivsCount;
      // Vérifier si des notifications sont présentes dans la nouvelle page
      const notificationsExist = alignCheckboxDivsCount > 0;
      // Gérer l'affichage du message \"Pas de notifications\" et du bouton de suppression globale
      const noNotif = document.querySelector('.noNotif');
      const btnAllDelete = document.getElementById(\"btnDeleteNotificationsSelected\");
      if (notificationsExist) {
        noNotif.classList.add(\"d-none\");
        if (btnAllDelete !== null) {
          btnAllDelete.classList.remove(\"d-none\");
          btnAllDelete.classList.add(\"d-flex\");
        }
      } else {
        noNotif.classList.remove(\"d-none\");
        toggleMenu.classList.remove(\"text-danger\");
        toggleMenu.classList.add(\"text-light\");
        numberNotif.classList.add(\"text-light\");
        numberNotif.classList.remove(\"text-danger\");
        btnAllDelete.classList.add(\"d-none\");
        btnAllDelete.classList.remove(\"d-flex\");
      }

    } catch (error) {
      console.error('Erreur lors de la suppression de la notification:', error);
    }
  }
  // Fonction pour réinitialiser le formulaire à chaque ouverture du modal

</script>


";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    // line 2
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 3
        yield "
  ";
        // line 4
        yield $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("navbarJs");
        yield "

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "Component/navbar/Desktop/navbar.html.twig";
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
        return array (  647 => 4,  644 => 3,  634 => 2,  480 => 340,  296 => 157,  288 => 151,  286 => 150,  279 => 148,  209 => 87,  199 => 84,  192 => 79,  186 => 76,  181 => 75,  175 => 72,  170 => 71,  168 => 70,  158 => 63,  151 => 58,  145 => 56,  139 => 54,  137 => 53,  130 => 49,  126 => 47,  120 => 45,  114 => 43,  112 => 42,  92 => 24,  84 => 22,  75 => 19,  73 => 18,  66 => 17,  64 => 16,  55 => 9,  53 => 8,  50 => 7,  48 => 2,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Desktop Navigation -->
{% block javascripts %}

  {{ encore_entry_script_tags('navbarJs') }}

{% endblock %}

{% if user is defined %}

  <nav class=\"navbar navbar-dark bg-dark d-none d-md-flex p-0 w-100 position-fixed \" style=\"z-index:1;top: 0;overflow: hidden;\" >
    <div class=\"col-4 d-flex flex-row align-items-center ps-3 nav-style\" style=\"height: 100px;\">
      <button style=\"display: flex; background: #212529;border: 0px;\"class=\"align-items-end\" id=\"navRightOnClick\"type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasWithBothOptions\" aria-controls=\"offcanvasWithBothOptions\" aria-label=\"Toggle navigation\">
        <svg xmlns=\"http://www.w3.org/2000/svg\" height=\"65\" fill=\"currentColor\" class=\"bi bi-person text-white\" viewBox=\"0 0 16 16\"> 
          <path d=\"M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z\"/>
        </svg>
          {% if user and 'SF' in user.roles %}
            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Service Feux </span>&ensp;{{user.name}} {{user.lastname}} </h4>
          {% elseif user and 'VRP' in user.roles  %}
            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\"class=\"badge text-bg-secondary text-white\">Vrp</span>&ensp;{{user.name}} {{user.lastname}} </h4>

          {% else %}
            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Admin </span>&ensp;{{user.name}} {{user.lastname}} </h4>
          {% endif %}

      </button>

        <div class=\"offcanvas offcanvas-start bg-dark\" tabindex=\"-1\" id=\"offcanvasWithBothOptions\" aria-labelledby=\"offcanvasNavbarLabel\">
          <div class=\"p-3\">
            <div class=\"offcanvas-head-title d-flex\">
              <a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none\">
                  <svg class=\"bi pe-none me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
                  <span class=\"fs-4\">Mon Profil</span>
              </a>
              <button type=\"button\" class=\"btn-close btn-close-white text-reset\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
            </div>
            <hr>
          </div>

          <div class=\"offcanvas-body d-flex justify-content-between flex-column\">
            <ul class=\"nav flex-column\">
              <li class=\"nav-item linkNav\">
                {% if user and 'SF' or 'VRP' in user.roles %}
                  <a href=\"{{ path('app_index') }}\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link active\" style=\"font-size: 18px;\" >Accueil</a>
                {% else %}
                  <a href=\"{{ path('app_admin') }}\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link active\" style=\"font-size: 18px;\" >Partie Admin</a>
                {% endif %}
              </li>
              <li class=\"nav-item linkNav\">
                  <a href=\"{{ path('app_nouveau') }}\"data-turbo-prefetch=\"true\"  data-turbo=\"false\"class=\"nav-link\"style=\"font-size: 18px;\" >Créer un Dossier</a>
              </li>
              <li class=\"nav-item linkNav\" style=\"font-size: 18px;\"> 

                {% if user and 'ROLE_ADMIN'  in user.roles %}
                  <a href=\"{{ path('app_admin') }}\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link \"style=\"font-size: 18px;\" >Partie Admin</a>
                {% else %}
                <a href=\"{{ path('app_gestion_profil') }}\"data-turbo-prefetch=\"true\"  class=\"nav-link\"style=\"font-size: 18px;\" >Mon Profil</a>
                {% endif %}
          
              </li> 
            </ul>
            <div>
              <hr>
              <a href=\"{{ path('app_logout') }}\" class=\"btn btn-primary w-100 text-center\" href=\"#\"style=\"font-size: 18px;\" >Se déconnecter</a>
            </div>
          </div>
        </div>
    </div>

    <div class=\"container-fluid col-4 d-flex justify-content-center\">
      {% if user and 'VRP' in user.roles %}
        <a class=\"w-100 h-100 d-flex justify-content-center\" href=\"{{ path('app_vrp') }}\">
          <img src=\"{{ asset('build/images/Pyro_Connect-removebg-preview.png') }}\" alt=\"PyroConnect Logo\" loading=\"lazy\" height=\"100\">
        </a>
      {% else %}
        <a class=\"w-100 h-100 d-flex justify-content-center\" href=\"{{ path('app_index') }}\">
          <img src=\"{{ asset('build/images/Pyro_Connect-removebg-preview.png') }}\" alt=\"PyroConnect Logo\" loading=\"lazy\" height=\"100\">
        </a>
      {% endif %}

    </div>

    <div style=\"height: 100px;\" class=\" btn col-4 d-flex flex-row align-items-center justify-content-end pe-3\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarToggleExternalContent\" aria-controls=\"navbarToggleExternalContent\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
      <button class=\"btn d-flex\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample\" aria-controls=\"offcanvasExample\">
        <svg id=\"toggleMenu\" xmlns=\"http://www.w3.org/2000/svg\" height=\"50\" fill=\"currentColor\" class=\"bi bi-bell {% if notificationsLength is defined and notificationsLength > 0 %}text-danger{% else %}text-light{% endif %} \" viewBox=\"0 0 16 16\">
          <path d=\"M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6\"/>
        </svg>
        <p id=\"numberNotif\" class=\"text-danger mb-0 {% if notificationsLength is defined and notificationsLength > 0 %}text-danger{% else %}text-light{% endif %}\" style=\"margin: 2rem 0 0 0 !important;\">{{ notificationsLength ?? '' }}</p>

      </button>
    </div>

    <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasExample\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header \">
          <h5 class=\"offcanvas-title\" id=\"offcanvasExampleLabel\">Mes Notifications </h5>
          <button type=\"button\" class=\"btn-close text-reset bg-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\">
          </button>
      </div>

      <div class=\"offcanvas-body gap-2\" id=\"notificationContainer\" >
        <div class=\"d-flex mb-2 gap-3\" style=\"max-width: 359px;\">
          <button id=\"btnRecentes\"class=\"glow-on-active bg-white w-100\">Récentes <i class=\"bi bi-sort-down\"></i></button>
          <button id =\"btnAnciennes\"class=\"glow-on-active  bg-white w-100\">Anciennes <i class=\"bi bi-sort-up\"></i></button>
        </div>
        <div class=\"notification-buttons parent-grid\">
       
          <input type=\"radio\" id=\"toutesNotif\" name=\"notification-type\" class=\"d-none\" value=\"toutesNotif\"   />
          <label for=\"toutesNotif\" class=\"btn bg-ttes btn-sm filter-notification m-1 btnToutesNotifs text-white active\" onclick=\"checkRadio('toutesNotif')\"><p>Toutes</p></label>

          <input type=\"radio\" id=\"creation\" name=\"notification-type\" class=\"d-none\" value=\"creation\" />
          <label for=\"creation\" class=\"btn bg-creation btn-sm filter-notification m-1 text-white\" data-type=\"création\" onclick=\"checkRadio('creation')\"><p>Notifications de création </p></label>

          <input type=\"radio\" id=\"lecture\" name=\"notification-type\" class=\"d-none\" value=\"lecture\" />
          <label for=\"lecture\" class=\"btn bg-lecture btn-sm filter-notification m-1 text-white\" data-type=\"lecture\" onclick=\"checkRadio('lecture')\"><p>Notifications de lecture </p></label>

          <input type=\"radio\" id=\"modification\" name=\"notification-type\" class=\"d-none\" value=\"modification\" />
          <label for=\"modification\" class=\"btn bg-modif btn-sm filter-notification m-1 text-white\" data-type=\"modification\" onclick=\"checkRadio('modification')\"><p>Notifications de modification </p></label>

          <input type=\"radio\" id=\"archivage\" name=\"notification-type\" class=\"d-none\" value=\"archivage\" />
          <label for=\"archivage\" class=\"btn bg-archivage btn-sm filter-notification m-1 text-white\" data-type=\"archivé\" onclick=\"checkRadio('archivage')\"><p>Notifications d'archivage </p></label>

          <button type=\"button\" href=\"#\" class=\"btn bg-selectAll btn-sm d-none m-1 text-white d-flex justify-content-center align-items-center\" id=\"btnDeleteNotificationsSelected\" data-bs-toggle=\"modal\" data-bs-target=\"#lebest\" data-type=\"archivé\" ><p>Tous supprimer </p></button>
        </div>
     
        <div>  
          <button type=\"button\" class=\"btn btn-danger m-2 d-none\" id=\"btn-delete-all\">Supprimer les notifications sélectionnées</button>
          <!-- Modal pour le formulaire de suppression -->
          <div class=\"modal fade\" id=\"lebest\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\">
            <div class=\"modal-dialog modal-dialog-centered\">
              <div class=\"modal-content\">
                <div class=\"modal-header bg-danger\">
                    <h5 class=\"modal-title text-black\">Confirmer la suppression</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body text-black\">
                    <p>Êtes-vous sûr de vouloir supprimer les notifications sélectionnées ?</p>
                </div>
                <div class=\"modal-footer\" data-bs-spy=\"scroll\" data-bs-smooth-scroll=\"true\" style=\"overflow-y:scroll; max-height:400px\">
                  <!-- Formulaire de suppression -->
                  <button id=\"deleteNotificationsButton\" class=\"btn btn-danger\">Supprimer les notifications</button>
                  <!-- Bouton pour fermer le modal -->
                  <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Annuler</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class=\"noNotif mt-5 {% if notifications is defined and notifications is not empty %}d-none{% endif %}\">Vous avez actuellement aucune nouvelle notification.</div>
          <div class=\"notifContainer\">
            {% include 'Component/notifications.html.twig' %}
          </div>
        </div>
      </div>
    </div>
  </nav>
{% endif %}


<style>

  /* Désactive le z-index de .modal-backdrop */
  .modal-backdrop {
    z-index: initial !important; /* Utilise la valeur par défaut */
  }

  
</style>

<script defer>


  document.querySelectorAll('.glow-on-active').forEach(button => {
      button.addEventListener('click', function() {
          // Retirer la classe 'active' de tous les boutons
          document.querySelectorAll('.glow-on-active').forEach(btn => btn.classList.remove('active'));
          
          // Ajouter la classe 'active' au bouton cliqué
          this.classList.add('active');
          
          // Vérifier si #btnOptionsTri contient deux éléments <span>
          const btnOptionsTri = document.getElementById('btnOptionsTri');
          if(btnOptionsTri){
            const spans = btnOptionsTri.querySelectorAll('span');
            if (spans.length === 2) {
                btnOptionsTri.classList.add('active');
            } else {
                btnOptionsTri.classList.remove('active');
            }
          }
      });
  });


  // Récupérer les boutons pour trier les notifications par date de création
  const btnRecentes = document.querySelector('#btnRecentes');
  const btnAnciennes = document.querySelector('#btnAnciennes');
  const toutesNotif = document.querySelector('.bg-ttes');



  // Événements de clic pour les boutons
  btnRecentes.addEventListener('click', () => {
      const notifContainer = document.querySelector('.notifContainer');
      const children = notifContainer.children;
    // Sélectionne tous les labels avec la classe 'active' et leur enlève cette classe
    const activeLabels = document.querySelectorAll('label.active');
    activeLabels.forEach(label => {
        label.classList.remove('active');
        label.style=\"filter: brightness(50%);\";
    });

    toutesNotif.classList.add(\"active\");

      // Remove classes
      for (let i = 0; i < children.length; i++) {
          children[i].classList.remove(\"animate__animated\", \"animate__bounceInUp\");
          children[i].classList.add(\"d-none\");

      }

     // Add classes with delay
    for (let i = 0; i < children.length; i++) {
        (function(index) {
        children[i].classList.remove(\"d-none\");
            const delay = index === 0 ? 20 : 20 + 350 * index;
            setTimeout(function() {
                children[index].classList.add(\"animate__animated\", \"animate__bounceInUp\");
            }, delay);
        })(i);
    }

      if (triAscendant) {
          triAscendant = false;
          trierNotifications(triAscendant);
      }
  });


 btnAnciennes.addEventListener('click', () => {
    // Sélectionne tous les labels avec la classe 'active' et leur enlève cette classe
    const activeLabels = document.querySelectorAll('label.active');
    activeLabels.forEach(label => {
        label.classList.remove('active');
        label.style=\"filter: brightness(50%);\";
    });

    toutesNotif.classList.add(\"active\");



  const notifContainer = document.querySelector('.notifContainer');

  if (notifContainer) {
      const children = notifContainer.children;
        // Remove classes
      for (let i = 0; i < children.length; i++) {
          children[i].classList.remove(\"animate__animated\", \"animate__bounceInUp\");
          children[i].classList.add(\"d-none\");


      }
       // Add classes with delay
    for (let i = 0; i < children.length; i++) {
        (function(index) {
        children[i].classList.remove(\"d-none\");
            const delay = index === 0 ? 20 : 20 + 350 * index;
            setTimeout(function() {
                children[index].classList.add(\"animate__animated\", \"animate__bounceInUp\");
            }, delay);
        })(i);
    }
  }


  
  // Retire les classes d'animation après un court délai pour pouvoir les réappliquer


  if (!triAscendant) {
    triAscendant = true;
    trierNotifications(triAscendant);
  }
});




let triAscendant = true; // Variable globale pour garder une trace de l'état du tri

// Fonction pour convertir la date de notification en objet Date
function convertirDate(dateString) {
    const [datePart, timePart] = dateString.split(' ');
    const [day, month, year] = datePart.split('-');
    return new Date(`\${year}-\${month}-\${day}T\${timePart}`);
}

// Fonction pour trier les notifications
function trierNotifications(ascendant) {
    const notifContainer = document.querySelector('.notifContainer');
    const notifs = Array.from(notifContainer.children);

    
    // Trier les notifications
    notifs.sort((a, b) => {
        const dateA = convertirDate(a.querySelector('.dateCreationNotification').textContent);
        const dateB = convertirDate(b.querySelector('.dateCreationNotification').textContent);
        return ascendant ? dateA - dateB : dateB - dateA;
    });
    
    // Vider le conteneur de notifications
    while (notifContainer.firstChild) {
        notifContainer.removeChild(notifContainer.firstChild);
    }
  // Ajouter les notifications triées au conteneur
  notifs.forEach(notif => {
      notifContainer.appendChild(notif);
      
  });
}



















  {# Déclaration des variables #}
  const alignCheckboxDivs = document.querySelectorAll('.alignChekboxAndDiv');
  const alignCheckboxDivsCount = alignCheckboxDivs.length;
  const btnAllDelete = document.getElementById(\"deleteNotificationsButton\");
  const noNotif = document.querySelector('.noNotif');

  // Vérifier si le bouton a été trouvé
  if (btnAllDelete) {
    // Ajouter un gestionnaire d'événements click au bouton
    btnAllDelete.addEventListener(\"click\", function() {
      const btnTousSupprimer = document.getElementById(\"btnDeleteNotificationsSelected\");
      btnTousSupprimer.classList.add(\"d-none\");


      deleteAllNotifications();
    });
  }

  function checkRadio(id) {
    document.getElementById(id).checked = true;
  }

  // Fonction pour supprimer toutes les notifications de l'utilisateur
  function deleteAllNotifications() {
    fetch('/notification/deleteByUser')
      .then(response => {
        if (!response.ok) {
          throw new Error('Erreur lors de la suppression des notifications.');
        }
   
        // Sélectionner toutes les divs avec l'ID \"notification_108\" et la classe \"alignChekboxAndDiv\"
        const notifications = document.querySelectorAll('div[id^=\"notification_\"][class*=\"alignChekboxAndDiv\"]');

        // Supprimer chaque notification sélectionnée
        notifications.forEach(notification => {
          notification.remove();
          noNotif.classList.remove(\"d-none\");
        });

        // Fermer le modal
        const modal = document.querySelector('.modal.fade.show');
        if (modal) {
          modal.classList.remove(\"show\");
          const modalBackdrop = document.querySelector('.modal-backdrop');
          if (modalBackdrop) {
            modalBackdrop.remove();
          }
        }
        
        const numberNotif = document.getElementById(\"numberNotif\");
        const toggleMenu = document.getElementById(\"toggleMenu\");
        numberNotif.classList.add(\"text-light\");
        toggleMenu.classList.add(\"text-light\");
        numberNotif.classList.remove(\"text-danger\");
        toggleMenu.classList.remove(\"text-danger\");

        numberNotif.innerHTML = 0;

        return response.json();
      })
      .catch(error => {
        console.error('Erreur lors de la suppression des notifications :', error);
      });
  }

  // Vérifier si des notifications sont présentes dans la nouvelle page
  const notificationsExist = alignCheckboxDivsCount > 0;
  const toggleMenu = document.getElementById('toggleMenu');
  if (notificationsExist) {
    const btnAllDelete = document.getElementById(\"btnDeleteNotificationsSelected\");
    btnAllDelete.classList.remove(\"d-none\");
    btnAllDelete.classList.add(\"d-flex\");
  } else {
    toggleMenu.classList.remove(\"text-danger\");
    toggleMenu.classList.add(\"text-light\");
    numberNotif.classList.add(\"text-light\");
    numberNotif.classList.remove(\"text-danger\");
  }

  // Fonction pour fermer le modal
  function closeModal() {
    const modalBackdrops = document.querySelectorAll('.modal-backdrop');
    modalBackdrops.forEach(function(modalBackdrop) {
      modalBackdrop.classList.remove('show');
    });
  }

  async function deleteNotification(notificationId) {
    const form = document.querySelector(`#deleteForm\${notificationId}`);
    const formData = new FormData(form);
    const notif = form.parentElement.parentElement.parentElement.parentElement.parentElement.parentElement;
    const backdrop = document.querySelector(\".modal-backdrop\");
    const notifContainer = document.querySelector(\".notifContainer\");
    const noNotif = document.querySelector(\".noNotif\");
    const btnAllDelete = document.querySelector(\"#btnDeleteNotificationsSelected\");
    if (notifContainer.childElementCount === 0) {
      noNotif.classList.remove(\"d-none\");
      btnAllDelete.classList.add(\"d-none\");
    }
    notif.remove();
    backdrop.remove();
    try {
      const response = await fetch(form.action, {
        method: form.method,
        body: formData
      });
      
      if (!response.ok) {
        throw new Error('Une erreur s\\'est produite lors de la suppression de la notification.');
      }
      // Recalculer le nombre de notifications après suppression
      const alignCheckboxDivs = document.querySelectorAll('.alignChekboxAndDiv');
      const alignCheckboxDivsCount = alignCheckboxDivs.length;
      numberNotif.innerHTML = alignCheckboxDivsCount;
      // Vérifier si des notifications sont présentes dans la nouvelle page
      const notificationsExist = alignCheckboxDivsCount > 0;
      // Gérer l'affichage du message \"Pas de notifications\" et du bouton de suppression globale
      const noNotif = document.querySelector('.noNotif');
      const btnAllDelete = document.getElementById(\"btnDeleteNotificationsSelected\");
      if (notificationsExist) {
        noNotif.classList.add(\"d-none\");
        if (btnAllDelete !== null) {
          btnAllDelete.classList.remove(\"d-none\");
          btnAllDelete.classList.add(\"d-flex\");
        }
      } else {
        noNotif.classList.remove(\"d-none\");
        toggleMenu.classList.remove(\"text-danger\");
        toggleMenu.classList.add(\"text-light\");
        numberNotif.classList.add(\"text-light\");
        numberNotif.classList.remove(\"text-danger\");
        btnAllDelete.classList.add(\"d-none\");
        btnAllDelete.classList.remove(\"d-flex\");
      }

    } catch (error) {
      console.error('Erreur lors de la suppression de la notification:', error);
    }
  }
  // Fonction pour réinitialiser le formulaire à chaque ouverture du modal

</script>


", "Component/navbar/Desktop/navbar.html.twig", "/var/www/html/PyroConnect/templates/Component/navbar/Desktop/navbar.html.twig");
    }
}
