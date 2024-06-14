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

/* Component/notifications.html.twig */
class __TwigTemplate_7ad63a309c8d22735c9a5e1e112285f2 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/notifications.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Component/notifications.html.twig"));

        // line 1
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 4
        yield "    
";
        // line 5
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 9
        yield "
";
        // line 10
        if ((array_key_exists("notifications", $context) &&  !Twig\Extension\CoreExtension::testEmpty((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 10, $this->source); })())))) {
            // line 11
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 11, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["notification"]) {
                // line 12
                yield "        <div id=\"notification_";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 12), "html", null, true);
                yield "\" class=\"toast mt-4 mb-4 d-flex flex-column notif alignChekboxAndDiv ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 12) == "lecture")) {
                    yield "lecture";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 12) == "modification")) {
                    yield "modification";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 12) == "création")) {
                    yield "création";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 12) == "archivé")) {
                    yield "archivé";
                }
                yield " \" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
            <a href=\"";
                // line 13
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dossiers_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "iddossier", [], "any", false, false, false, 13)]), "html", null, true);
                yield "\" type=\"button\">
                <div class=\"toast-header ";
                // line 14
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 14) == "lecture")) {
                    yield "bg-lecture";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 14) == "modification")) {
                    yield "bg-modif";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 14) == "création")) {
                    yield "bg-creation";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 14) == "archivé")) {
                    yield "bg-archivage";
                }
                yield "\">
                    <strong class=\"me-auto\">Date création de la notification<br><span class=\"dateCreationNotification\">";
                // line 15
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "dateCreation", [], "any", false, false, false, 15), "d-m-Y H:i:s"), "html", null, true);
                yield "</span></strong>
                    ";
                // line 16
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "type", [], "any", false, false, false, 16) == "lecture")) {
                    // line 17
                    yield "                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-eye\" viewBox=\"0 0 16 16\">
                                <path d=\"M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z\"/>
                                <path d=\"M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0\"/>
                            </svg>
                        </div>
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 23
$context["notification"], "type", [], "any", false, false, false, 23) == "modification")) {
                    // line 24
                    yield "                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                                <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
                                <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z\"/>
                            </svg>
                        </div>
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 30
$context["notification"], "type", [], "any", false, false, false, 30) == "création")) {
                    // line 31
                    yield "                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-file-earmark-plus\" viewBox=\"0 0 16 16\">
                                <path d=\"M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5\"/>
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z\"/>
                            </svg>
                        </div>
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 37
$context["notification"], "type", [], "any", false, false, false, 37) == "archivé")) {
                    // line 38
                    yield "                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-archive\" viewBox=\"0 0 16 16\">
                                <path d=\"M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5\"/>
                            </svg>
                        </div>
                    ";
                }
                // line 44
                yield "                </div>

                <div class=\"toast-body bg-white text-black\">
                    ";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "titre", [], "any", false, false, false, 47), "html", null, true);
                yield "
                </div>
            </a>
            <div class=\"d-flex justify-content-end\">
                <!-- Bouton pour ouvrir le modal -->
                <button type=\"button\" class=\"btn btn-delete deleteNotif\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal";
                // line 52
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 52), "html", null, true);
                yield "\"  data-bs-target=\"#staticBackdrop\" data-notification-id=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 52), "html", null, true);
                yield "\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x\" viewBox=\"0 0 16 16\">
                        <path d=\"M4.354 4.354a.5.5 0 0 1 .708 0L8 7.293l3.938-3.939a.5.5 0 1 1 .708.708L8.707 8l3.937 3.937a.5.5 0 1 1-.708.708L8 8.707l-3.938 3.938a.5.5 0 1 1-.708-.708L7.293 8 3.354 4.062a.5.5 0 0 1 0-.708z\"/>
                    </svg>
                </button>

                <!-- Modal pour le formulaire de suppression -->
                <div class=\"modal fade\" id=\"deleteModal";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 59), "html", null, true);
                yield "\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\" data-bs-backdrop=\"static\" onhide=\"closeModal()\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger\">
                                <h5 class=\"modal-title text-black \" id=\"deleteModalLabel\">Confirmer la suppression</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"closeModal()\"></button>
                            </div>
                            <div class=\"modal-body text-black\">
                                <p>Êtes-vous sûr de vouloir supprimer cette notification ?</p>
                            </div>
                            <div class=\"modal-footer\">
                                <!-- Formulaire de suppression -->
                                <form id=\"deleteForm";
                // line 71
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 71), "html", null, true);
                yield "\" method=\"POST\" data-turbo-method=\"delete\" action=\"/notification/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 71), "html", null, true);
                yield "\">
                                    <input type=\"hidden\" name=\"_token\" value=\"";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 72))), "html", null, true);
                yield "\">
                                    <button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteNotification(";
                // line 73
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notification"], "id", [], "any", false, false, false, 73), "html", null, true);
                yield ")\">Supprimer</button>
                                </form>

                                <!-- Bouton pour fermer le modal -->
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\" onclick=\"closeModal()\">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['notification'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        return; yield '';
    }

    // line 1
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 2
        yield "    ";
        yield $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        return; yield '';
    }

    // line 5
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 6
        yield "    ";
        yield $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("navbar");
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
        return "Component/notifications.html.twig";
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
        return array (  250 => 6,  240 => 5,  226 => 2,  216 => 1,  188 => 73,  184 => 72,  178 => 71,  163 => 59,  151 => 52,  143 => 47,  138 => 44,  130 => 38,  128 => 37,  120 => 31,  118 => 30,  110 => 24,  108 => 23,  100 => 17,  98 => 16,  94 => 15,  82 => 14,  78 => 13,  63 => 12,  58 => 11,  56 => 10,  53 => 9,  51 => 5,  48 => 4,  46 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% block stylesheets %}
    {{ encore_entry_link_tags('app') }}
{% endblock %}
    
