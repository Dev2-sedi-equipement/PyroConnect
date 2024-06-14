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

/* vrp/index.html.twig */
class __TwigTemplate_5abb4cd8012449bfa17e24cae2265d3f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "vrp/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "vrp/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "vrp/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Hello VrpController!";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "
    ";
        // line 7
        yield from         $this->loadTemplate("Component/navbar/Desktop/navbar.html.twig", "vrp/index.html.twig", 7)->unwrap()->yield($context);
        // line 8
        yield "    ";
        yield from         $this->loadTemplate("Component/navbar/Mobile/navbar.html.twig", "vrp/index.html.twig", 8)->unwrap()->yield($context);
        // line 9
        yield "
    

    <section class=\"content-vrp mt-4\" data-turbo=\"true\">
        ";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 13, $this->source); })()), "flashes", ["success"], "method", false, false, false, 13));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 14
            yield "            <div class=\"alert alert-success w-100 text-center text-bg-info\" style=\"margin-top: 6rem;  margin-bottom: -6rem;\" role=\"alert\">
                ";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "
            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        yield "
        ";
        // line 19
        yield from         $this->loadTemplate("Component/optionsVRP.html.twig", "vrp/index.html.twig", 19)->unwrap()->yield($context);
        // line 20
        yield "
        <div>
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"120\" height=\"120\" fill=\"currentColor\" style=\"top:190px;\"class=\"bi bi-wifi-off position-absolute start-0 text-danger d-none\"  id=\"wifiOff\" viewBox=\"0 0 16 16\">
              <path d=\"M10.706 3.294A12.6 12.6 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4q.946 0 1.852.148zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.45 8.45 0 0 1 3.51-1.27zm2.596 1.404.785-.785q.947.362 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.5 8.5 0 0 0-1.98-.932zM8 10l.933-.933a6.5 6.5 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.53.53 0 0 1-.611.09A5.5 5.5 0 0 0 8 10m4.905-4.905.747-.747q.886.451 1.685 1.03a.485.485 0 0 1 .047.737.52.52 0 0 1-.668.05 11.5 11.5 0 0 0-1.811-1.07M9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A2 2 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75z\"/>
            </svg>
            <p id=\"noDossierFound\" class=\"pt-3 text-white text-center mt-3 fs-3  d-none\">Aucun dossier disponible.</p>
        </div>

";
        // line 29
        yield "        <div class=\"wifiOff\">
            <div class=\"modal\" style=\"background-color: #0000008a; \" tabindex=\"-1\">
            <div class=\"modal-dialog modal-dialog-centered justify-content-center\">
                <div class=\"modal-content bg-dark text-white\">
                
                <div class=\"modal-body fs-4 text\">
                    <h3 class=\"lost-connexion-h3\"><i class=\"bi bi-wifi-off\"></i> Votre connexion internet a été interrompu! Veuillez vous connecter à internet. </h3>
                </div>
            
                </div>
            </div>
            </div>
        </div>




</section>

    <style>body{height: 100vh!important;}</style>

    ";
        // line 61
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
        return "vrp/index.html.twig";
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
        return array (  158 => 61,  135 => 29,  125 => 20,  123 => 19,  120 => 18,  111 => 15,  108 => 14,  104 => 13,  98 => 9,  95 => 8,  93 => 7,  90 => 6,  80 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Hello VrpController!{% endblock %}
  
{% block body %}

    {% include 'Component/navbar/Desktop/navbar.html.twig' %}
    {% include 'Component/navbar/Mobile/navbar.html.twig' %}

    

    <section class=\"content-vrp mt-4\" data-turbo=\"true\">
        {% for message in app.flashes('success') %}
            <div class=\"alert alert-success w-100 text-center text-bg-info\" style=\"margin-top: 6rem;  margin-bottom: -6rem;\" role=\"alert\">
                {{ message }}
            </div>
        {% endfor %}

        {% include 'Component/optionsVRP.html.twig' %}

        <div>
            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"120\" height=\"120\" fill=\"currentColor\" style=\"top:190px;\"class=\"bi bi-wifi-off position-absolute start-0 text-danger d-none\"  id=\"wifiOff\" viewBox=\"0 0 16 16\">
              <path d=\"M10.706 3.294A12.6 12.6 0 0 0 8 3C5.259 3 2.723 3.882.663 5.379a.485.485 0 0 0-.048.736.52.52 0 0 0 .668.05A11.45 11.45 0 0 1 8 4q.946 0 1.852.148zM8 6c-1.905 0-3.68.56-5.166 1.526a.48.48 0 0 0-.063.745.525.525 0 0 0 .652.065 8.45 8.45 0 0 1 3.51-1.27zm2.596 1.404.785-.785q.947.362 1.785.907a.482.482 0 0 1 .063.745.525.525 0 0 1-.652.065 8.5 8.5 0 0 0-1.98-.932zM8 10l.933-.933a6.5 6.5 0 0 1 2.013.637c.285.145.326.524.1.75l-.015.015a.53.53 0 0 1-.611.09A5.5 5.5 0 0 0 8 10m4.905-4.905.747-.747q.886.451 1.685 1.03a.485.485 0 0 1 .047.737.52.52 0 0 1-.668.05 11.5 11.5 0 0 0-1.811-1.07M9.02 11.78c.238.14.236.464.04.66l-.707.706a.5.5 0 0 1-.707 0l-.707-.707c-.195-.195-.197-.518.04-.66A2 2 0 0 1 8 11.5c.374 0 .723.102 1.021.28zm4.355-9.905a.53.53 0 0 1 .75.75l-10.75 10.75a.53.53 0 0 1-.75-.75z\"/>
            </svg>
            <p id=\"noDossierFound\" class=\"pt-3 text-white text-center mt-3 fs-3  d-none\">Aucun dossier disponible.</p>
        </div>

{# <div id=\"result\"></div> #}
        <div class=\"wifiOff\">
            <div class=\"modal\" style=\"background-color: #0000008a; \" tabindex=\"-1\">
            <div class=\"modal-dialog modal-dialog-centered justify-content-center\">
                <div class=\"modal-content bg-dark text-white\">
                
                <div class=\"modal-body fs-4 text\">
                    <h3 class=\"lost-connexion-h3\"><i class=\"bi bi-wifi-off\"></i> Votre connexion internet a été interrompu! Veuillez vous connecter à internet. </h3>
                </div>
            
                </div>
            </div>
            </div>
        </div>




</section>

    <style>body{height: 100vh!important;}</style>

    {# <script>
        if (typeof(EventSource) !== \"undefined\") {
            const eventSource = new EventSource(\"demo_sse.php\");
            eventSource.onmessage = function(event) {
                document.getElementById(\"result\").innerHTML += \"<div class='bg-success'>\" + event.data + \"</div><br>\";
                 // Ferme la connexion SSE après réception du premier message
            };
        } else {
            document.getElementById(\"result\").innerHTML = \"Désolé, votre navigateur ne prend pas en charge les événements envoyés par le serveur (SSE)...\";
        }
    </script> #}



{% endblock %}
", "vrp/index.html.twig", "/var/www/html/PyroConnect/templates/vrp/index.html.twig");
    }
}
