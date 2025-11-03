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

/* admin/projects.html.twig */
class __TwigTemplate_f36f56c4b4966dfaf11f973be3e77b20 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/projects.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin/projects.html.twig"));

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

        yield "Gestion des projets";
        
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
  <h2 style=\"margin:0;\">Projets</h2>
  ";
        // line 7
        if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 8
            yield "    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_project_add");
            yield "\" class=\"btn\">➕ Ajouter un projet</a>
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
      <th>Titre</th>
      <th>Contenu</th>
      <th>Image</th>
      <th>Page</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["projects"]) || array_key_exists("projects", $context) ? $context["projects"] : (function () { throw new RuntimeError('Variable "projects" does not exist.', 27, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["project"]) {
            // line 28
            yield "    <tr>
      <td data-label=\"Titre\">";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "titre", [], "any", false, false, false, 29), "html", null, true);
            yield "</td>
      <td data-label=\"Contenu\">
        ";
            // line 31
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, $context["project"], "contenuHtml", [], "any", false, false, false, 31))) > 120)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source,             // line 32
$context["project"], "contenuHtml", [], "any", false, false, false, 32)), 0, 120) . "…"), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source,             // line 33
$context["project"], "contenuHtml", [], "any", false, false, false, 33)), "html", null, true)));
            yield "
      </td>
      <td data-label=\"Image\">
        ";
            // line 36
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["project"], "imagePrincipale", [], "any", false, false, false, 36)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 37
                yield "          <img class=\"table-thumb\" src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((isset($context["frontend_url"]) || array_key_exists("frontend_url", $context) ? $context["frontend_url"] : (function () { throw new RuntimeError('Variable "frontend_url" does not exist.', 37, $this->source); })()) . "/") . CoreExtension::getAttribute($this->env, $this->source, $context["project"], "imagePrincipale", [], "any", false, false, false, 37)), "html", null, true);
                yield "\" alt=\"Image projet\">
        ";
            } else {
                // line 39
                yield "          <em class=\"muted\">Aucune image</em>
        ";
            }
            // line 41
            yield "      </td>
      <td data-label=\"Page\">
        ";
            // line 43
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["project"], "lien", [], "any", false, false, false, 43)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 44
                yield "          <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((((isset($context["frontend_url"]) || array_key_exists("frontend_url", $context) ? $context["frontend_url"] : (function () { throw new RuntimeError('Variable "frontend_url" does not exist.', 44, $this->source); })()) . "/") . CoreExtension::getAttribute($this->env, $this->source, $context["project"], "lien", [], "any", false, false, false, 44)), "html", null, true);
                yield "\" target=\"_blank\">Voir</a>
        ";
            } else {
                // line 46
                yield "          <em class=\"muted\">—</em>
        ";
            }
            // line 48
            yield "      </td>
      <td data-label=\"Actions\">
        <div class=\"table-actions\">
          ";
            // line 51
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_EDITOR")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "            <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_project_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 52)]), "html", null, true);
                yield "\" class=\"btn ghost\">✏️ Modifier</a>
          ";
            }
            // line 54
            yield "          ";
            if ((($tmp = $this->extensions['Symfony\Bridge\Twig\Extension\SecurityExtension']->isGranted("ROLE_ADMIN")) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 55
                yield "            <form method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_project_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 55)]), "html", null, true);
                yield "\" onsubmit=\"return confirm('Supprimer ce projet ?');\">
              <input type=\"hidden\" name=\"_token\" value=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["project"], "id", [], "any", false, false, false, 56))), "html", null, true);
                yield "\">
              <button type=\"submit\" class=\"btn ghost\">🗑️ Supprimer</button>
            </form>
          ";
            }
            // line 60
            yield "        </div>
      </td>
    </tr>
  ";
            $context['_iterated'] = true;
        }
        // line 63
        if (!$context['_iterated']) {
            // line 64
            yield "    <tr><td data-label=\"Info\" colspan=\"5\"><em class=\"muted\">Aucun projet trouvé.</em></td></tr>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['project'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 66
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
        return "admin/projects.html.twig";
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
        return array (  236 => 66,  229 => 64,  227 => 63,  220 => 60,  213 => 56,  208 => 55,  205 => 54,  199 => 52,  197 => 51,  192 => 48,  188 => 46,  182 => 44,  180 => 43,  176 => 41,  172 => 39,  166 => 37,  164 => 36,  158 => 33,  157 => 32,  156 => 31,  151 => 29,  148 => 28,  143 => 27,  129 => 15,  120 => 13,  116 => 12,  112 => 10,  106 => 8,  104 => 7,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Gestion des projets{% endblock %}

{% block body %}
<div class=\"card\" style=\"display:flex;justify-content:space-between;align-items:center;\">
  <h2 style=\"margin:0;\">Projets</h2>
  {% if is_granted('ROLE_EDITOR') %}
    <a href=\"{{ path('admin_project_add') }}\" class=\"btn\">➕ Ajouter un projet</a>
  {% endif %}
</div>

{% for message in app.flashes('success') %}
  <div class=\"card\" style=\"background:#dff0d8;color:#2a5b2e;border-color:#cbe7c7\">✔ {{ message }}</div>
{% endfor %}

<table class=\"table-admin\">
  <thead>
    <tr>
      <th>Titre</th>
      <th>Contenu</th>
      <th>Image</th>
      <th>Page</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
  {% for project in projects %}
    <tr>
      <td data-label=\"Titre\">{{ project.titre }}</td>
      <td data-label=\"Contenu\">
        {{ project.contenuHtml|striptags|length > 120
          ? project.contenuHtml|striptags|slice(0,120) ~ '…'
          : project.contenuHtml|striptags }}
      </td>
      <td data-label=\"Image\">
        {% if project.imagePrincipale %}
          <img class=\"table-thumb\" src=\"{{ frontend_url ~ '/' ~ project.imagePrincipale }}\" alt=\"Image projet\">
        {% else %}
          <em class=\"muted\">Aucune image</em>
        {% endif %}
      </td>
      <td data-label=\"Page\">
        {% if project.lien %}
          <a href=\"{{ frontend_url ~ '/' ~ project.lien }}\" target=\"_blank\">Voir</a>
        {% else %}
          <em class=\"muted\">—</em>
        {% endif %}
      </td>
      <td data-label=\"Actions\">
        <div class=\"table-actions\">
          {% if is_granted('ROLE_EDITOR') %}
            <a href=\"{{ path('admin_project_edit', { id: project.id }) }}\" class=\"btn ghost\">✏️ Modifier</a>
          {% endif %}
          {% if is_granted('ROLE_ADMIN') %}
            <form method=\"post\" action=\"{{ path('admin_project_delete', {id: project.id}) }}\" onsubmit=\"return confirm('Supprimer ce projet ?');\">
              <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ project.id) }}\">
              <button type=\"submit\" class=\"btn ghost\">🗑️ Supprimer</button>
            </form>
          {% endif %}
        </div>
      </td>
    </tr>
  {% else %}
    <tr><td data-label=\"Info\" colspan=\"5\"><em class=\"muted\">Aucun projet trouvé.</em></td></tr>
  {% endfor %}
  </tbody>
</table>
{% endblock %}
", "admin/projects.html.twig", "H:\\Code\\Portfolio\\api\\templates\\admin\\projects.html.twig");
    }
}
