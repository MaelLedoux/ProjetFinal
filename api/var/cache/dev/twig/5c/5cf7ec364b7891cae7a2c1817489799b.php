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

/* generated/project_template.html.twig */
class __TwigTemplate_67c6fbd80c93cf35e153a4685df3713e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "generated/project_template.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "generated/project_template.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 6
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 6, $this->source); })()), "html", null, true);
        yield "</title>
    <link rel=\"stylesheet\" href=\"../style.css\">
    <script src=\"../script.js\" defer></script>
</head>
<body>
<div id=\"header-placeholder\"></div>
<main>
    <section>
        <h2 style=\"color:#1b1e39;\">";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["titre"]) || array_key_exists("titre", $context) ? $context["titre"] : (function () { throw new RuntimeError('Variable "titre" does not exist.', 14, $this->source); })()), "html", null, true);
        yield "</h2>
        <div class=\"project-detail\">
            <div class=\"image-wrapper\">
                <div class=\"slider\">
                    <button class=\"prev\">&#10094;</button>
                    <img id=\"mainImage\" src=\"../";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["images"]) || array_key_exists("images", $context) ? $context["images"] : (function () { throw new RuntimeError('Variable "images" does not exist.', 19, $this->source); })()), 0, [], "array", false, false, false, 19), "html", null, true);
        yield "\" alt=\"Image principale\">
                    <button class=\"next\">&#10095;</button>
                </div>
                <div id=\"imageModal\" class=\"modal\">
                    <span class=\"close-modal\">&times;</span>
                    <img class=\"modal-content\" id=\"imgZoom\" alt=\"Zoom\">
                </div>
                <div class=\"thumbnails\">
                    ";
        // line 27
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["images"]) || array_key_exists("images", $context) ? $context["images"] : (function () { throw new RuntimeError('Variable "images" does not exist.', 27, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 28
            yield "                        <img src=\"../";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["image"], "html", null, true);
            yield "\" class=\"thumb\" data-index=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 28), "html", null, true);
            yield "\" alt=\"mini ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 28), "html", null, true);
            yield "\">
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        yield "                </div>
            </div>
            <div class=\"text-wrapper\">
                ";
        // line 33
        yield (isset($context["description"]) || array_key_exists("description", $context) ? $context["description"] : (function () { throw new RuntimeError('Variable "description" does not exist.', 33, $this->source); })());
        yield "
            </div>
        </div>
    </section>
</main>
<div id=\"footer-placeholder\"></div>
</body>
</html>
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
        return "generated/project_template.html.twig";
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
        return array (  128 => 33,  123 => 30,  102 => 28,  85 => 27,  74 => 19,  66 => 14,  55 => 6,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{{ titre }}</title>
    <link rel=\"stylesheet\" href=\"../style.css\">
    <script src=\"../script.js\" defer></script>
</head>
<body>
<div id=\"header-placeholder\"></div>
<main>
    <section>
        <h2 style=\"color:#1b1e39;\">{{ titre }}</h2>
        <div class=\"project-detail\">
            <div class=\"image-wrapper\">
                <div class=\"slider\">
                    <button class=\"prev\">&#10094;</button>
                    <img id=\"mainImage\" src=\"../{{ images[0] }}\" alt=\"Image principale\">
                    <button class=\"next\">&#10095;</button>
                </div>
                <div id=\"imageModal\" class=\"modal\">
                    <span class=\"close-modal\">&times;</span>
                    <img class=\"modal-content\" id=\"imgZoom\" alt=\"Zoom\">
                </div>
                <div class=\"thumbnails\">
                    {% for image in images %}
                        <img src=\"../{{ image }}\" class=\"thumb\" data-index=\"{{ loop.index0 }}\" alt=\"mini {{ loop.index }}\">
                    {% endfor %}
                </div>
            </div>
            <div class=\"text-wrapper\">
                {{ description|raw }}
            </div>
        </div>
    </section>
</main>
<div id=\"footer-placeholder\"></div>
</body>
</html>
", "generated/project_template.html.twig", "H:\\Code\\Portfolio\\api\\templates\\generated\\project_template.html.twig");
    }
}
