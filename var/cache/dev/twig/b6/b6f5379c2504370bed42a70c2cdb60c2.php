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

/* Component/navbar/Mobile/navbar.html.twig */
class __TwigTemplate_6bd86e710b60d5185b571ad3e0f2f268 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/navbar/Mobile/navbar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/navbar/Mobile/navbar.html.twig"));

        // line 1
        yield "
";
        // line 2
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 7
        yield "
<!-- Mobile and Tablet Navigation -->
<nav id=\"navMobile\"class=\"navbar navbar-dark bg-dark d-xl-none d-md-none  w-100\" style=\"top: 0;  overflow: hidden; z-index:1;\">
  <div class=\"container-fluid\">
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasNavbar\" aria-controls=\"offcanvasNavbar\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>

    <!-- Offcanvas Navbar Content -->
  <div class=\"offcanvas offcanvas-start text-bg-dark\" tabindex=\"-1\" id=\"offcanvasNavbar\" aria-labelledby=\"offcanvasNavbarLabel\">
    <div class=\"p-3\">
      <div class=\"offcanvas-head-title d-flex\">
        <a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none\">
            <svg class=\"bi pe-none me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
            <span class=\"fs-4\">Mon Profil</span>
        </a>

        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
      </div>
            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Service Feux </span>&ensp;";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 26, $this->source); })()), "name", [], "any", false, false, false, 26), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 26, $this->source); })()), "lastname", [], "any", false, false, false, 26), "html", null, true);
        yield " </h4>

      <hr>
    </div>
  
      <!-- Offcanvas Navbar Body -->
    <div class=\"offcanvas-body d-flex justify-content-between flex-column\" >
        <ul class=\"navbar-nav justify-content-start flex-grow-1 pe-3\">
          <li class=\"nav-item nice\"style=\"font-size: 20px;\">    
          ";
        // line 35
        if (array_key_exists("user", $context)) {
            // line 36
            yield "
            ";
            // line 37
            if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()) && CoreExtension::inFilter("SF", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 37, $this->source); })()), "roles", [], "any", false, false, false, 37)))) {
                // line 38
                yield "              <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_index");
                yield "\" class=\"nav-link active\">Accueil</a>
            ";
            } elseif ((            // line 39
(isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 39, $this->source); })()) && CoreExtension::inFilter("VRP", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 39, $this->source); })()), "roles", [], "any", false, false, false, 39)))) {
                // line 40
                yield "              <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_vrp");
                yield "\" class=\"nav-link active\">Accueil</a>
            ";
            } else {
                // line 42
                yield "              <a href=\"";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
                yield "\" class=\"nav-link active\">Partie Admin</a>
            ";
            }
            // line 44
            yield "
          ";
        }
        // line 46
        yield "          </li>
          
          <li class=\"nav-item nice\" style=\"font-size: 20px;\"> 
            <a href=\"";
        // line 49
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_nouveau");
        yield "\" data-turbo-action=\"true\" class=\"nav-link\">Créer un Dossier</a>
          </li>
          <li class=\"nav-item nice\"style=\"font-size: 20px;\">    
            ";
        // line 52
        if (((isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()) && CoreExtension::inFilter("ROLE_ADMIN", CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "roles", [], "any", false, false, false, 52)))) {
            // line 53
            yield "              <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_admin");
            yield "\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link \"style=\"font-size: 18px;\" >Partie Admin</a>
            ";
        } else {
            // line 55
            yield "              <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_gestion_profil");
            yield "\"data-turbo-prefetch=\"true\"  class=\"nav-link\"style=\"font-size: 18px;\" >Mon Profil</a>
            ";
        }
        // line 57
        yield "          </li>

          <li class=\"nav-item\">    
          </li>
        </ul>
        <div>
          <hr>
          <a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\" class=\"btn btn-primary w-100 text-center\" href=\"#\"style=\"font-size: 18px;\" >Se déconnecter</a>
        </div>
      </div>
    </div>  

    <div style=\"height: 100px;\" class=\" btn col-4 d-flex flex-row align-items-center justify-content-end pe-3\">
          <button class=\"btn d-flex\"  type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample42\" aria-controls=\"offcanvasExample\" aria-label=\"Toggle navigation\">

        <svg id=\"toggleMenu\" xmlns=\"http://www.w3.org/2000/svg\" height=\"50\" fill=\"currentColor\" class=\"bi bi-bell ";
        // line 72
        if (((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 72, $this->source); })()) > 0)) {
            yield "text-danger";
        } else {
            yield "text-light";
        }
        yield " \" viewBox=\"0 0 16 16\">
          <path d=\"M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6\"/>
        </svg>
        <p id=\"numberNotif\" class=\"text-danger mb-0 ";
        // line 75
        if (((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 75, $this->source); })()) > 0)) {
            yield "text-danger";
        } else {
            yield "text-light";
        }
        yield "\" style=\"margin: 2rem 0 0 0 !important;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["notificationsLength"]) || array_key_exists("notificationsLength", $context) ? $context["notificationsLength"] : (function () { throw new RuntimeError('Variable "notificationsLength" does not exist.', 75, $this->source); })()), "html", null, true);
        yield "</p>

      </button>
    </div>

    <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasExample42\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header \">
          <h5 class=\"offcanvas-title\" id=\"offcanvasExampleLabel\">Mes Notifications </h5>
          <button type=\"button\" class=\"btn-close text-reset bg-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\">
          </button>
      </div>

      <div class=\"offcanvas-body gap-2\" id=\"notificationContainer\" >
        <div class=\"d-flex mb-2\" style=\"max-width: 359px;\">
          <button type=\"button\" id=\"btnRecentes\"class=\" bg-white w-100\">Récentes <i class=\"bi bi-sort-down\"></i></button>
          <button type=\"button\" id =\"btnAnciennes\"class=\" bg-white w-100\">Anciennes <i class=\"bi bi-sort-up\"></i></button>
        </div>
        <div class=\"notification-buttons parent-grid\">
       
          <input type=\"radio\" id=\"toutesNotif\" name=\"notification-type\" class=\"d-none\" value=\"toutesNotif\"   checked/>
          <label for=\"toutesNotif\" class=\"btn bg-ttes btn-sm m-1 btnToutesNotifs text-white active filter-notification\" onclick=\"checkRadio('toutesNotif')\"><p>Toutes</p></label>

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
        // line 138
        if ( !Twig\Extension\CoreExtension::testEmpty((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 138, $this->source); })()))) {
            yield "d-none";
        }
        yield "\">Vous avez actuellement aucune nouvelle notification.</div>
          <div class=\"notifContainer\">
            ";
        // line 140
        yield from         $this->loadTemplate("Component/notifications.html.twig", "Component/navbar/Mobile/navbar.html.twig", 140)->unwrap()->yield($context);
        // line 141
        yield "          </div>
        </div>
      </div>
    </div>
  </div>


