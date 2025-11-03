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

/* admin/services.html.twig */
class __TwigTemplate_f2fd2c57fe8a6c116baa4f84ec5c3117 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/services.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/services.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Gestion des services";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "<div class=\"card\">
  <h2 style=\"margin:0;\">Services</h2>
</div>

<table class=\"table-admin\">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Type</th>
      <th>Description</th>
      <th>Média</th>
    </tr>
  </thead>
  <tbody>
  ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["services"]) || array_key_exists("services", $context) ? $context["services"] : (function () { throw new RuntimeError('Variable "services" does not exist.', 19, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
            // line 20
            yield "    <tr>
      <td data-label=\"Titre\">";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "titre", [], "any", false, false, false, 21), "html", null, true);
            yield "</td>
      <td data-label=\"Type\">";
            // line 22
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "type", [], "any", false, false, false, 22), "html", null, true);
            yield "</td>
      <td data-label=\"Description\">";
            // line 23
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "description", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "description", [], "any", false, false, false, 23)) > 140)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["s"], "description", [], "any", false, false, false, 23), 0, 140) . "…"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "description", [], "any", false, false, false, 23), "html", null, true)))) : ("—"));
            yield "</td>
      <td data-label=\"Média\">
        ";
            // line 25
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "video", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 26
                yield "          ";
                if ((is_string($_v0 = CoreExtension::getAttribute($this->env, $this->source, $context["s"], "video", [], "any", false, false, false, 26)) && is_string($_v1 = "http") && str_starts_with($_v0, $_v1))) {
                    // line 27
                    yield "            <div style=\"position:relative;width:100%;padding-bottom:56.25%;\">
              <iframe src=\"";
                    // line 28
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "video", [], "any", false, false, false, 28), "html", null, true);
                    yield "\" allowfullscreen style=\"position:absolute;inset:0;border:0;width:100%;height:100%\"></iframe>
            </div>
          ";
                } else {
                    // line 31
                    yield "            <video src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("../" . CoreExtension::getAttribute($this->env, $this->source, $context["s"], "video", [], "any", false, false, false, 31))), "html", null, true);
                    yield "\" controls muted style=\"max-width:100%;height:auto;border-radius:8px\">
              Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
          ";
                }
                // line 35
                yield "        ";
            } else {
                // line 36
                yield "          <em class=\"muted\">Aucun média</em>
        ";
            }
            // line 38
            yield "      </td>
    </tr>
  ";
            $context['_iterated'] = true;
        }
        // line 40
        if (!$context['_iterated']) {
            // line 41
            yield "    <tr><td data-label=\"Info\" colspan=\"4\"><em class=\"muted\">Aucun service enregistré.</em></td></tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['s'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 43
        yield "  </tbody>
</table>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/services.html.twig";
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
        return array (  181 => 43,  174 => 41,  172 => 40,  166 => 38,  162 => 36,  159 => 35,  151 => 31,  145 => 28,  142 => 27,  139 => 26,  137 => 25,  132 => 23,  128 => 22,  124 => 21,  121 => 20,  116 => 19,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Gestion des services{% endblock %}

{% block body %}
<div class=\"card\">
  <h2 style=\"margin:0;\">Services</h2>
</div>

<table class=\"table-admin\">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Type</th>
      <th>Description</th>
      <th>Média</th>
    </tr>
  </thead>
  <tbody>
  {% for s in services %}
    <tr>
      <td data-label=\"Titre\">{{ s.titre }}</td>
      <td data-label=\"Type\">{{ s.type }}</td>
      <td data-label=\"Description\">{{ s.description ? (s.description|length > 140 ? s.description|slice(0,140) ~ '…' : s.description) : '—' }}</td>
      <td data-label=\"Média\">
        {% if s.video %}
          {% if s.video starts with 'http' %}
            <div style=\"position:relative;width:100%;padding-bottom:56.25%;\">
              <iframe src=\"{{ s.video }}\" allowfullscreen style=\"position:absolute;inset:0;border:0;width:100%;height:100%\"></iframe>
            </div>
          {% else %}
            <video src=\"{{ asset('../' ~ s.video) }}\" controls muted style=\"max-width:100%;height:auto;border-radius:8px\">
              Votre navigateur ne supporte pas les vidéos HTML5.
            </video>
          {% endif %}
        {% else %}
          <em class=\"muted\">Aucun média</em>
        {% endif %}
      </td>
    </tr>
  {% else %}
    <tr><td data-label=\"Info\" colspan=\"4\"><em class=\"muted\">Aucun service enregistré.</em></td></tr>
  {% endfor %}
  </tbody>
</table>
{% endblock %}
", "admin/services.html.twig", "H:\\Code\\Portfolio\\api\\templates\\admin\\services.html.twig");
    }
}
