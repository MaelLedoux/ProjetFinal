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

/* base.html.twig */
class __TwigTemplate_803b2c1b1d0387231d47204fd453e850 extends Template
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
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <title>";
        // line 7
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <style>
        :root {
            --brand: #1b1e39;
            --accent: #2a4b9a;
            --bg: #f6f7fb;
            --ink: #1f2530;
            --muted: #6b7280;
            --card: #fff;
            --radius: 12px;
            --shadow: 0 6px 18px rgba(0, 0, 0, .06);
        }

        html,
        body {
            height: 100%
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, \"Segoe UI\", Roboto, Arial, sans-serif;
            color: var(--ink);
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.5;
        }

        header {
            background: var(--brand);
            color: #fff;
            padding: 1rem 0
        }

        .header-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 1rem;
            text-align: center;
            font-weight: 700
        }

        main {
            flex: 1
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem 1rem
        }

        footer {
            background: var(--brand);
            color: #fff;
            text-align: center;
            padding: .9rem 1rem
        }

        a {
            color: var(--accent);
            text-decoration: none
        }

        a:hover {
            text-decoration: underline
        }

        /* NAV */
        nav.admin-nav {
            margin: 0 0 1.25rem 0
        }

        .nav-grid {
            display: grid;
            gap: .75rem;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr))
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card);
            color: var(--brand);
            border: 1px solid #e9ecf3;
            border-radius: 10px;
            padding: .9rem 1rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: var(--shadow);
            transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
        }

        .nav-link:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, .08)
        }

        .nav-link.active {
            border-color: var(--accent)
        }

        /* Cartes génériques */
        .card {
            background: var(--card);
            border: 1px solid #eceff5;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1rem;
            margin: 0 0 1rem 0
        }

        /* Boutons */
        .btn {
            display: inline-block;
            border: 1px solid var(--accent);
            background: var(--accent);
            color: #fff;
            padding: .625rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(42, 75, 154, .12)
        }

        .btn:hover {
            opacity: .95;
            transform: translateY(-1px)
        }

        .btn.ghost {
            background: transparent;
            color: var(--accent);
            box-shadow: none
        }

        /* ===== Tables responsives ===== */
        .table-admin {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #eceff5;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow)
        }

        .table-admin th,
        .table-admin td {
            padding: .75rem .9rem;
            border-bottom: 1px solid #eef1f7;
            vertical-align: top;
            text-align: left
        }

        .table-admin th {
            background: #f2f4fa;
            color: var(--brand);
            font-weight: 700
        }

        .table-admin tr:last-child td {
            border-bottom: 0
        }

        .table-actions {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap
        }

        .table-thumb {
            max-width: 120px;
            height: auto;
            border-radius: 8px
        }

        /* Mobile: table -> cartes */
        @media (max-width: 720px) {
            .table-admin thead {
                display: none
            }

            .table-admin tr {
                display: block;
                background: #fff;
                margin: 0 0 .75rem 0;
                border: 1px solid #eceff5;
                border-radius: 12px;
                box-shadow: var(--shadow)
            }

            .table-admin td {
                display: flex;
                justify-content: space-between;
                gap: 1rem;
                border-bottom: 1px solid #eef1f7;
                padding: .65rem .9rem
            }

            .table-admin td:last-child {
                border-bottom: 0
            }

            .table-admin td::before {
                content: attr(data-label);
                font-weight: 700;
                color: var(--brand)
            }

            .table-thumb {
                max-width: 100%;
                width: 100%
            }
        }

        @media (max-width:640px) {
            .container {
                padding: 1.25rem 1rem
            }
        }

        .nav-actions {
            margin-top: 1rem;
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .nav-actions .btn {
            font-size: .9rem;
            padding: .5rem .8rem;
        }

        @media (max-width: 600px) {
            .nav-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-actions .btn {
                width: 100%;
                text-align: center;
            }
        }

    </style>

    ";
        // line 264
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 265
        yield "</head>

<body>
    <header>
        <div class=\"header-inner\">Interface d’administration</div>
    </header>

    <main>
        <div class=\"container\">

            ";
        // line 276
        yield "            ";
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 276, $this->source); })()), "request", [], "any", false, false, false, 276), "attributes", [], "any", false, false, false, 276), "get", ["_route"], "method", false, false, false, 276) != "admin_login")) {
            // line 277
            yield "            ";
            yield from $this->load("admin/_nav.html.twig", 277)->unwrap()->yield($context);
            // line 278
            yield "            ";
        }
        // line 279
        yield "
            ";
        // line 281
        yield "            ";
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 282
        yield "
        </div>
    </main>

    <footer>&copy; ";
        // line 286
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " MH Interior — Administration</footer>

    ";
        // line 288
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 289
        yield "</body>

