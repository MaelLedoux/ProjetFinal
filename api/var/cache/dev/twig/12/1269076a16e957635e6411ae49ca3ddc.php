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

/* admin/realisations.html.twig */
class __TwigTemplate_c4351f1ac18db40d9995f3f98021f690 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/realisations.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/realisations.html.twig"));

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

        yield "Gestion des réalisations";
        
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
        yield "<div class=\"card\" style=\"display:flex;justify-content:space-between;align-items:center;\">
  <h2 style=\"margin:0;\">Réalisations</h2>
  ";
        // line 7
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "    <a class=\"btn\" href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_realisation_add");
            yield "\">➕ Ajouter</a>
  ";
        }
        // line 10
        yield "</div>

";
        // line 12
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 12, $this->source); })()), "flashes", ["success"], "method", false, false, false, 12));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 13
            yield "  <div class=\"card\" style=\"background:#dff0d8;color:#2a5b2e;border-color:#cbe7c7\">✔ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 15
        yield "
<table class=\"table-admin\">
  <thead>
    <tr>
      <th>Type</th>
      <th>Description</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  ";
        // line 26
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["realisations"]) || array_key_exists("realisations", $context) ? $context["realisations"] : (function () { throw new RuntimeError('Variable "realisations" does not exist.', 26, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
            // line 27
            yield "    <tr>
      <td data-label=\"Type\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "type", [], "any", false, false, false, 28)), "html", null, true);
            yield "</td>
      <td data-label=\"Description\">";
            // line 29
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["r"], "description", [], "any", false, false, false, 29)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ((((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "description", [], "any", false, false, false, 29)) > 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["r"], "description", [], "any", false, false, false, 29), 0, 120) . "…"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "description", [], "any", false, false, false, 29), "html", null, true)))) : ("—"));
            yield "</td>
      <td data-label=\"Image\">
        ";
            // line 31
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["r"], "image", [], "any", false, false, false, 31)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "          <img class=\"table-thumb\" src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["frontend_url"]) || array_key_exists("frontend_url", $context) ? $context["frontend_url"] : (function () { throw new RuntimeError('Variable "frontend_url" does not exist.', 32, $this->source); })()), "html", null, true);
                yield "/images/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["r"], "image", [], "any", false, false, false, 32), "html", null, true);
                yield "\" alt=\"Réalisation\">
        ";
            } else {
                // line 34
                yield "          <em class=\"muted\">Aucune image</em>
        ";
            }
            // line 36
            yield "      </td>
      <td data-label=\"Actions\">
        <div class=\"table-actions\">
          ";
            // line 39
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 40
                yield "            <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_realisation_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 40)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer cette réalisation ?');\">
              <input type=\"hidden\" name=\"_token\" value=\"";
                // line 41
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["r"], "id", [], "any", false, false, false, 41))), "html", null, true);
                yield "\">
              <button class=\"btn ghost\" type=\"submit\">🗑️ Supprimer</button>
            </form>
          ";
            } else {
                // line 45
                yield "            <span class=\"muted\">—</span>
          ";
            }
            // line 47
            yield "        </div>
      </td>
    </tr>
  ";
            $context['_iterated'] = true;
        }
        // line 50
        if (!$context['_iterated']) {
            // line 51
            yield "    <tr><td data-label=\"Info\" colspan=\"4\"><em class=\"muted\">Aucune réalisation trouvée.</em></td></tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['r'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
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
        return "admin/realisations.html.twig";
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
        return array (  212 => 53,  205 => 51,  203 => 50,  196 => 47,  192 => 45,  185 => 41,  180 => 40,  178 => 39,  173 => 36,  169 => 34,  161 => 32,  159 => 31,  154 => 29,  150 => 28,  147 => 27,  142 => 26,  129 => 15,  120 => 13,  116 => 12,  112 => 10,  106 => 8,  104 => 7,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Gestion des réalisations{% endblock %}

{% block body %}
<div class=\"card\" style=\"display:flex;justify-content:space-between;align-items:center;\">
  <h2 style=\"margin:0;\">Réalisations</h2>
  {% if is_granted('ROLE_EDITOR') %}
    <a class=\"btn\" href=\"{{ path('admin_realisation_add') }}\">➕ Ajouter</a>
  {% endif %}
</div>

{% for message in app.flashes('success') %}
  <div class=\"card\" style=\"background:#dff0d8;color:#2a5b2e;border-color:#cbe7c7\">✔ {{ message }}</div>
{% endfor %}

<table class=\"table-admin\">
  <thead>
    <tr>
      <th>Type</th>
      <th>Description</th>
      <th>Image</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  {% for r in realisations %}
    <tr>
      <td data-label=\"Type\">{{ r.type|capitalize }}</td>
      <td data-label=\"Description\">{{ r.description ? (r.description|length > 120 ? r.description|slice(0,120) ~ '…' : r.description) : '—' }}</td>
      <td data-label=\"Image\">
        {% if r.image %}
          <img class=\"table-thumb\" src=\"{{ frontend_url }}/images/{{ r.image }}\" alt=\"Réalisation\">
        {% else %}
          <em class=\"muted\">Aucune image</em>
        {% endif %}
      </td>
      <td data-label=\"Actions\">
        <div class=\"table-actions\">
          {% if is_granted('ROLE_ADMIN') %}
            <form method=\"post\" action=\"{{ path('admin_realisation_delete', {id: r.id}) }}\" onsubmit=\"return confirm('Supprimer cette réalisation ?');\">
              <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ r.id) }}\">
              <button class=\"btn ghost\" type=\"submit\">🗑️ Supprimer</button>
            </form>
          {% else %}
            <span class=\"muted\">—</span>
          {% endif %}
        </div>
      </td>
    </tr>
  {% else %}
    <tr><td data-label=\"Info\" colspan=\"4\"><em class=\"muted\">Aucune réalisation trouvée.</em></td></tr>
  {% endfor %}
  </tbody>
</table>
{% endblock %}
", "admin/realisations.html.twig", "H:\\Code\\Portfolio\\api\\templates\\admin\\realisations.html.twig");
    }
}
