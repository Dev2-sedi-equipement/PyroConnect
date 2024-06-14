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

/* components/dossiers_searchVRP.html.twig */
class __TwigTemplate_6545ef333e754f3577ab6c8a5028c583 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/dossiers_searchVRP.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "components/dossiers_searchVRP.html.twig"));

        // line 1
        yield "<div ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["attributes"]) || array_key_exists("attributes", $context) ? $context["attributes"] : (function () { throw new RuntimeError('Variable "attributes" does not exist.', 1, $this->source); })()), "html", null, true);
        yield " class=\"d-flex flex-column align-items-center\">
    
    <div class=\"d-flex justify-content-center w-100 align-items-center divSearch\">
        <input
            type=\"text\"
            data-model=\"query\"
            placeholder=\"Recherche par nom | ville | date \"
            style=\"max-width: 700px !important;\"
            class=\"form-control\"
            id=\"searchBar\"

        >
        <svg xmlns=\"http://www.w3.org/2000/svg\" data-bs-toggle=\"tooltip\" data-bs-title=\"Je peux rechercher un dossier soit par : son nom, le type de feu, le jour, le mois, ou l'année du tir de feu.\" width=\"25\" height=\"25\" fill=\"currentColor\" class=\"bi bi-info-circle-fill ms-2\" viewBox=\"0 0 16 16\">
            <path d=\"M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2\" style=\"color: cornsilk;\"></path>
        </svg>
    </div>

    ";
        // line 18
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 18, $this->source); })()), "dossiersSearchVRP", [], "any", false, false, false, 18)) > 0)) {
            // line 19
            yield "        <div class=\"mt-3 row w-85 dossier-container justify-content-center\">
            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 20, $this->source); })()), "dossiersSearchVRP", [], "any", false, false, false, 20));
            foreach ($context['_seq'] as $context["_key"] => $context["dossierVRP"]) {
                // line 21
                yield "                ";
                yield $this->extensions['Symfony\UX\TwigComponent\Twig\ComponentExtension']->render("dossierVRP", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["dossierVRP"], "id", [], "any", false, false, false, 21)]);
                yield "
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['dossierVRP'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 23
            yield "        </div>
    ";
        } elseif (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source,         // line 24
(isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 24, $this->source); })()), "dossiersSearchVRP", [], "any", false, false, false, 24)) == 0) && Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, (isset($context["this"]) || array_key_exists("this", $context) ? $context["this"] : (function () { throw new RuntimeError('Variable "this" does not exist.', 24, $this->source); })()), "query", [], "any", false, false, false, 24)))) {
            // line 25
            yield "        <p id=\"noDossierFoundLive\"class=\"pt-3 text-white text-center mt-3 fs-3 \" >Aucun dossier disponible.</p>

        <script>
            //affhichage du message aucun dossier selon les situations 
        const noDossierFoundLive = document.querySelector('#noDossierFoundLive');
        const noDossierFound = document.querySelector('#noDossierFound');
        if(noDossierFound){
            noDossierFoundLive.classList.add('d-none');
        }
        
        </script>
    ";
        } else {
            // line 37
            yield "        <div class=\"pt-3 text-white text-center mt-3 fs-3 noResultLive\">Ah! Aucun résultat pour cette recherche : <span class=\"font-weight-bold\">\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 37, $this->source); })()), "html", null, true);
            yield "\"</span></div>
    ";
        }
        // line 39
        yield "
</div>
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
        return "components/dossiers_searchVRP.html.twig";
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
        return array (  108 => 39,  102 => 37,  88 => 25,  86 => 24,  83 => 23,  74 => 21,  70 => 20,  67 => 19,  65 => 18,  44 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<div {{ attributes }} class=\"d-flex flex-column align-items-center\">
    
    <div class=\"d-flex justify-content-center w-100 align-items-center divSearch\">
        <input
            type=\"text\"
            data-model=\"query\"
            placeholder=\"Recherche par nom | ville | date \"
            style=\"max-width: 700px !important;\"
            class=\"form-control\"
            id=\"searchBar\"

        >
        <svg xmlns=\"http://www.w3.org/2000/svg\" data-bs-toggle=\"tooltip\" data-bs-title=\"Je peux rechercher un dossier soit par : son nom, le type de feu, le jour, le mois, ou l'année du tir de feu.\" width=\"25\" height=\"25\" fill=\"currentColor\" class=\"bi bi-info-circle-fill ms-2\" viewBox=\"0 0 16 16\">
            <path d=\"M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16m.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2\" style=\"color: cornsilk;\"></path>
        </svg>
    </div>

    {% if this.dossiersSearchVRP|length > 0 %}
        <div class=\"mt-3 row w-85 dossier-container justify-content-center\">
            {% for dossierVRP in this.dossiersSearchVRP %}
                {{ component('dossierVRP', {'id': dossierVRP.id}) }}
            {% endfor %}
        </div>
    {% elseif this.dossiersSearchVRP|length == 0 and this.query is empty %}
        <p id=\"noDossierFoundLive\"class=\"pt-3 text-white text-center mt-3 fs-3 \" >Aucun dossier disponible.</p>

        <script>
            //affhichage du message aucun dossier selon les situations 
        const noDossierFoundLive = document.querySelector('#noDossierFoundLive');
        const noDossierFound = document.querySelector('#noDossierFound');
        if(noDossierFound){
            noDossierFoundLive.classList.add('d-none');
        }
        
        </script>
    {% else %}
        <div class=\"pt-3 text-white text-center mt-3 fs-3 noResultLive\">Ah! Aucun résultat pour cette recherche : <span class=\"font-weight-bold\">\"{{ query }}\"</span></div>
    {% endif %}

</div>
", "components/dossiers_searchVRP.html.twig", "/var/www/html/PyroConnect/templates/components/dossiers_searchVRP.html.twig");
    }
}