</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 7
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "MH Interior — Admin";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 264
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 281
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 288
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
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
        return array (  443 => 288,  421 => 281,  399 => 264,  376 => 7,  362 => 289,  360 => 288,  355 => 286,  349 => 282,  346 => 281,  343 => 279,  340 => 278,  337 => 277,  334 => 276,  322 => 265,  320 => 264,  60 => 7,  52 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\" />
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\" />
    <title>{% block title %}MH Interior — Admin{% endblock %}</title>

    <style>
        :root {
            --brand: #1b1e39;
            --accent: #2a4b9a;
            --bg: #f6f7fb;
            --ink: #1f2530;
            --muted: #6b7280;
            --card: #fff;
            --radius: 12px;
            --shadow: 0 6px 18px rgba(0, 0, 0, .06);
        }

        html,
        body {
            height: 100%
        }

        *,
        *::before,
        *::after {
            box-sizing: border-box
        }

        body {
            margin: 0;
            font-family: ui-sans-serif, system-ui, \"Segoe UI\", Roboto, Arial, sans-serif;
            color: var(--ink);
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            line-height: 1.5;
        }

        header {
            background: var(--brand);
            color: #fff;
            padding: 1rem 0
        }

        .header-inner {
            max-width: 960px;
            margin: 0 auto;
            padding: 0 1rem;
            text-align: center;
            font-weight: 700
        }

        main {
            flex: 1
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 2rem 1rem
        }

        footer {
            background: var(--brand);
            color: #fff;
            text-align: center;
            padding: .9rem 1rem
        }

        a {
            color: var(--accent);
            text-decoration: none
        }

        a:hover {
            text-decoration: underline
        }

        /* NAV */
        nav.admin-nav {
            margin: 0 0 1.25rem 0
        }

        .nav-grid {
            display: grid;
            gap: .75rem;
            grid-template-columns: repeat(auto-fit, minmax(160px, 1fr))
        }

        .nav-link {
            display: flex;
            align-items: center;
            justify-content: center;
            background: var(--card);
            color: var(--brand);
            border: 1px solid #e9ecf3;
            border-radius: 10px;
            padding: .9rem 1rem;
            font-weight: 600;
            text-decoration: none;
            box-shadow: var(--shadow);
            transition: transform .12s ease, box-shadow .12s ease, opacity .12s ease;
        }

        .nav-link:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 22px rgba(0, 0, 0, .08)
        }

        .nav-link.active {
            border-color: var(--accent)
        }

        /* Cartes génériques */
        .card {
            background: var(--card);
            border: 1px solid #eceff5;
            border-radius: var(--radius);
            box-shadow: var(--shadow);
            padding: 1rem;
            margin: 0 0 1rem 0
        }

        /* Boutons */
        .btn {
            display: inline-block;
            border: 1px solid var(--accent);
            background: var(--accent);
            color: #fff;
            padding: .625rem 1rem;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(42, 75, 154, .12)
        }

        .btn:hover {
            opacity: .95;
            transform: translateY(-1px)
        }

        .btn.ghost {
            background: transparent;
            color: var(--accent);
            box-shadow: none
        }

        /* ===== Tables responsives ===== */
        .table-admin {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border: 1px solid #eceff5;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--shadow)
        }

        .table-admin th,
        .table-admin td {
            padding: .75rem .9rem;
            border-bottom: 1px solid #eef1f7;
            vertical-align: top;
            text-align: left
        }

        .table-admin th {
            background: #f2f4fa;
            color: var(--brand);
            font-weight: 700
        }

        .table-admin tr:last-child td {
            border-bottom: 0
        }

        .table-actions {
            display: flex;
            gap: .5rem;
            flex-wrap: wrap
        }

        .table-thumb {
            max-width: 120px;
            height: auto;
            border-radius: 8px
        }

        /* Mobile: table -> cartes */
        @media (max-width: 720px) {
            .table-admin thead {
                display: none
            }

            .table-admin tr {
                display: block;
                background: #fff;
                margin: 0 0 .75rem 0;
                border: 1px solid #eceff5;
                border-radius: 12px;
                box-shadow: var(--shadow)
            }

            .table-admin td {
                display: flex;
                justify-content: space-between;
                gap: 1rem;
                border-bottom: 1px solid #eef1f7;
                padding: .65rem .9rem
            }

            .table-admin td:last-child {
                border-bottom: 0
            }

            .table-admin td::before {
                content: attr(data-label);
                font-weight: 700;
                color: var(--brand)
            }

            .table-thumb {
                max-width: 100%;
                width: 100%
            }
        }

        @media (max-width:640px) {
            .container {
                padding: 1.25rem 1rem
            }
        }

        .nav-actions {
            margin-top: 1rem;
            display: flex;
            gap: .75rem;
            flex-wrap: wrap;
        }

        .nav-actions .btn {
            font-size: .9rem;
            padding: .5rem .8rem;
        }

        @media (max-width: 600px) {
            .nav-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .nav-actions .btn {
                width: 100%;
                text-align: center;
            }
        }

    </style>

    {% block stylesheets %}{% endblock %}
</head>

<body>
    <header>
        <div class=\"header-inner\">Interface d’administration</div>
    </header>

    <main>
        <div class=\"container\">

            {# Affiche la barre de navigation sur toutes les pages SAUF la page de login #}
            {% if app.request.attributes.get('_route') != 'admin_login' %}
            {% include 'admin/_nav.html.twig' %}
            {% endif %}

            {# Contenu de la page #}
            {% block body %}{% endblock %}

        </div>
    </main>

    <footer>&copy; {{ \"now\"|date(\"Y\") }} MH Interior — Administration</footer>

    {% block javascripts %}{% endblock %}
</body>

</html>
", "base.html.twig", "H:\\Code\\Portfolio\\api\\templates\\base.html.twig");
    }
}
