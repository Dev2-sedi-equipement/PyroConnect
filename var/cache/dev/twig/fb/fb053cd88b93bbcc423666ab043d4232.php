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

/* components/dossierVRP.html.twig */
class __TwigTemplate_48879ae62803d52c6b6a5c73b904b315 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/dossierVRP.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/dossierVRP.html.twig"));

        // line 1
        yield "
<ul class=\"list-group list-dossiers w-90  list-group-flush all-dossiers \" >

    <a href=\"";
        // line 4
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 4, $this->source); })()), "dossierVRP", [], "any", false, false, false, 4), "id", [], "any", false, false, false, 4)]), "html", null, true);
        yield "\"  data-turbo-prefetch=\"true\" data-turbo-stream class=\"  mt-3 mb-3 card dossier-item d-flex flex-row w-100 justify-content-between text-white\" style=\"text-decoration: none; border: 1px solid white; padding: 0.5rem 0 0.5rem 0.1rem;\">
        <div style=\"margin: 0.4rem;\">
            <p><i class=\"fas fa-folder\"></i> Nom du dossier : ";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 6, $this->source); })()), "dossierVRP", [], "any", false, false, false, 6), "nom", [], "any", false, false, false, 6), "html", null, true);
        yield " &nbsp; <i class=\"far fa-calendar-alt\"></i> Date de tir : ";
        ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 6, $this->source); })()), "dossierVRP", [], "any", false, false, false, 6), "dateTir", [], "any", false, false, false, 6)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 6, $this->source); })()), "dossierVRP", [], "any", false, false, false, 6), "dateTir", [], "any", false, false, false, 6), "d-m-Y"), "html", null, true)) : (yield ""));
        yield "</p>
            <p></p>



            <p><i class=\"fas fa-fire\"></i> Type de feu : ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 11, $this->source); })()), "dossierVRP", [], "any", false, false, false, 11), "typeFeu", [], "any", false, false, false, 11), "html", null, true);
        yield "</p>        
            
        </div>
        ";
        // line 14
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["this"] ?? null), "dossierVRP", [], "any", false, true, false, 14), "statut", [], "any", true, true, false, 14) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 14, $this->source); })()), "dossierVRP", [], "any", false, false, false, 14), "statut", [], "any", false, false, false, 14)))) {
            // line 15
            yield "        
        ";
            // line 16
            $context["bgColorClass"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 16, $this->source); })()), "dossierVRP", [], "any", false, false, false, 16), "statut", [], "any", false, false, false, 16), "couleur", [], "any", false, false, false, 16);
            // line 17
            yield "        ";
        } else {
            // line 18
            yield "            ";
            $context["bgColorClass"] = "";
            yield " ";
            // line 19
            yield "        ";
        }
        // line 20
        yield "
      
        <span class=\"d-flex justify-content-center align-items-center text-center spanDate ";
        // line 22
        if (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 22, $this->source); })()), "dossierVRP", [], "any", false, false, false, 22), "statut", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22)) {
            yield " bg-";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 22, $this->source); })()), "dossierVRP", [], "any", false, false, false, 22), "statut", [], "any", false, false, false, 22), "id", [], "any", false, false, false, 22), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 22, $this->source); })()), "dossierVRP", [], "any", false, false, false, 22), "statut", [], "any", false, false, false, 22), "libelle", [], "any", false, false, false, 22), [" " => ""]), "html", null, true);
        }
        yield "\"style=\"background-color:";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["bgColorClass"]) || array_key_exists("bgColorClass", $context) ? $context["bgColorClass"] : (function () { throw new RuntimeError('Variable "bgColorClass" does not exist.', 22, $this->source); })()), "html", null, true);
        yield "\"> 
            <p class=\"mb-0\" style=\"width: max-content;margin-top: auto;\"> Date de création  : <span class=\"dateCreation\">";
        // line 23
        ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 23, $this->source); })()), "dossierVRP", [], "any", false, false, false, 23), "dateCreation", [], "any", false, false, false, 23)) ? (yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 23, $this->source); })()), "dossierVRP", [], "any", false, false, false, 23), "dateCreation", [], "any", false, false, false, 23), "d/m/Y H:i:s"), "html", null, true)) : (yield ""));
        yield "</span></p>
        </span>
    </a>

</ul>


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
        return "components/dossierVRP.html.twig";
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
        return array (  102 => 23,  91 => 22,  87 => 20,  84 => 19,  80 => 18,  77 => 17,  75 => 16,  72 => 15,  70 => 14,  64 => 11,  54 => 6,  49 => 4,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
<ul class=\"list-group list-dossiers w-90  list-group-flush all-dossiers \" >

    <a href=\"{{ path('app_dossiers_edit', {'id': this.dossierVRP.id}) }}\"  data-turbo-prefetch=\"true\" data-turbo-stream class=\"  mt-3 mb-3 card dossier-item d-flex flex-row w-100 justify-content-between text-white\" style=\"text-decoration: none; border: 1px solid white; padding: 0.5rem 0 0.5rem 0.1rem;\">
        <div style=\"margin: 0.4rem;\">
            <p><i class=\"fas fa-folder\"></i> Nom du dossier : {{ this.dossierVRP.nom }} &nbsp; <i class=\"far fa-calendar-alt\"></i> Date de tir : {{ this.dossierVRP.dateTir ? this.dossierVRP.dateTir|date('d-m-Y') : '' }}</p>
            <p></p>



            <p><i class=\"fas fa-fire\"></i> Type de feu : {{ this.dossierVRP.typeFeu }}</p>        
            
        </div>
        {% if this.dossierVRP.statut is defined and this.dossierVRP.statut is not null %}
        
        {% set bgColorClass = this.dossierVRP.statut.couleur %}
        {% else %}
            {% set bgColorClass = '' %} {# Définir une valeur par défaut si statut est nul ou non défini #}
        {% endif %}

      
        <span class=\"d-flex justify-content-center align-items-center text-center spanDate {% if this.dossierVRP.statut.id %} bg-{{ this.dossierVRP.statut.id }} {{ this.dossierVRP.statut.libelle | replace({' ': ''}) }}{% endif %}\"style=\"background-color:{{ bgColorClass }}\"> 
            <p class=\"mb-0\" style=\"width: max-content;margin-top: auto;\"> Date de création  : <span class=\"dateCreation\">{{ this.dossierVRP.dateCreation ? this.dossierVRP.dateCreation|date('d/m/Y H:i:s'): '' }}</span></p>
        </span>
    </a>

</ul>


", "components/dossierVRP.html.twig", "/var/www/html/PyroConnect/templates/components/dossierVRP.html.twig");
    }
}
