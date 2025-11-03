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
use Twig\TemplateWrapper;

/* admin/_nav.html.twig */
class __TwigTemplate_fb5b757282ed6bff9119ed06e4c03c4c extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/_nav.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/_nav.html.twig"));

        // line 1
        yield "<nav class=\"admin-nav\">
    <div class=\"nav-grid\">
        <a class=\"nav-link";
        // line 3
        yield (((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 3, $this->source); })()), "request", [], "any", false, false, false, 3), "attributes", [], "any", false, false, false, 3), "get", ["_route"], "method", false, false, false, 3)) && is_string($_v1 = "admin_projects") && str_starts_with($_v0, $_v1))) ? (" active") : (""));
        yield "\"
            href=\"";
        // line 4
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_projects");
        yield "\">Projets</a>
        <a class=\"nav-link";
        // line 5
        yield (((is_string($_v2 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 5, $this->source); })()), "request", [], "any", false, false, false, 5), "attributes", [], "any", false, false, false, 5), "get", ["_route"], "method", false, false, false, 5)) && is_string($_v3 = "admin_realisations") && str_starts_with($_v2, $_v3))) ? (" active") : (""));
        yield "\"
            href=\"";
        // line 6
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_realisations");
        yield "\">Réalisations</a>
        <a class=\"nav-link";
        // line 7
        yield (((is_string($_v4 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 7, $this->source); })()), "request", [], "any", false, false, false, 7), "attributes", [], "any", false, false, false, 7), "get", ["_route"], "method", false, false, false, 7)) && is_string($_v5 = "admin_services") && str_starts_with($_v4, $_v5))) ? (" active") : (""));
        yield "\"
            href=\"";
        // line 8
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_services");
        yield "\">Services</a>

        ";
        // line 10
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 11
            yield "        <a class=\"nav-link";
            yield (((is_string($_v6 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "request", [], "any", false, false, false, 11), "attributes", [], "any", false, false, false, 11), "get", ["_route"], "method", false, false, false, 11)) && is_string($_v7 = "admin_messages") && str_starts_with($_v6, $_v7))) ? (" active") : (""));
            yield "\"
            href=\"";
            // line 12
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_messages");
            yield "\">Messages</a>
        ";
        }
        // line 14
        yield "
        ";
        // line 15
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_SUPER_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "        <a class=\"nav-link";
            yield (((is_string($_v8 = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "request", [], "any", false, false, false, 16), "attributes", [], "any", false, false, false, 16), "get", ["_route"], "method", false, false, false, 16)) && is_string($_v9 = "admin_users") && str_starts_with($_v8, $_v9))) ? (" active") : (""));
            yield "\"
            href=\"";
            // line 17
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
            yield "\">Utilisateurs</a>
        ";
        }
        // line 19
        yield "    </div>

    ";
        // line 21
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "user", [], "any", false, false, false, 21)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 22
            yield "    <div class=\"nav-actions\">
        <a href=\"";
            // line 23
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
            yield "\" class=\"btn ghost\">Accueil admin</a>
        <a href=\"";
            // line 24
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_logout");
            yield "\" class=\"btn ghost\">Déconnexion</a>
    </div>
    ";
        }
        // line 27
        yield "</nav>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/_nav.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  123 => 27,  117 => 24,  113 => 23,  110 => 22,  108 => 21,  104 => 19,  99 => 17,  94 => 16,  92 => 15,  89 => 14,  84 => 12,  79 => 11,  77 => 10,  72 => 8,  68 => 7,  64 => 6,  60 => 5,  56 => 4,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<nav class=\"admin-nav\">
    <div class=\"nav-grid\">
        <a class=\"nav-link{{ app.request.attributes.get('_route') starts with 'admin_projects' ? ' active' }}\"
            href=\"{{ path('admin_projects') }}\">Projets</a>
        <a class=\"nav-link{{ app.request.attributes.get('_route') starts with 'admin_realisations' ? ' active' }}\"
            href=\"{{ path('admin_realisations') }}\">Réalisations</a>
        <a class=\"nav-link{{ app.request.attributes.get('_route') starts with 'admin_services' ? ' active' }}\"
            href=\"{{ path('admin_services') }}\">Services</a>

        {% if is_granted('ROLE_ADMIN') %}
        <a class=\"nav-link{{ app.request.attributes.get('_route') starts with 'admin_messages' ? ' active' }}\"
            href=\"{{ path('admin_messages') }}\">Messages</a>
        {% endif %}

        {% if is_granted('ROLE_SUPER_ADMIN') %}
        <a class=\"nav-link{{ app.request.attributes.get('_route') starts with 'admin_users' ? ' active' }}\"
            href=\"{{ path('admin_users') }}\">Utilisateurs</a>
        {% endif %}
    </div>

    {% if app.user %}
    <div class=\"nav-actions\">
        <a href=\"{{ path('admin_dashboard') }}\" class=\"btn ghost\">Accueil admin</a>
        <a href=\"{{ path('admin_logout') }}\" class=\"btn ghost\">Déconnexion</a>
    </div>
    {% endif %}
</nav>
", "admin/_nav.html.twig", "H:\\Code\\Portfolio\\api\\templates\\admin\\_nav.html.twig");
    }
}