{% block javascripts %}
    {{ encore_entry_script_tags('navbar') }}

{% endblock %}

{% if notifications is defined and notifications is not empty %}
    {% for notification in notifications %}
        <div id=\"notification_{{ notification.id }}\" class=\"toast mt-4 mb-4 d-flex flex-column notif alignChekboxAndDiv {% if notification.type == 'lecture' %}lecture{% elseif notification.type == 'modification' %}modification{% elseif notification.type == 'création' %}création{% elseif notification.type == 'archivé' %}archivé{% endif %} \" role=\"alert\" aria-live=\"assertive\" aria-atomic=\"true\">
            <a href=\"{{ path('app_dossiers_edit', {'id': notification.iddossier}) }}\" type=\"button\">
                <div class=\"toast-header {% if notification.type == 'lecture' %}bg-lecture{% elseif notification.type == 'modification' %}bg-modif{% elseif notification.type == 'création' %}bg-creation{% elseif notification.type == 'archivé' %}bg-archivage{% endif %}\">
                    <strong class=\"me-auto\">Date création de la notification<br><span class=\"dateCreationNotification\">{{ notification.dateCreation|date('d-m-Y H:i:s') }}</span></strong>
                    {% if notification.type == 'lecture' %}
                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-eye\" viewBox=\"0 0 16 16\">
                                <path d=\"M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z\"/>
                                <path d=\"M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0\"/>
                            </svg>
                        </div>
                    {% elseif notification.type == 'modification' %}
                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-pencil-square\" viewBox=\"0 0 16 16\">
                                <path d=\"M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z\"/>
                                <path fill-rule=\"evenodd\" d=\"M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z\"/>
                            </svg>
                        </div>
                    {% elseif notification.type == 'création' %}
                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-file-earmark-plus\" viewBox=\"0 0 16 16\">
                                <path d=\"M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5\"/>
                                <path d=\"M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5z\"/>
                            </svg>
                        </div>
                    {% elseif notification.type == 'archivé' %}
                        <div>
                            <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"30\" height=\"50\" fill=\"currentColor\" class=\"bi bi-archive\" viewBox=\"0 0 16 16\">
                                <path d=\"M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5\"/>
                            </svg>
                        </div>
                    {% endif %}
                </div>

                <div class=\"toast-body bg-white text-black\">
                    {{ notification.titre }}
                </div>
            </a>
            <div class=\"d-flex justify-content-end\">
                <!-- Bouton pour ouvrir le modal -->
                <button type=\"button\" class=\"btn btn-delete deleteNotif\" data-bs-toggle=\"modal\" data-bs-target=\"#deleteModal{{ notification.id }}\"  data-bs-target=\"#staticBackdrop\" data-notification-id=\"{{ notification.id }}\">
                    <svg xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" class=\"bi bi-x\" viewBox=\"0 0 16 16\">
                        <path d=\"M4.354 4.354a.5.5 0 0 1 .708 0L8 7.293l3.938-3.939a.5.5 0 1 1 .708.708L8.707 8l3.937 3.937a.5.5 0 1 1-.708.708L8 8.707l-3.938 3.938a.5.5 0 1 1-.708-.708L7.293 8 3.354 4.062a.5.5 0 0 1 0-.708z\"/>
                    </svg>
                </button>

                <!-- Modal pour le formulaire de suppression -->
                <div class=\"modal fade\" id=\"deleteModal{{ notification.id }}\" tabindex=\"-1\" aria-labelledby=\"deleteModalLabel\" aria-hidden=\"true\" data-bs-backdrop=\"static\" onhide=\"closeModal()\">
                    <div class=\"modal-dialog modal-dialog-centered\">
                        <div class=\"modal-content\">
                            <div class=\"modal-header bg-danger\">
                                <h5 class=\"modal-title text-black \" id=\"deleteModalLabel\">Confirmer la suppression</h5>
                                <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\" onclick=\"closeModal()\"></button>
                            </div>
                            <div class=\"modal-body text-black\">
                                <p>Êtes-vous sûr de vouloir supprimer cette notification ?</p>
                            </div>
                            <div class=\"modal-footer\">
                                <!-- Formulaire de suppression -->
                                <form id=\"deleteForm{{ notification.id }}\" method=\"POST\" data-turbo-method=\"delete\" action=\"/notification/{{ notification.id }}\">
                                    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ notification.id) }}\">
                                    <button type=\"button\" class=\"btn btn-danger\" onclick=\"deleteNotification({{ notification.id }})\">Supprimer</button>
                                </form>

                                <!-- Bouton pour fermer le modal -->
                                <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\" onclick=\"closeModal()\">Annuler</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {% endfor %}
{% endif %}", "Component/notifications.html.twig", "/var/www/html/PyroConnect/templates/Component/notifications.html.twig");
    }
}