</nav>
<style>

  /* Désactive le z-index de .modal-backdrop */
  .modal-backdrop {
      z-index: initial !important; /* Utilise la valeur par défaut */
  }
</style>



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
        return "Component/navbar/Mobile/navbar.html.twig";
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
        return array (  293 => 4,  290 => 3,  280 => 2,  251 => 141,  249 => 140,  242 => 138,  170 => 75,  160 => 72,  149 => 64,  140 => 57,  134 => 55,  128 => 53,  126 => 52,  120 => 49,  115 => 46,  111 => 44,  105 => 42,  99 => 40,  97 => 39,  92 => 38,  90 => 37,  87 => 36,  85 => 35,  71 => 26,  50 => 7,  48 => 2,  45 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
{% block javascripts %}

  {{ encore_entry_script_tags('navbarJs') }}

{% endblock %}

<!-- Mobile and Tablet Navigation -->
<nav id=\"navMobile\"class=\"navbar navbar-dark bg-dark d-xl-none d-md-none  w-100\" style=\"top: 0;  overflow: hidden; z-index:1;\">
  <div class=\"container-fluid\">
    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasNavbar\" aria-controls=\"offcanvasNavbar\" aria-label=\"Toggle navigation\">
      <span class=\"navbar-toggler-icon\"></span>
    </button>

    <!-- Offcanvas Navbar Content -->
  <div class=\"offcanvas offcanvas-start text-bg-dark\" tabindex=\"-1\" id=\"offcanvasNavbar\" aria-labelledby=\"offcanvasNavbarLabel\">
    <div class=\"p-3\">
      <div class=\"offcanvas-head-title d-flex\">
        <a href=\"/\" class=\"d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none\">
            <svg class=\"bi pe-none me-2\" width=\"40\" height=\"32\"><use xlink:href=\"#bootstrap\"></use></svg>
            <span class=\"fs-4\">Mon Profil</span>
        </a>

        <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\"></button>
      </div>
            <h4 class=\"d-flex align-items-end text-white fs-5\"><span id=\"roleUser\" class=\"badge text-bg-secondary text-white\">Service Feux </span>&ensp;{{user.name}} {{user.lastname}} </h4>

      <hr>
    </div>
  
      <!-- Offcanvas Navbar Body -->
    <div class=\"offcanvas-body d-flex justify-content-between flex-column\" >
        <ul class=\"navbar-nav justify-content-start flex-grow-1 pe-3\">
          <li class=\"nav-item nice\"style=\"font-size: 20px;\">    
          {% if user is defined %}

            {% if user and 'SF' in user.roles %}
              <a href=\"{{ path('app_index') }}\" class=\"nav-link active\">Accueil</a>
            {% elseif user and 'VRP' in user.roles  %}
              <a href=\"{{ path('app_vrp') }}\" class=\"nav-link active\">Accueil</a>
            {% else %}
              <a href=\"{{ path('app_admin') }}\" class=\"nav-link active\">Partie Admin</a>
            {% endif %}

          {% endif %}
          </li>
          
          <li class=\"nav-item nice\" style=\"font-size: 20px;\"> 
            <a href=\"{{ path('app_nouveau') }}\" data-turbo-action=\"true\" class=\"nav-link\">Créer un Dossier</a>
          </li>
          <li class=\"nav-item nice\"style=\"font-size: 20px;\">    
            {% if user and 'ROLE_ADMIN'  in user.roles %}
              <a href=\"{{ path('app_admin') }}\" data-turbo-prefetch=\"true\" data-turbo-stream class=\"nav-link \"style=\"font-size: 18px;\" >Partie Admin</a>
            {% else %}
              <a href=\"{{ path('app_gestion_profil') }}\"data-turbo-prefetch=\"true\"  class=\"nav-link\"style=\"font-size: 18px;\" >Mon Profil</a>
            {% endif %}
          </li>

          <li class=\"nav-item\">    
          </li>
        </ul>
        <div>
          <hr>
          <a href=\"{{ path('app_logout') }}\" class=\"btn btn-primary w-100 text-center\" href=\"#\"style=\"font-size: 18px;\" >Se déconnecter</a>
        </div>
      </div>
    </div>  

    <div style=\"height: 100px;\" class=\" btn col-4 d-flex flex-row align-items-center justify-content-end pe-3\">
          <button class=\"btn d-flex\"  type=\"button\" data-bs-toggle=\"offcanvas\" data-bs-target=\"#offcanvasExample42\" aria-controls=\"offcanvasExample\" aria-label=\"Toggle navigation\">

        <svg id=\"toggleMenu\" xmlns=\"http://www.w3.org/2000/svg\" height=\"50\" fill=\"currentColor\" class=\"bi bi-bell {% if notificationsLength > 0 %}text-danger{% else %}text-light{% endif %} \" viewBox=\"0 0 16 16\">
          <path d=\"M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2M8 1.918l-.797.161A4 4 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4 4 0 0 0-3.203-3.92zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5 5 0 0 1 13 6c0 .88.32 4.2 1.22 6\"/>
        </svg>
        <p id=\"numberNotif\" class=\"text-danger mb-0 {% if notificationsLength > 0 %}text-danger{% else %}text-light{% endif %}\" style=\"margin: 2rem 0 0 0 !important;\">{{ notificationsLength }}</p>

      </button>
    </div>

    <div class=\"offcanvas offcanvas-end text-bg-dark\" tabindex=\"-1\" id=\"offcanvasExample42\" aria-labelledby=\"offcanvasExampleLabel\">
      <div class=\"offcanvas-header \">
          <h5 class=\"offcanvas-title\" id=\"offcanvasExampleLabel\">Mes Notifications </h5>
          <button type=\"button\" class=\"btn-close text-reset bg-white\" data-bs-dismiss=\"offcanvas\" aria-label=\"Close\">
          </button>
      </div>

      <div class=\"offcanvas-body gap-2\" id=\"notificationContainer\" >
        <div class=\"d-flex mb-2\" style=\"max-width: 359px;\">
          <button type=\"button\" id=\"btnRecentes\"class=\" bg-white w-100\">Récentes <i class=\"bi bi-sort-down\"></i></button>
          <button type=\"button\" id =\"btnAnciennes\"class=\" bg-white w-100\">Anciennes <i class=\"bi bi-sort-up\"></i></button>
        </div>
        <div class=\"notification-buttons parent-grid\">
       
          <input type=\"radio\" id=\"toutesNotif\" name=\"notification-type\" class=\"d-none\" value=\"toutesNotif\"   checked/>
          <label for=\"toutesNotif\" class=\"btn bg-ttes btn-sm m-1 btnToutesNotifs text-white active filter-notification\" onclick=\"checkRadio('toutesNotif')\"><p>Toutes</p></label>

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

        <div class=\"noNotif mt-5 {% if notifications is not empty %}d-none{% endif %}\">Vous avez actuellement aucune nouvelle notification.</div>
          <div class=\"notifContainer\">
            {% include 'Component/notifications.html.twig' %}
          </div>
        </div>
      </div>
    </div>
  </div>


</nav>
<style>

  /* Désactive le z-index de .modal-backdrop */
  .modal-backdrop {
      z-index: initial !important; /* Utilise la valeur par défaut */
  }
</style>



", "Component/navbar/Mobile/navbar.html.twig", "/var/www/html/PyroConnect/templates/Component/navbar/Mobile/navbar.html.twig");
    }
}
