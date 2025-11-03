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

/* @WebProfiler/Script/Mermaid/Makefile */
class __TwigTemplate_7f86b9ccc4aad28b15dd6d2ac1e1379a extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Script/Mermaid/Makefile"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "@WebProfiler/Script/Mermaid/Makefile"));

        // line 1
        yield "define diagram-orchestration
import { diagram as flowchartV2 } from '../diagrams/flowchart/flowDiagram-v2.js';
import { registerDiagram } from './diagramAPI.js';

let hasLoadedDiagrams = false;
export const addDiagrams = () => {
  if (hasLoadedDiagrams) {
    return;
  }
  hasLoadedDiagrams = true;
  registerDiagram('flowchart-v2', flowchartV2, () => true);
};
endef

override tag := v10.9.0

.PHONY: mermaid-flowchart-v2.min.js
mermaid-flowchart-v2.min.js: | repo-\$(tag)/node_modules
\t\$(file >repo-\$(tag)/packages/mermaid/src/diagram-api/diagram-orchestration.ts,\$(diagram-orchestration))
\tpnpm -C repo-\$(tag) run build
\tcp repo-\$(tag)/packages/mermaid/dist/mermaid.min.js \$@

repo-\$(tag)/node_modules: | repo-\$(tag)
\tpnpm -C \$(@D) install --ignore-scripts

.SECONDARY: repo-\$(tag)
repo-\$(tag):
\tcurl -fL https://github.com/mermaid-js/mermaid/archive/refs/tags/\$(tag).tar.gz | tar -xz --strip-components=1 --one-top-level=\$@

.PHONY: clean
clean:
\trm -rf ./repo-*
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
        return "@WebProfiler/Script/Mermaid/Makefile";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("define diagram-orchestration
import { diagram as flowchartV2 } from '../diagrams/flowchart/flowDiagram-v2.js';
import { registerDiagram } from './diagramAPI.js';

let hasLoadedDiagrams = false;
export const addDiagrams = () => {
  if (hasLoadedDiagrams) {
    return;
  }
  hasLoadedDiagrams = true;
  registerDiagram('flowchart-v2', flowchartV2, () => true);
};
endef

override tag := v10.9.0

.PHONY: mermaid-flowchart-v2.min.js
mermaid-flowchart-v2.min.js: | repo-\$(tag)/node_modules
\t\$(file >repo-\$(tag)/packages/mermaid/src/diagram-api/diagram-orchestration.ts,\$(diagram-orchestration))
\tpnpm -C repo-\$(tag) run build
\tcp repo-\$(tag)/packages/mermaid/dist/mermaid.min.js \$@

repo-\$(tag)/node_modules: | repo-\$(tag)
\tpnpm -C \$(@D) install --ignore-scripts

.SECONDARY: repo-\$(tag)
repo-\$(tag):
\tcurl -fL https://github.com/mermaid-js/mermaid/archive/refs/tags/\$(tag).tar.gz | tar -xz --strip-components=1 --one-top-level=\$@

.PHONY: clean
clean:
\trm -rf ./repo-*
", "@WebProfiler/Script/Mermaid/Makefile", "H:\\Code\\Portfolio\\api\\vendor\\symfony\\web-profiler-bundle\\Resources\\views\\Script\\Mermaid\\Makefile");
    }
}
